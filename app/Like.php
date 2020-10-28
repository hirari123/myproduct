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
}
