<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Article;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // RouteServicePrividerでHOME定数の値を変更する(ここではHOMEのまま)
    // なおここで変更してもMiddlewareのRedirectIfAuthenticated.phpが優先される

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // ゲストログインを追加
    public function guestLogin(Request $request)
    {
        // dd($request->input('email'), $request->input('password'));
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // ゲストログイン認証に成功した場合の処理
            $search_text = $request->search_text;
            $articles = Article::orderBy('created_at', 'desc')->paginate(10);

            return view('admin.article.index', ['articles' => $articles, 'search_text' => $search_text]);
        } else {
            return redirect('/'); // 失敗した場合
        }
    }
}
