<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gradient">
<div class="main-container m-auto max-w-screen-xl rounded-3xl bg-gray-100 shadow-2xl w-full relative">
    <header class="py-5 px-10">
        <nav class="text-xl font-body flex items-center justify-between">
            <div class="flex items-center gap-12 justify-between">
                <a class="hover:scale-105 transition duration-300 " href="{{route('home')}}">
                    <img src="{{asset('images/logo.svg')}}" alt="">
                </a>
                <a class="hover:scale-105 transition duration-300 first-color" href="{{route('home')}}">О сервисе</a>
                <a class="hover:scale-105 transition duration-300 first-color" href="{{route('showCreateApplication')}}">Оставить заявку</a>
                <a class="hover:scale-105 transition duration-300 first-color" href="{{route('contacts')}}">Контакты</a>
            </div>
            @guest
                <div class="login-icon-container">
                    @if($title === 'Вход')
                        <a class="flex first-color items-center gap-2 login-icon" href="{{route('register')}}">
                            Регистрация
                            <svg class="second-color" width="46" height="46" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23 6.23a1.438 1.438 0 0 0 0 2.874c7.674 0 13.896 6.222 13.896 13.896S30.674 36.896 23 36.896a1.438 1.438 0 0 0 0 2.875c9.262 0 16.77-7.509 16.77-16.771S32.263 6.23 23 6.23Z"
                                    fill="currentColor"/>
                                <path
                                    d="M20.067 18.267a1.438 1.438 0 0 1 2.033-2.034l5.75 5.75a1.437 1.437 0 0 1 0 2.033l-5.75 5.75a1.437 1.437 0 1 1-2.033-2.032l3.296-3.297H7.667a1.438 1.438 0 0 1 0-2.875h15.696l-3.296-3.296Z"
                                    fill="currentColor"/>
                            </svg>
                        </a>
                    @else
                        <a class="flex first-color items-center gap-2 login-icon" href="{{route('login')}}">
                            Вход
                            <svg class="second-color" width="46" height="46" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23 6.23a1.438 1.438 0 0 0 0 2.874c7.674 0 13.896 6.222 13.896 13.896S30.674 36.896 23 36.896a1.438 1.438 0 0 0 0 2.875c9.262 0 16.77-7.509 16.77-16.771S32.263 6.23 23 6.23Z"
                                    fill="currentColor"/>
                                <path
                                    d="M20.067 18.267a1.438 1.438 0 0 1 2.033-2.034l5.75 5.75a1.437 1.437 0 0 1 0 2.033l-5.75 5.75a1.437 1.437 0 1 1-2.033-2.032l3.296-3.297H7.667a1.438 1.438 0 0 1 0-2.875h15.696l-3.296-3.296Z"
                                    fill="currentColor"/>
                            </svg>
                        </a>
                </div>
            @endif
            @endguest
            @auth
                <div class="dropdown">
                    <button class="hover:scale-105 transition duration-300  dropbtn flex justify-content-center items-center ">
                        <a href="{{route('profile', ['id' => auth()->id()])}}">
                            <img class="w-16 h-16 rounded-full"
                                 src="{{auth()->user()->avatar === null ? asset('images/no-avatar.svg')  : url('uploads/' . auth()->user()->avatar ) }}"
                                 id="user-avatar" alt="user photo">
                        </a>
                    </button>
                    <div class="dropdown-content">
                        @if(Auth::user()->role=== 'admin' || Auth::user()->role=== 'dispatcher')
                            <a href="{{route('admin')}}" class="dropdown-items">
                                Админ-панель
                            </a>
                        @endif
                        <a href="{{route('applications')}}" class="dropdown-items">
                            Мои заявки
                        </a>
                        <a href="{{route('profile', ['id' => auth()->id()])}}" class="dropdown-items">
                            Профиль
                        </a>
                        <form class="" action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn dropdown-items logout-btn" type="submit">Выйти</button>
                        </form>
                    </div>
                </div>
            @endauth
        </nav>
    </header>
    <main class="main-pages">
        @yield('content')
    </main>
    <footer class="hidden py-8 px-10 gradient rounded-b-2xl ">
    </footer>
</div>
@include('components.scripts.save-scroll-position')
@include('components.scripts.flash-control')
@include('components.scripts.showFlash')

</body>
</html>
