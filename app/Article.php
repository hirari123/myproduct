<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id'); // idは書き換えられない
    protected $table = 'Articles';

    // バリデーションルールはフォームリクエストでの定義に変更
    /*
    public static $rules = array(
        'body' => 'required',
    );
    */

    // Userモデルと紐づける(1対多)
    public function user()
    {
        return $this->belongsTo(App\User);
    }

    // Commentモデルと紐づける(1対多)
    public function comments()
    {
        return $this->hasMany(App\Comment);
    }
}
