<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = array('id'); // idは書き換えられない
    protected $table = 'comments';

    // fillableを記述(bodyのみ代入を許可する設定)
    // protected $fillable = [
    //     'body',
    // ];

    // 更新日時の記述を追加
    protected $dates = [
        'edited_at',
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
