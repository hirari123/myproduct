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
                            <input type="hidden" name="email" value="guest@gmail.com">
                            <input type="hidden" name="password" value="guest1234">
                            <button type="submit" class="btn btn-info">ゲストログイン(期間限定)</button>
                        </form>
                    </div>
                </div>
            </div>
            @yield('login_form')
        </div>
    </div>
    <div class="container top-contens pt-3">
        <div class="row">
            <div class="mx-auto col-md-5">
                <h4>Paleo Boostでできること</h4>
                <ul>
                    <li>ユーザー登録・ログイン機能</li>
                    <li>プロフィール編集機能</li>
                    <li>投稿の作成機能(モーダル画面,文字数カウント)</li>
                    <li>画像の投稿機能</li>
                    <li>コメント機能</li>
                    <li>投稿とコメントの編集,削除機能</li>
                    <li>いいね機能(非同期通信)</li>
                    <li>目標摂取カロリー計算機能</li>
                    <li>投稿の検索機能</li>
                    <li>ページネーション</li>
                    <li>ゲストログイン機能</li>
                </ul>
            </div>
            <div class="col-md-4 mr-auto">
                <h4>使用技術,開発環境等</h4>
                <ul>
                    <li>Laravel, PHP, MySQL</li>
                    <li>JavaScript, jQuery, Bootstrap, Sass</li>
                    <li>Git, GitHub, VSCode</li>
                </ul><br>
                <h4>インフラ構成(AWS)</h4>
                <ul>
                    <li>VPC, EC2, ELB(ALB)</li>
                    <li>RDS, S3, Route53</li>
                    <li>Apache, Amazon Linux 2</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection