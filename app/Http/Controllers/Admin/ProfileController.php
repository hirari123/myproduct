<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // 通常のリクエスト
// use Illuminate\Foundation\Auth\User; // AuthのUserモデル(以前の記述)
// use Illuminate\Foundation\Auth\RegistersUsers; // 追加(使用していないので無効にする)
use App\User; // Userモデル(こっちを使う)
use Illuminate\Support\Facades\Auth; // Authファサードを使う


class ProfileController extends Controller
{
    // addアクション
    public function add()
    {
        return view('admin.profile.create');
    }

    // createアクション(Registerで作成するのでこれは使わない？無効にする？)
    public function create()
    {
        return redirect('admin/profile/create');
    }


    // editアクション
    public function edit(Request $request)
    {
        // ModelからUserデータを取得する
        // $user_data = User::find($request->id); // Userモデルでidが一致するものをインスタンス化
        // if (empty($user_data))
        // {
        //   abort(404);
        // }
        $user_data = Auth::user();
        return view('admin.profile.edit', ['user_data' => $user_data]);
    }

    // updateアクション
    public function update(Request $request)
    {

        // Modelからデータを取得する
        $user_data = User::find($request->id); // Userモデルでidが一致するものをインスタンス化

        // 送信されてきたフォームデータを取得し、トークンを削除
        $users_form = $request->all();
        unset($users_form['_token']);

        // データを上書きして保存する
        // dd($user_data);
        $user_data->fill($users_form); // ←ここでエラーとなっている
        $user_data->save();

        return redirect('admin/users');
    }

    // deleteアクション(まだ)

    // indexアクションを定義(検索機能は実装しない)
    public function index(Request $request)
    {
        // $cond_title = $request->cond_title;
        $users = User::all();
        return view('admin.profile.index', ['users' => $users]);
    }
}
