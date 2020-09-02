{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- タイトルを埋め込む --}}
@section('title', 'ユーザーの一覧')

{{-- コンテンツを埋め込む --}}
@section('content')
  <div class="container">
    <div class="row">
      <h2>登録ユーザーの一覧</h2>
    </div>

    {{-- 検索で取得した結果をforeachで表示する --}}
    <div class="row">
      <div class="list-news col-md-12 mx-auto">
        <div class="row">
          <table class="table table-dark">
            <thead>
              <tr>
                <th width="10%">ID</th>
                <th width="30%">名前</th>
                <th width="40%">ひとこと</th>
                <th width="10%">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <th>{{ $user->id }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ Str::limit($user->body, 30) }}</td>
                  <td>
                    <div>
                      <a href="{{ action('Admin\ProfileController@edit', ['id' => $user->id]) }}">編集</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection