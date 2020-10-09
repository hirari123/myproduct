{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')

{{-- タイトルを埋め込む --}}
@section('title', '登録ユーザーの一覧')

{{-- コンテンツを埋め込む --}}
@section('content')
<div class="container">
    <div class="row">
        <h2>登録ユーザーの一覧</h2>
    </div>
    <br>

    {{-- ユーザーをforeachでカード表示する --}}
    <div class="row">
        {{-- <div class="list-news col-md-10 mx-auto"> --}}
        @foreach ($users as $user)
        <div class="card-deck">
            <div class="card" style="width: 24em">
                <div class="card-header bg-dark text-white">
                    @isset($user->user_image_path)
                    <img class="prof-image float-left" src="{{ '/storage/user_image/' . $user->user_image_path }}">
                    @endisset
                    名前：{{ $user->name }}
                </div>
                <div class="card-body">
                    {{ $user->introduction }}
                </div>

                {{-- ログインユーザーのみ編集リンクを設置 --}}
                @if ($user->id == auth::user()->id || auth::user()->id == 1)
                <div class="card-footer">
                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $user->id]) }}">プロフィールを編集する</a>
                </div>
                @endif

            </div>
        </div>
        @endforeach
        {{-- </div> --}}
    </div>
</div>
@endsection