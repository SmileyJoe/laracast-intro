<!doctype html>
<html>
    <head>
        <title>@yield('page_title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

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