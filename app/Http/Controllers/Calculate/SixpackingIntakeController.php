<?php

namespace App\Http\Controllers\Calculate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\sixpackingIntake; // sixpackingIntakeモデルを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う

class SixpackingIntakeController extends Controller
{
    // indexアクション
    public function index()
    {
        return view('calculate.sixpacking_intake');
    }

    // createアクション
    /**
     * SubmitでViewからinputデータを受け取ってモデルに保存する
     * (体重以外のデータはhidden属性で埋め込まれたものを受け取る)
     */
    public function create(Request $request)
    {
        // リクエストのデータとログインユーザーを取得
        $form = $request->all();
        $id = Auth::user()->id;
        $sixpacking_intakes = new sixpackingIntake;

        // すでにログインユーザーの計算結果が存在する場合は該当データを取得する
        if ($sixpacking_intakes->calculate_exist($id)) {
            $sixpacking_intakes = SixpackingIntake::where('user_id', $id)->first();
        }

        // // 各フィールドにデータを格納していく
        // // ユーザーIDを格納する
        $sixpacking_intakes->user_id = Auth::user()->id;

        // 体脂肪と除脂肪体重を格納する
        $sixpacking_intakes->body_weight = $form["body_weight"];

        // 目標摂取量を格納する
        $sixpacking_intakes->sixpacking_target_calories = $form["sixpacking-target-calories"];
        $sixpacking_intakes->sixpacking_target_protein = $form["sixpacking-target-protein"];
        $sixpacking_intakes->sixpacking_target_lipid = $form["sixpacking-target-lipid"];
        $sixpacking_intakes->sixpacking_target_carbohydrate = $form["sixpacking-target-carbohydrate"];

        // トークンを削除してデータベースに保存する
        unset($form['_token']);
        $sixpacking_intakes->save();

        return redirect('admin/mypage');
    }


    // ajaxでの計算アクション
    public function ajaxsixpackingIntake(Request $request)
    {
        // ajaxのリクエストとして受け取った値を代入する(user_idは受け取らない)
        $body_weight = $request->body_weight;

        // 目標カロリーと三大栄養素を算出する
        $sixpacking_target_calories = round($body_weight * 22, 0);
        $sixpacking_target_protein = round($sixpacking_target_calories * 0.30 / 4, 0);
        $sixpacking_target_lipid = round($sixpacking_target_calories * 0.50 / 9, 0);
        $sixpacking_target_carbohydrate = round($sixpacking_target_calories * 0.15 / 4, 0);

        // ajaxに返すデータをまとめる→これをjQueryのhtmlメソッドで使う(要素の上書き,inputのhidden属性に埋め込み)
        $data = [
            'sixpacking_target_calories' => $sixpacking_target_calories,
            'sixpacking_target_protein' => $sixpacking_target_protein,
            'sixpacking_target_lipid' => $sixpacking_target_lipid,
            'sixpacking_target_carbohydrate' => $sixpacking_target_carbohydrate,
        ];

        // ajaxのdataとしてjson形式で返す
        return response()->json($data);
    }

    // deleteアクション(マイページから結果を削除する)
    // マイページからauth::user()->idでデータを抽出してレコードを削除する
    public function delete()
    {
        $id = Auth::user()->id;
        SixpackingIntake::where('user_id', $id)->first()->delete();

        return redirect('admin/mypage');
    }
}
