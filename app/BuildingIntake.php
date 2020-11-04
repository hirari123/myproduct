<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingIntake extends Model
{
    protected $guarded = array('id');
    protected $table = 'building_intakes';

    // Userモデルに紐づける(1対多)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // 既にそのユーザーの計算結果があるかを確認するメソッド
    public function calculate_exist($id)
    {
        // テーブルのレコードにユーザーidと一致するものを取得
        $exist = BuildingIntake::where('user_id', '=', $id)->get();

        // 存在する場合はtrueを返す
        if (!$exist->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
}
