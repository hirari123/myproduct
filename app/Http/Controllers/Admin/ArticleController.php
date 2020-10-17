<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // 通常のリクエスト
use App\Http\Requests\ArticleRequest; // フォームリクエストを使う
use App\Article; // Articlelモデルを使う
use App\User; // Userモデルを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う
use Carbon\Carbon; // 日付操作ライブラリを使う
use Intervention\Image\Facades\Image; // InterventionImageを使う(画像リサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う(ユーザー画像を保存,削除)
use Illuminate\Http\File; // Fileは使わない

class ArticleController extends Controller
{
    // createアクション(引数のRequestはArticleRequestに変更)
    public function create(ArticleRequest $request)
    {
        $articles = new Article;
        $form = $request->all();

        // フォームに画像があれば画像を保存する処理を行う
        if (empty($form['image'])) {
            $articles->image_path = null;
        } else {
            // 画像ファイルを取得
            $posted_image = $request->file('image');
            // $original_file_name = $posted_image->getClientOriginalName(); // 元のファイル名を取得する(あとで使う？)

            // 画像をリサイズしてjpgにencodeする(InterventionImageのImageファサードを使用)
            $resized_image = Image::make($posted_image)->fit(640, 360)->encode('jpg');

            // さらに自動回転を行う(ここでEXIFが削除される)
            $resized_image->orientate()->save();

            // 加工した画像からhashを生成し、ファイル名を設定する
            $image_hash = md5($resized_image->__toString());
            $image_name = "{$image_hash}.jpg";
            $articles->image_path = $image_name; // image_pathカラムにファイル名を代入

            // 加工した画像を保存する
            Storage::put('public/image/' . $image_name, $resized_image); // Storageファサードを使用
            // $resized_image->store('public/image'); // storeは使えない(GDでサポートしていない)
        }

        // ログインユーザー情報を取得する
        $articles->user_id = Auth::user()->id;
        $articles->user_name = Auth::user()->name; // defaulte値として必要なのでnameは残しておく(nullableでない)
        // $articles->user_image_path = Auth::user()->user_image_path;

        // フォームから送信されてきた_tokenとimageを削除
        unset($form['_token']);
        unset($form['image']);

        // データベースに保存する
        $articles->fill($form);
        $articles->save();

        return redirect('admin/articles');
    }


    // editアクションを定義
    public function edit(Request $request)
    {
        // idで検索してModelからデータを取得する(無ければ404を返す)
        $articles = Article::find($request->id);
        if (empty($articles)) {
            abort(404);
        }
        return view('admin.article.edit', ['article_form' => $articles]);
    }


    // updateアクションを定義
    public function update(ArticleRequest $request)
    {
        // Modelからデータを取得する(投稿idで検索)
        $articles = Article::find($request->id);
        $form = $request->all();

        // フォームに画像があれば画像を保存する処理を行う
        // (可読性を考え画像を削除する場合の処理を先にした)
        if (strcmp($request->remove, 'true') == 0) {
            // 画像を削除
            Storage::delete('public/image/' . $articles->image_path);
            $articles->image_path = null;
        } elseif (isset($form['image'])) {
            // 古い画像は削除
            Storage::delete('public/image/' . $articles->image_path);
            // 新しい画像ファイルとファイル名を取得
            $posted_image = $request->file('image');

            // 画像をリサイズしてjpgにencodeする(InterventionImageのImageファサードを使用)
            $resized_image = Image::make($posted_image)->fit(640, 360)->encode('jpg');

            // さらに自動回転を行う(ここでEXIFが削除される)
            $resized_image->orientate()->save();

            // 加工した画像からhashを生成し、ファイル名を設定する
            $image_hash = md5($resized_image->__toString());
            $image_name = "{$image_hash}.jpg";
            $articles->image_path = $image_name; // image_pathカラムにファイル名を上書き

            // 加工した画像を保存する
            Storage::put('public/image/' . $image_name, $resized_image); // Storageファサードを使用
        }

        // フォームの不要なデータを削除する
        unset($form['_token']);
        unset($form['image']);
        unset($form['remove']);

        // 編集日時を追加する
        $articles->edited_at = Carbon::now();

        // フォームにデータを上書きして保存する
        $articles->fill($form)->save();

        return redirect('admin/articles');
    }

    // deleteアクションを定義
    public function delete(Request $request)
    {
        // Modelからデータを取得して削除(投稿idで検索)
        $articles = Article::find($request->id);
        Storage::delete('public/image/' . $articles->image_path);
        $articles->delete();
        return redirect('admin/articles');
    }

    // indexアクションを定義
    // 部分一致であいまい検索
    public function index(Request $request)
    {
        $search_text = $request->search_text;
        if ($search_text != '') {
            // 検索されたら検索結果を取得する
            $articles = Article::where('body', 'like', '%' . $search_text . '%')->orderBy('created_at', 'desc')->paginate(7);
            foreach ($articles as $article) {
                $article->user_name = User::find($article->user_id)->name;
                $article->user_image_path = User::find($article->user_id)->user_image_path;
            }
        } else {
            // 検索が無い場合はすべての投稿を取得する
            $articles = Article::orderBy('created_at', 'desc')->paginate(7);

            foreach ($articles as $article) {
                $article->user_name = User::find($article->user_id)->name;
                $article->user_image_path = User::find($article->user_id)->user_image_path;
            }
        }
        return view('admin.article.index', ['articles' => $articles, 'search_text' => $search_text]);
    }
}
