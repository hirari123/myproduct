<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // fillableを記述(bodyのみ代入を許可する設定)
    protected $fillable = [
        'body',
    ];

    // Userモデルに紐づける(1対多)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Articleモデルに紐づける(1対多)
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
