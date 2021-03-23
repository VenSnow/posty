<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Posty</title>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="p-3">Главная</a>
                </li>
                @auth()
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Панель</a>
                </li>
                @endauth
                <li>
                    <a href="{{ route('posts.index') }}" class="p-3">Посты</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth()
                    <li>
                        <a href="#" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf
                            <button type="submit">Выход</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Вход</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Регистрация</a>
                    </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
