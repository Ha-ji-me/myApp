<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'まいあっぷ') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- fontawesome6でアイコン取得 -->
    <script src="https://kit.fontawesome.com/1646a14d8e.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/forum.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> -->
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'まいあっぷ') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- 2月13日追記箇所 --}}
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!-- みんなの投稿 -->
                            みんなの投稿
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{url()->current()==route('home')? 'active' : ''}}" href="{{ route('home') }}">
                                    <i class="fas fa-home pr-2">
                                    出来事の投稿
                                    </i>
                                </a>
                                <a class="dropdown-item {{url()->current()==route('todo-post.index')?'active':''}}" href="{{ route('todo-post.index') }}">
                                    <i class="fas fa-fire">
                                    Todoの投稿
                                    </i>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!-- 投稿の作成 -->
                            新規投稿
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{url()->current()==route('incident-post.create')? 'active' : ''}}" href="{{ route('incident-post.create') }}">
                                    <i class="fas fa-pen-nib pr-2"> 出来事の新規投稿</i>
                                </a>
                                <a class="dropdown-item {{url()->current()==route('todo-post.create')?'active':''}}" href="{{ route('todo-post.create') }}">
                                    <i class="fas fa-pen-nib pr-2"> Todoの新規投稿</i>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!-- 自分の投稿 -->
                            自分の投稿
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{url()->current()==route('home.myPost')?'active':''}}" href="{{ route('home.myPost') }}">
                                    <i class="fas fa-user-edit pr-2">
                                    出来事の投稿
                                    </i>
                                </a>
                                <a class="dropdown-item {{url()->current()==route('todo-post.myPost')?'active':''}}" href="{{ route('todo-post.myPost') }}">
                                    <i class="fas fa-user-edit pr-2">
                                    Todoの投稿
                                    </i>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!-- 自分の投稿 -->
                            myアクション
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{url()->current()==route('home.myComment')?'active':''}}" href="{{ route('home.myComment') }}">
                                    <i class="fas fa-light fa-comments pr-2">
                                        コメントした投稿
                                    </i>
                                </a>
                                <a class="dropdown-item {{url()->current()==route('home.myFavorite')?'active':''}}" href="{{ route('home.myFavorite') }}">
                                    <i class="fas fa-light fa-solid fa-heart">
                                        お気に入りした投稿
                                    </i>
                                </a>
                            </div>
                        </li>
                    </ul>
                    {{-- 変更すべし --}}
                    @can('admin')
                    <a href="{{route('profile.index')}}"
                    class=" {{url()->current()==route('profile.index')?'active':''}}">
                        <i class="fas fa-user-edit pr-2" style="color: #686b68;"></i><span>ユーザーアカウント</span>
                    </a>
                    @endcan
                    {{-- ここまで追記 --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <!-- ログインユーザーのプロフィール画像も表示 -->
                                <img src="{{asset('storage/avatar/'.($user->avatar??'user_default.jpg'))}}"
                                    class="rounded-circle" style="width:40px;height:40px;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <!-- メニューバー項目 -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!-- プロフィール編集バー追加 -->
                                    <a class="dropdown-item" href="{{ route('profile.edit', auth()->user()->id) }}">
                                        <i class="fas fa-solid fa-address-card"></i>
                                        プロフィール編集
                                    </a>
                                    <!-- ログアウトバー -->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{-- 表示されない --}}
                                                    {{-- <i class="fas fa-solid fa-arrow-right-from-bracket"></i> --}}
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(Auth::check())
            <div class="container">
                <div class="row">
                    {{-- サイドバーの表示 --}}
                    {{-- <div class="col-12 col-md-4 col-lg-3">
                    @include('layouts.sidebar')
                    </div> --}}
                    <div class="col-12 col-md-8  col-lg-9">
                    <!-- -- エラーメッセージ表示 -- -->
                    <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->
                    {{-- @yield('content') --}}
                    </div>
                </div>
                @yield('content')
            </div>
            @else
            @yield('content')
            @endif
        </main>
    </div>
</body>
</html>
