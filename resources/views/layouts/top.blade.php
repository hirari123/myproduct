<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- 各ページに@yieldでタイトルを入れる --}}
    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- Laravel標準で用意されるJavaScriptを読み込む(publicディレクトリ) --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" type="text/css">

    <!-- Styles -->
    {{-- Laravel標準で用意されるCSSを読み込む --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- トップページ用に作成するCSSを読み込む --}}
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/cat_icon.jpeg') }}" type="image/x-icon">
  </head>
  <!-- ここまでheadタグ -->


  <body>
    <div id="app">
      <!-- ここからナビゲーションバー -->
      <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
        <div class="container">
          <!-- サイトロゴ -->
          <a class="navbar-brand" href="{{ url('/top') }}">
            {{ config('app.name', 'Paleos') }}
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- ナビゲーションバー(左側) -->
            <ul class="navbar-nav mx-auto">
              <li><a class="=nav-link" href="{{ url('#') }}">未作成のリンク</a></li>
              <li><a class="=nav-link" href="{{ url('#') }}">未作成のリンク</a></li>
            </ul>

            <!-- ナビゲーションバー(右側) -->
            <ul class="navbar-nav ml-auto">
              <!-- 新規登録のリンク -->
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('messages.Register') }}</a></li>
            </ul>

          </div>
        </div>
      </nav>
      <!-- ここまでナビゲーションバー -->

      <!-- ここからメインタグ -->
      <main class="py-4">
        {{-- ここに各コンテンツが入る --}}
        @yield('content')
      </main>

    </div>
  </body>
</html>