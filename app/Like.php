<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $guarded = array('id');

    // Userモデルと1対多で関連づける
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Articleモデルと1対多で関連づける
    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    // いいねが既にされているかを確認するメソッドを定義(ControllerとViewで呼び出す)
    public function like_exist($id, $article_id)
    {
        // Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        $exist = Like::where('user_id', '=', $id)->where('article_id', '=', $article_id)->get();

        // 存在する場合はtrueを返す
        if (!$exist->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
}
