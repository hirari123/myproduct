@extends('layouts.app')

@section('title', '登録ユーザーの一覧')

{{-- ナビゲーションバー --}}
@section('navbar-left')
<li>
    <a class="nav-link" href="{{ url('/admin/articles') }}">
        みんなの投稿
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/admin/users') }}">
        みんなのプロフィール
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/building_intake') }}">
        効率よく筋肉量を増やす
    </a>
</li>
<li>
    <a class="nav-link" href="{{ url('/calculate/sixpacking_intake') }}">
        最速で腹筋を割る
    </a>
</li>
@endsection

{{-- ここからコンテンツ --}}
@section('content')
<div class="container mt-3">
    <div class="row">
        <h2 class="h3 m-2">みんなのプロフィール</h2><img src="{{ '/images/speaking.jpeg' }}" height="25px" class="mt-2">
    </div>
    <br>

    {{-- ユーザーをforeachでカード表示する --}}
    <div class="row">
        @foreach ($users as $user)
        <div class="card-deck mb-4 mr-2">
            <div class="card" style="width: 24em">
                <div class="card-header bg-dark text-white py-1">
                    @isset($user->user_image_path)
                    <img class="prof-image float-left" src="{{ $user->user_image_path }}">
                    @else
                    <img class="prof-image float-left" src="{{ '/images/defaulte_user.png' }}">
                    @endisset
                    <span class="float-left pl-2 pt-3">
                        名前：{{ $user->name }}
                    </span>
                </div>
                <div class="card-body">
                    {{ $user->introduction }}
                </div>

                {{-- ログインユーザーと一致する場合もしくは管理者の場合は編集リンクを表示 --}}
                @if (Auth::user()->email == "guest@gmail.com")
                @elseif (Auth::user()->id == $user->id || Auth::user()->id == 1)
                <div class="card-footer">
                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $user->id]) }}">編集する</a>
                    <a href="{{ action('Admin\ProfileController@delete', ['id' => $user->id]) }}">削除する</a>
                </div>
                @endif

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection