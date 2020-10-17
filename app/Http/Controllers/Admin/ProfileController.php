<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User; // Userモデルを使う
use Illuminate\Support\Facades\Auth; // Authファサードを使う
use Intervention\Image\Facades\Image; // InterventionImageを使う(画像リサイズ)
use Illuminate\Support\Facades\Storage; // Storageファサードを使う(ユーザー画像を保存)

class ProfileController extends Controller
{
    // editアクション
    public function edit()
    {
        // Modelからデータを取得する(ログインユーザーのidで検索)
        $user_data = User::find(Auth::user()->id);

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

        // 画像処理を追加
        // フォームに画像があれば画像を保存する処理を行う(画像が無い場合を先にした方が良いコード？)
        if (isset($users_form['image'])) {

            // 新しい画像ファイルとファイル名を取得
            $posted_image = $request->file('image');

            // 画像をリサイズしてjpgにencodeする(InterventionImageのImageファサードを使用)
            $resized_image = Image::make($posted_image)->fit(200, 200)->encode('jpg'); // CSSで円形にする

            // さらに自動回転を行う(ここでEXIFが削除される)
            $resized_image->orientate()->save();

            // 加工した画像からhashを生成し、ファイル名を設定する
            $image_hash = md5($resized_image->__toString());
            $image_name = "{$image_hash}.jpg"; // todo:「$image_name」という変数は無くせないか？
            $user_data->user_image_path = $image_name; // user_image_pathカラムに書き込む

            // 加工した画像を保存する
            Storage::put('public/user_image/' . $image_name, $resized_image); // Storageファサードを使用

        } elseif (strcmp($request->remove, 'true') == 0) {
            $user_data->user_image_path = null; // 画像を削除する場合はnullをセット(画像自体は削除してない！)
        }

        // データを上書きして保存する
        $user_data->fill($users_form);
        $user_data->save();

        return redirect('admin/users');
    }

    // deleteアクション
    public function delete(Request $request)
    {
        // Modelからデータを取得して削除する
        $user_data = User::find($request->id);
        $user_data->delete();

        return redirect('admin/users');
    }

    // indexアクション
    public function index()
    {
        // Userモデルから全データを取り出してViewに渡す
        $users = User::all();
        return view('admin.profile.index', ['users' => $users]);
    }
}
