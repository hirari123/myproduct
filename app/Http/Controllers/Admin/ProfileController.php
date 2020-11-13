<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User; // Userモデルを使う
use App\BuildingIntake; // BuildingIntakeモデルを使う
use App\SixpackingIntake; // SixpackingIntakeモデルを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う
use Intervention\Image\Facades\Image; // InterventionImageを使う(画像リサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う(ユーザー画像を保存,削除)

class ProfileController extends Controller
{
    // editアクション
    public function edit(Request $request)
    {
        // Modelからデータを取得する(編集対象のユーザーidで検索)
        $user_data = User::find($request->id);

        return view('admin.profile.edit', ['user_data' => $user_data]);
    }

    // updateアクション
    public function update(Request $request)
    {
        // Modelからデータを取得する(idで検索)
        $user_data = User::find($request->id);

        // 送信されてきたフォームデータを取得し、トークンを削除
        $users_form = $request->all();
        unset($users_form['_token']);

        // フォームに画像があれば画像を保存する処理を行う
        // (可読性を考え画像を削除する場合の処理を先にした)
        if (strcmp($request->remove, 'true') == 0) {
            Storage::disk('s3')->delete('user_images/' . $user_data->image_path);
            $user_data->user_image_path = null;
        } elseif (isset($users_form['image_file'])) {

            // 新しい画像ファイルとファイル名を取得
            $posted_image = $request->file('image_file');

            // 画像をリサイズしてjpgにencodeする(InterventionImageのImageファサードを使用)
            $resized_image = Image::make($posted_image)->fit(200, 200)->encode('jpg'); // CSSで円形にする

            // さらに自動回転を行う(ここでEXIFが削除される)
            $resized_image->orientate()->save();

            // 加工した画像からhashを生成し、ファイル名を設定する
            $image_hash = md5($resized_image->__toString());
            $image_name = "{$image_hash}.jpg";

            // 現在設定中の画像があれば削除し、加工した新しい画像を保存する
            if (isset($user_data->image_path)) {
                Storage::disk('s3')->delete('user_images/' . $user_data->image_path);
            }
            Storage::disk('s3')->put('user_images/' . $image_name, $resized_image, 'public');

            // S3のファイルのURLを取得してuser_image_pathカラムに書き込む
            $user_data->user_image_path = Storage::disk('s3')->url('user_images/' . $image_name);
        }

        // フォームにデータを上書きして保存する
        $user_data->fill($users_form)->save();

        return redirect('admin/users');
    }

    // deleteアクション
    public function delete(Request $request)
    {
        // Modelからデータを取得する(idで検索)
        $user_data = User::find($request->id);

        // 画像パスがあればS3の画像ファイルを削除し、テーブルのデータを削除する
        if (isset($user_data->image_path)) {
            Storage::disk('s3')->delete('user_images/' . $user_data->image_path);
        }
        $user_data->delete();

        return redirect('admin/users');
    }

    // indexアクション(ユーザー一覧を表示する)
    public function index()
    {
        // Userモデルから全データを取り出してViewに渡す
        $users = User::all();
        return view('admin.profile.index', ['users' => $users]);
    }

    // showアクション(ユーザー一覧を表示する)
    public function show()
    {
        $id = Auth::user()->id;

        // BuildingIntakesモデルから計算結果を取り出す
        $building_intakes = new BuildingIntake;

        // すでにログインユーザーの計算結果が存在する場合は該当データを取得する
        if ($building_intakes->calculate_exist($id)) {
            $building_intakes = BuildingIntake::where('user_id', $id)->first();
        }

        // SixpackingIntakesモデルから計算結果を取り出す
        $sixpacking_intakes = new SixpackingIntake;

        // すでにログインユーザーの計算結果が存在する場合は該当データを取得する
        if ($sixpacking_intakes->calculate_exist($id)) {
            $sixpacking_intakes = SixpackingIntake::where('user_id', $id)->first();
        }

        // Userモデルからログインユーザーのデータを取り出してViewに渡す
        $user_data = User::find(Auth::user()->id);

        // Viewに渡すパラメータ
        $data = [
            'user_data' => $user_data,
            'building_intakes' => $building_intakes,
            'sixpacking_intakes' => $sixpacking_intakes,
        ];

        return view('admin.profile.mypage', $data);
    }
}
