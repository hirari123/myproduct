@extends('layouts.app')

{{-- メインコンテンツ --}}
@section('content')
<div class="top-contents">
    <div class="top-wrapper" style="color:#fafafa">
        <h1>
            <div class="row">
                <div class="mx-auto">
                    パレオダイエットを
                </div>
            </div>
            <div class="row">
                <div class="mx-auto">
                    コミュニティの力でブーストさせよう
                </div>
            </div>
        </h1>
        <br>
        <div class="row">
            <div class="mx-auto">
                <h3>
                    "Paleo Boost"はパレオダイエッターたちが<br>
                    進化し続けるための情報共有コミュニティです
                </h3>
            </div>
        </div>
        <div class="login-contents">
            <div class="row">
                <div class="mx-auto">
                    <div class="float-left">
                        <a class="btn btn-success" href="{{ route('register') }}">新規登録はこちら</a>
                    </div>
                    <div class="float-right">
                        <form method="post" action="{{ route('login.guest') }}">
                            @csrf
                            <input type="hidden" id="email" name="email" value="guest@gmail.com">
                            <input type="hidden" id="password" name="password" value="guest1234">
                            <button type="submit" class="btn btn-info">ゲストログイン(期間限定)</button>
                        </form>
                    </div>
                </div>
            </div>
            @yield('login_form')
        </div>
    </div>
    <div class="top-contens pt-3">
        <div class="row">
            <div class="col-md-4 ml-auto">
                <h4>Paleo Boostでできること</h4>
                <ul>
                    <li>ユーザー登録</li>
                    <li>投稿作成機能</li>
                    <li>画像の投稿機能</li>
                    <li>投稿と登録ユーザの閲覧</li>
                    <li>投稿の編集,削除機能</li>
                    <li>コメント機能</li>
                </ul>
            </div>
            <div class="col-md-5 mr-auto">
                <h4>今後追加予定の機能</h4>
                <ul>
                    <li>食品データベースを用いた栄養素計算機能</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection