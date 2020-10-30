<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = array('id');

    // 更新日時の記述を追加
    protected $dates = [
        'edited_at',
    ];

    // Userモデルと1対多で関連づける
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Commentモデルと1対多で関連づける
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // Likeモデルと1対多で関連づける
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
