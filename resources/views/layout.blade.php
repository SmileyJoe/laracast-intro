<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page_title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    </head>
    <body>
        <nav class="navbar is-dark">
            <div class="navbar-menu">
                <ul class="navbar-start is-active">
                    <a href="/" class="navbar-item">Home</a>
                    <a href="/?name=cody" class="navbar-item">Home Cody</a>
                    <a href="/about" class="navbar-item">About</a>
                    <a href="/contact" class="navbar-item">Contact</a>
                    <a href="/project" class="navbar-item">Projects</a>
                    <a href="/project/create" class="navbar-item">Create a project</a>

                    <!-- Authentication Links -->
                    @guest
                        <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a id="navbarDropdown" class="navbar-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </ul>
            </div>
        </nav>

        <div class="hero is-fullheight-with-navbar">
            <div class="hero-body">
                <div class="container align-top is-paddingless">
                    <h1 class="title">@yield('page_title')</h1>
                    @yield('content_main')
                </div>
            </div>
        </div>
    </body>
</html>