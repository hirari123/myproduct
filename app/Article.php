<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id');
    protected $table = 'Article';

    // バリデーションルールはフォームリクエストでの定義に変更
    /*
    public static $rules = array(
        'body' => 'required',
    );
    */
}
