<?php

namespace App\Http\Controllers\Calculate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BuildingIntake; // BuildingIntakeモデルを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う

class BuildingIntakeController extends Controller
{
    // indexアクション
    public function index()
    {
        return view('calculate.building_intake');
    }

    // createアクション
    /**
     * SubmitでViewからinputデータを受け取ってモデルに保存する
     * (体重と体脂肪率以外のデータはhidden属性で埋め込まれたものを受け取る)
     */
    public function create(Request $request)
    {
        // リクエストのデータとログインユーザーを取得
        $form = $request->all();
        $id = Auth::user()->id;
        $building_intakes = new BuildingIntake;

        // すでにログインユーザーの計算結果が存在する場合は該当データを取得する
        if ($building_intakes->calculate_exist($id)) {
            $building_intakes = BuildingIntake::where('user_id', $id)->first();
        }

        // // 各フィールドにデータを格納していく
        // // ユーザーIDを格納する
        $building_intakes->user_id = Auth::user()->id;

        // 体脂肪と除脂肪体重を格納する
        $building_intakes->body_weight = $form["body_weight"];
        $building_intakes->body_fat_percentage = $form["body_fat_percentage"];

        // 目標摂取量を格納する
        $building_intakes->lean_body_mass = $form["lean-body-mass"];
        $building_intakes->building_target_calories = $form["building-target-calories"];
        $building_intakes->building_target_protein = $form["building-target-protein"];
        $building_intakes->building_target_lipid = $form["building-target-lipid"];
        $building_intakes->building_target_carbohydrate = $form["building-target-carbohydrate"];

        // トークンを削除してデータベースに保存する
        unset($form['_token']);
        // $building_intakes->fill($form)->save();
        $building_intakes->save();

        return redirect('admin/mypage');
    }


    // ajaxでの計算アクション
    public function ajaxBuildingIntake(Request $request)
    {
        // ajaxのリクエストとして受け取った値を代入する(user_idは受け取らない)
        $body_weight = $request->body_weight;
        $body_fat_percentage = $request->body_fat_percentage;

        // 体脂肪と除脂肪体重を算出する
        $body_fat_mass = round($body_weight * $body_fat_percentage / 100, 1);
        $lean_body_mass = round($body_weight - $body_fat_mass, 1);

        // 目標カロリーと三大栄養素を算出する
        $building_target_calories = round($lean_body_mass * 44, 0);
        $building_target_protein = round($body_weight * 1.6, 0);
        $building_target_lipid = round(($building_target_calories * 30 / 100) / 9, 0);
        $building_target_carbohydrate = round(($building_target_calories - $building_target_protein * 4 - $building_target_lipid * 9) / 4, 0);

        // ajaxに返すデータをまとめる→これをjQueryのhtmlメソッドで使う(要素の上書き,inputのhidden属性に埋め込み)
        $data = [
            'body_fat_mass' => $body_fat_mass,
            'lean_body_mass' => $lean_body_mass,
            'building_target_calories' => $building_target_calories,
            'building_target_protein' => $building_target_protein,
            'building_target_lipid' => $building_target_lipid,
            'building_target_carbohydrate' => $building_target_carbohydrate,
        ];

        // ajaxのdataとしてjson形式で返す
        return response()->json($data);
    }
}
