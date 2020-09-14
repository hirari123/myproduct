@extends('layouts.app')

{{-- メインコンテンツ --}}
@section('content')
  <div class="top-wrapper">
    <div class="text-center" style="color:#fafafa">
      <h1>パレオダイエットをコミュニティの力でブーストさせよう</h1>
      <p>〜Paleo Boostはパレオダイエッターたちが情報共有するコミュニティです〜</p>
    </div>
    <div class="row">
      <div class="mx-auto">
        <a class="btn btn-success" href="{{ route('register') }}">{{ __('messages.Register') }}はこちら</a>
        <a class="btn btn-info" href="{{ route('register') }}">ゲストログインで全機能を使用(期間限定)</a>
      </div>
    </div>
    @yield('login_form')
  </div>
@endsection

