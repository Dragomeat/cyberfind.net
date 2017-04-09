<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/jquery.formstyler.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<header class="b_box header">
    <div class="b_inb">
        <a href="{{ route('index') }}" class="h_logo"></a>
        <div class="h_info">
            <div class="h_auth">
                @if(Auth::check())
                    {{--<a href="#" class="h_mail" title="Сообщения"></a>--}}
                    <a href="{{ route('profile.show', Auth::id()) }}" class="h_profile" title="Ваш профиль"></a>
                    <form action="{{ route('auth.logout') }}" method="POST" id="_logout" style="display: none;">
                        {!! csrf_field() !!}
                    </form>
                    <a href="{{ route('auth.logout') }}" onclick="event.preventDefault();
                      document.getElementById('_logout').submit();" class="h_logout" title="Выйти"></a>
                @else
                    {{--<a href="#" class="h_steam" title="Войти через Steam"></a>--}}
                    <a href="{{ route('auth.login') }}" class="h_logout h_login" data-event="login" title="Войти"></a>
                @endif
            </div>
            <nav class="h_nav">
                <ul> {{--TODO--}}
                    <li>
                        <a href="{{ route('index') }}">Главная</a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}">Новости</a>
                    </li>
                    <li>
                        <a href="{{ route('teams.index') }}">Команды</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">О нас</a>
                    </li>
                    <li>
                        <a href="{{ route('about.contacts') }}">Контакты</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header><!-- .header-->

<main class="b_box content">
    @if (session('status'))
        <div class="c_reg-item b_inb">
            <div class="c_reg-item__box" style="float: none">
                <input type="text"  style="border-color: green; color: green;" value="{{ session('status') }}" readonly/>
            </div>
        </div>
    @endif

    @yield('content')
</main><!-- .content -->

<footer class="b_box footer">
    <div class="b_inb">
        <div class="f_copy"><a href="{{ route('index') }}">{{ config('app.name') }}</a> &copy; 2010-{{ date('Y') }}.
        </div>
        <ul class="f_soc">
            <li class="gp"><a href="#"></a></li>
            <li class="tw"><a href="#"></a></li>
            <li class="vk"><a href="#"></a></li>
            <li class="fb"><a href="#"></a></li>
            <li class="in"><a href="#"></a></li>
            <li class="yt"><a href="#"></a></li>
            <li class="sm"><a href="#"></a></li>
            <li class="ok"><a href="#"></a></li>
        </ul>
    </div>
</footer><!-- .footer -->

<div class="intop">Наверх</div>

<!-- Scripts -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="{{ asset('js/jquery.forms.js') }}"></script>
<script src="{{ asset('js/jquery.formstyler.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>