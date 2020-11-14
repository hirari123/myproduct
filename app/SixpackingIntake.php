<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sixpackingIntake extends Model
{
    protected $guarded = array('id');
    protected $table = 'sixpacking_intakes';

    // Userモデルに紐づける(1対多)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // 既にそのユーザーの計算結果があるかを確認するメソッド(引数はAuth::user()->idを入れる)
    public function calculate_exist($id)
    {
        // テーブルのレコードにユーザーidと一致するものを取得
        $exist = SixpackingIntake::where('user_id', '=', $id)->get();

        // 存在する場合はtrueを返す
        if (!$exist->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
}
