<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // 通常のリクエスト
use App\Article; // Article Modelを使う
use App\Comment; // Comment Modelを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う
use App\Http\Requests\ArticleRequest; // フォームリクエストを使う
use Carbon\Carbon; // 日付操作ライブラリを使う

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
    // モデルの$rulesを引数にVaridateメソッドを呼び出す→削除
    // $this->validate($request, Article::$rules);

    $articles = new Article;
    $form = $request->all();

    // フォームからの送信に画像があれば$articles->image_pathに画像のパスを保存する
    if (isset($form['image'])) {
      $path = $request->file('image')->store('public/image'); // ひとまずpublicとしている
      $articles->image_path = basename($path); // フルパスからファイル名を取得
    } else {
        $articles->image_path = null;
    }

    // ログインユーザー情報を取得する
    $articles->user_name = Auth::user()->name;
    // $articles->user_name = 'ユーザー1';

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
    // Modelからデータを取得する
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
    // Modelの$rulesを使用したValidation
    // $this->validate($request, Article::$rules);
    
    // Modelからデータを取得する
    $articles = Article::find($request->id);
    
    // 送信されてきたフォームデータを格納する
    $articles_form = $request->all();
    if (isset($articles_form['image'])) { //imageがあるかを判定
      $path = $request->file('image')->store('public/image');
      $articles->image_path = basename($path); // フルパスからファイル名を取得
      unset($articles_form['imege']);
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
  
  // indexアクション
  // 部分一致のあいまい検索とした
  // URLからtokenを削除する記述は不要？
  // ページネーションは不要？無限スクロールにする？
  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
      // 検索されたら検索結果を取得する
      $articles = Article::where('body', 'like', '%'.$cond_title.'%')->orderBy('created_at', 'desc')->get();
    } else {
      // それ以外はすべての投稿を取得する
      $articles = Article::orderBy('created_at', 'desc')->get();
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
