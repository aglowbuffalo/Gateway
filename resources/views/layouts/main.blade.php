<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Api exercise</title>

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>

            <header class="header text-center gray-linear-gradient min-width-600">
                <div id="header-title"> <a class="link-text" href="{{ url('/') }}" > RESTful API for use in interviews at Reward Gateway </a></div>
                <nav>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="{{ url('no-db') }}" class="nav-link">no DB</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">DB</a>
                        </li>

                    </ul>
                </nav>
            </header>

            @yield('content')

            <footer class="text-center gray-linear-gradient min-width-600">
                <p><a href="mailto:knowuuse@gmail.com">knowuuse@gmail.com</a></p>
            </footer>
    </body>
</html>
