<!doctype html>
<html>
    <head>
        <title>@yield('page_title')</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div style="background: black">
        <h1  style="color: white">Laracast intro</h1>
    </div>

        @yield('content_main')

        <div style="background: black; color: white">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/?name=cody">Home Cody</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/project/create">Create a project</a></li>
            </ul>
        </div>
    </body>
</html>