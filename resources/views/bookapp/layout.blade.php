<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b6f5f73da6.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app2" class="">
        <div class="fixed-top">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}"><span>{{ __('Home') }}</span></a>
                    <a class="navbar-brand" href="{{ route('bookapp.slide.booklist') }}"><span>{{ __('BookList') }}</span></a>
                    <a class="navbar-brand" href="{{ route('bookapp.user.user') }}"><span>{{ __('Members') }}</span></a>
                    <a class="navbar-brand" href="{{ route('bookapp.slide.selectBook') }}"><span>{{ __('Create') }}</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('LogOut') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        <a class="dropdown-item" href="{{ route('bookapp.user.index') }}">{{ __('MyPage') }}</a>
                                </li>

                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <main style="margin-top:120px;">
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="footer-wrapper">
            <div class="home"><a  href="{{ route('bookapp.slide.index') }}"><span>{{ __('OutBook') }}</span></a></div>
            <div class="link">
                <a class="" href="{{ route('bookapp.slide.booklist') }}"><span>{{ __('BookList') }}</span></a>
                <a class="" href="{{ route('bookapp.user.user') }}"><span>{{ __('Members') }}</span></a>
                <a class="" href="{{ route('bookapp.slide.create') }}"><span>{{ __('Create') }}</span></a>
                <a class="" href="{{ route('bookapp.slide.todolist') }}"><span>{{ __('todolist') }}</span></a>
            </div>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
