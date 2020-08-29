<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  //add,create,edit,updateアクションを作成200812
  public function add()
  {
    return view('admin.profile.create');
  }

  public function create()
  {
    return redirect('admin/profile/create');
  }

  public function edit()
  {
    return view('admin.profile.edit');
  }

  public function update()
  {
    return redirect('admin/profile/edit');
  }
  
  // indexアクションを定義(検索機能は実装しない)
  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    $users = User::all();
    return view('admin.profile.index', ['users' => $users, 'cond_title' => $cond_title]);
  }

}
