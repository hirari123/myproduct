<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // 通常のリクエスト
use App\User; // Userモデルを使う
use App\Article; // Articleモデルを使う
use App\Comment; // Commentモデルを使う

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
        $comments->user_name = Auth::user()->name; // defaulte値として必要(nullableでない)

        // requestから受け取ったarticleIdをcommentsテーブルに格納(外部キー)
        $comments->article_id = $request->articleId;

        // フォームから送信されてきた_tokenを削除
        unset($form['_token']);

        // データベースに保存する
        $comments->fill($form);
        $comments->save();

        return redirect('admin/articles');
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

        // フォームにデータを上書きして保存する
        $comments->fill($comment_form)->save();

        return redirect('admin/articles');
    }

    // deleteアクションを定義
    public function delete(Request $request)
    {
        $comments = Comment::find($request->id); // Modelから該当データを取得

        $comments->delete();
        return redirect('admin/comment/show');
    }

    // showアクション
    public function show(Request $request)
    {
        // 投稿idが一致する投稿データを取得
        $post = Article::find($request->id);
        if (empty($post)) {
            abort(404);
        }
        $post->user_name = User::find($post->user_id)->name;

        // 各コメントに最新のユーザー情報を格納する(Userモデルからidで取得)
        foreach ($post->comments as $comment) {
            $comment->user_name = User::find($comment->user_id)->name;
            $comment->user_image_path = User::find($comment->user_id)->user_image_path;
        }

        // Viewに投稿データを渡す
        return view('admin.comment.show', ['post' => $post]);
    }
}
