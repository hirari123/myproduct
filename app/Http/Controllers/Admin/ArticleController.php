<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // 通常のリクエスト
use App\Http\Requests\ArticleRequest; // フォームリクエストを使う
use App\Article; // Article Modelを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う
use Carbon\Carbon; // 日付操作ライブラリを使う
use Intervention\Image\Facades\Image; // InterventionImageを使う(画像リサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う
use Illuminate\Http\File; // Fileは使わない

class ArticleController extends Controller
{
  //add,create,edit,updateアクションを定義
  public function add()
  {
    return view('admin.article.create');
  }

  // createアクション(引数のRequestはArticleRequestに変更)
  public function create(ArticleRequest $request)
  {
    $articles = new Article;
    $form = $request->all();

    // フォームに画像があれば画像を保存する処理を行う
    if (isset($form['image'])) {

      // 画像ファイルを取得
      $posted_image = $request->file('image');
      // $original_file_name = $posted_image->getClientOriginalName(); // 元のファイル名

      // 画像をリサイズしてjpgにencodeする(InterventionImageのImageファサードを使用)
      $resized_image = Image::make($posted_image)->fit(640, 360)->encode('jpg');

      // 加工した画像からhashを生成し、ファイル名を設定する
      $image_hash = md5($resized_image->__toString());
      $image_name = "{$image_hash}.jpg";
      $articles->image_path = $image_name; // image_pathカラムにファイル名を代入

      // 加工した画像を保存する
      // $resized_image->store('public/image'); // storeは使えない(GDでサポートしていない)
      Storage::put('public/image/'.$image_name, $resized_image); // Storageファサードを使用
      
    } else {
      $articles->image_path = null;
    }

    // ログインユーザー情報を取得する
    $articles->user_name = Auth::user()->name;

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
    if (empty($articles))
    {
      abort(404);
    }
    return view('admin.article.edit', ['article_form' => $articles]);
  }
  

  // updateアクションを定義
  public function update(ArticleRequest $request)
  {
    
    // Modelからデータを取得する(idで検索)
    $articles = Article::find($request->id);
    $articles_form = $request->all();

    // フォームに画像があれば画像を保存する処理を行う
    if (isset($articles_form['image'])) {

      // 新しい画像ファイルとファイル名を取得
      $posted_image = $request->file('image');

      // 画像をリサイズしてjpgにencodeする(InterventionImageのImageファサードを使用)
      $resized_image = Image::make($posted_image)->fit(640, 360)->encode('jpg');

      // 加工した画像からhashを生成し、ファイル名を設定する
      $image_hash = md5($resized_image->__toString());
      $image_name = "{$image_hash}.jpg";
      $articles->image_path = $image_name; // image_pathカラムにファイル名を上書き

      // 加工した画像を保存する
      Storage::put('public/image/'.$image_name, $resized_image); // Storageファサードを使用

    } elseif (strcmp($request->remove, 'true') == 0) {
      $articles->image_path = null; // 画像を削除する場合はimage_pathにnullをセット
    }
    unset($articles_form['_token']);
    unset($articles_form['image']);
    unset($articles_form['remove']);
    
    // 編集日時を追加する
    $articles->edited_at = Carbon::now();

    // データを上書きして保存する
    $articles->fill($articles_form)->save();
    
    return redirect('admin/articles');
  }
  
  // deleteアクションを定義
  public function delete(Request $request)
  {
    $articles = Article::find($request->id); // Modelから該当データを取得
    $articles->delete();
    return redirect('admin/articles');
  }
  
  // indexアクションを定義
  // 部分一致であいまい検索
  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
      // 検索されたら検索結果を取得する
      $articles = Article::where('body', 'like', '%'.$cond_title.'%')->orderBy('created_at', 'desc')->paginate(10);
    } else {
      // それ以外はすべての投稿を取得する
      $articles = Article::orderBy('created_at', 'desc')->paginate(10);
    }
  
    return view('admin.article.index', ['articles' => $articles, 'cond_title' => $cond_title]);
  }

  // showアクション
  public function show(Request $request)
  {
    // idが一致する投稿データを取得
    $post = Article::find($request->id);
    if (empty($post))
    {
      abort(404);
    }
    return view('admin.article.show', ['post' => $post]);
  }
}
