<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>
    <script src="{{ asset('js/strCount.js') }}" defer></script>
    <script src="{{ asset('js/ajaxlike.js') }}" defer></script>
    <script src="{{ asset('js/ajaxbuilding.js') }}" defer></script>
    <script src="{{ asset('js/ajaxsixpacking.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/cat_icon.jpeg') }}" type="image/x-icon">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
</head>


<body>
    <div id="app">
        {{-- ナビゲーションバー --}}
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel py-2">
            <div class="container">
                {{-- サイトロゴ --}}
                <a class="navbar-brand" href="{{ url('/admin/articles') }}">
                    {{ config('app.name', 'Peleo Boost') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- ナビゲーションリンク(グローバルメニュー) --}}
                    <ul class="navbar-nav mr-auto">
                        @yield('navbar-left')
                    </ul>

                    {{-- ログイン情報を右上に表示 --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- ログインしていない場合の処理 --}}
                        @guest
                        <li></li>

                        {{-- ログインしている場合の処理(ドロップダウンメニュー) --}}
                        @else
                        <li class="nav-item dropdown">
                            {{-- ログインユーザー名 --}}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span>{{ Auth::user()->name }}</span>
                                @isset(Auth::user()->user_image_path)
                                <img src="{{ Auth::user()->user_image_path }}">
                                @else
                                <img src="{{ '/images/defaulte_user.jpg' }}">
                                @endisset
                            </a>

                            {{-- プロフィール編集 --}}
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ action('Admin\ProfileController@show', ['id' => Auth::user()->id]) }}">マイページ</a>
                                <a class="dropdown-item"
                                    href="{{ action('Admin\ProfileController@edit', ['id' => Auth::user()->id]) }}">プロフィール編集</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>

        <footer class="mt-4">
            <div class="text-center pt-2">
                <p>Powerd by Hiroyuki Nakajima</p>
            </div>
        </footer>
    </div>
</body>

</html>