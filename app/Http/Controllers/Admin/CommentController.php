<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // 通常のリクエスト
use App\Comment; // Comment Modelを使う
// use App\Article; // Article Modelを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う
use App\Http\Requests\CommentRequest; // フォームリクエストを使う
use Carbon\Carbon; // 日付操作ライブラリを使う

class CommentController extends Controller
{

    // createアクション
    public function create(CommentRequest $request)
    {
        $comments = new Comment;
        $form = $request->all();

        // ログインユーザー情報と投稿idを代入する
        $comments->user_id = Auth::user()->id;
        $comments->user_name = Auth::user()->name;
        // $comments->user_image_path = Auth::user()->user_image_path; // commentテーブルにuser画像カラムは無い！
        // そもそも投稿にはuser_idさえ持たせれば、表示する時にuser_idでUserモデルから最新の名前や画像を検索できる？
        $comments->article_id = $request->articleId;

        // フォームから送信されてきた_tokenを削除
        unset($form['_token']);

        // データベースに保存する
        $comments->fill($form);
        $comments->save();

        return redirect('admin/article/show');
    }

    // editアクションを定義
    public function edit(Request $request)
    {
        // Modelからデータを取得する
        $comments = Comment::find($request->id);
        if (empty($comments)) {
            abort(404);
        }
        return view('admin.comment.edit', ['comment_form' => $comments]);
    }

    // updateアクションを定義
    public function update(CommentRequest $request)
    {

        // Modelからデータを取得する
        $comments = Comment::find($request->id);

        // 送信されてきたフォームデータを格納する
        $comment_form = $request->all();

        unset($comment_form['_token']);

        // 編集日時を追加する
        $comments->edited_at = Carbon::now();

        // データを上書きして保存する
        $comments->fill($comment_form)->save();

        return redirect('admin/article/show');
    }

    // deleteアクションを定義
    public function delete(Request $request)
    {
        $comments = Comment::find($request->id); // Modelから該当データを取得

        $comments->delete();
        return redirect('admin/article/show');
    }
}
