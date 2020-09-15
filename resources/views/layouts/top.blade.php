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
            <a class="btn btn-success" href="{{ route('register') }}">{{ __('messages.Register') }}はこちら</a>
            <a class="btn btn-info" href="{{ route('register') }}">ゲストログインで全機能を使用(期間限定)</a>
          </div>
        </div>
        @yield('login_form')
      </div>
    </div>
    <div class="top-contens ml-5">
      <h4>Paleo Boostでできること</h4>
      <ul>
        <li>投稿作成機能(画像付き可)</li>
        <li>投稿の編集,削除機能</li>
        <li>コメント機能</li>
        <li>いいね機能</li>
      </ul>
    </div>
  </div>
@endsection

