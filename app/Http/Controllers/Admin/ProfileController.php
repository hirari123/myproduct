<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User; // AuthのUserモデル
use Illuminate\Http\Request; // 通常のリクエスト

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
    $users = User::find($request->id); // Userモデルでidが一致するものをインスタンス化
    if (empty($users))
    {
      abort(404);
    }
    return view('admin.profile.edit', ['user_form' => $users]);
  }

  // updateアクション
  public function update(Request $request)
  {

    // Modelからデータを取得する
    $users = User::find($request->id); // Userモデルでidが一致するものをインスタンス化
    
    // 送信されてきたフォームデータを格納する
    $users_form = $request->all();
    
    // データを上書きして保存する
    $users->fill($users_form)->save(); // ←ここでエラーとなっている

    return redirect('admin/users');
  }

  // deleteアクション(まだ)
  
  // indexアクションを定義(検索機能は実装しない)
  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    $users = User::all();
    return view('admin.profile.index', ['users' => $users, 'cond_title' => $cond_title]);
  }

}
