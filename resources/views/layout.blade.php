<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token() }}}">
    <title>@yield('page_name')</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/styles.scss">
    <link rel="stylesheet" href="http://127.0.0.1:8000/js/script.js">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="vendor/components/jquery/jquery.js">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"
            integrity="sha256-9yRP/2EFlblE92vzCA10469Ctd0jT48HnmmMw5rJZrA=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');
    </style>
</head>
<body class="">

<div class="wrapper">
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                    <img src="img/car-parts.png" alt="">
                    <span class="fs-4 logo-name">Автопортал 3D</span>
                </a>


                <div class="location">
                    <div class="logo-city col">
                        <img src="img/location-marker.png" alt="">
                        <span>г.Астрахань</span>
                    </div>
                </div>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto header-links">
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none " href="/">Главная</a>
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none " href="/catalog">Каталог</a>
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <a class="me-3 py-2 link-body-emphasis text-decoration-none"
                           href="{{route('user.registration')}}">Зарегистрируйся</a>
                        <a class="me-3 py-2 link-body-emphasis text-decoration-none "
                           href="{{route('user.login')}}">Войти</a>
                    @elseif(Auth::user()->email == 'bahilinvit@mail.ru')
                        <a class="me-3 py-2 link-body-emphasis text-decoration-none "
                           href="{{route('user.admin')}}">Панель управления</a>
                        <a class="me-3 py-2 link-body-emphasis text-decoration-none " href="/logout">Выйти</a>
                    @else
                        <a class="me-3 py-2 link-body-emphasis text-decoration-none " href="/private">Личный
                            кабинет</a>
                        <a class="me-3 py-2 link-body-emphasis text-decoration-none " href="/logout">Выйти</a>
                    @endif
                    <a class="py-2 link-body-emphasis text-decoration-none " href="/contacts">Контакты</a>
                </nav>
            </div>
        </header>
        <div class="container" id="content">
            @yield('main_content')
        </div>
    </div>


</div>

</body>
</html>
