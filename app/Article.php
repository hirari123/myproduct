<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id');
    protected $table = 'Articles';

    // バリデーションルールはフォームリクエストでの定義に変更
    /*
    public static $rules = array(
        'body' => 'required',
    );
    */

    /**
     * リレーションの設定
     * Usersテーブルと1対多
     * Articlesテーブルが従テーブル
     */
    public function user()
    {
        return $this->belongsTo(App\User);
    }
}
