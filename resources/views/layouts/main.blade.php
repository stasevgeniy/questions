<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>

<body>
<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" href="{{ route('index') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'newQuestion' ? 'active' : '' }}" href="{{ route('newQuestion') }}">Задать вопрос</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('exitUser') }}">Выйти</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'enter' ? 'active' : '' }}" href="{{ route('enter') }}">Войти </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'register' ? 'active' : '' }}" href="{{ route('register') }}">Регистрация </a>
                    </li>
                @endif
            </ul>
        </nav>
        <h3 class="text-muted"><a href="{{ route('index') }}">Вопросы</a></h3>
    </header>

    @yield('content')

    <footer class="footer">
        <hr>
        <p>Вопросы | <a href="mailto:stas.evgen9@gmail.com">stas.evgen9@gmail.com</a> &copy; 2017</p>
    </footer>

</div> <!-- /container -->
</body>
</html>
