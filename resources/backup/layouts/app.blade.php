<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CyberFind') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="app">
    <nav class="c_header navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('images/cyberfind.svg') }}" alt="{{ config('app.name', 'Laravel') }}"
                         class="c_header__image">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav c_header__navbar">
                    <li>
                        <a href="{{ route('index') }}">{{ trans('header.links.index') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}">{{ trans('header.links.news') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('search.index', 'user') }}">{{ trans('header.links.search_user') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('search.index', 'team') }}">{{ trans('header.links.search_team') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">{{ trans('header.links.about') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contacts') }}">{{ trans('header.links.contacts') }}</a>
                    </li>
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li>
                            <a href="{{ route('auth.login') }}">
                                <span class="glyphicon glyphicon-log-in"></span>
                            </a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->login }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('auth.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container c_section">
            <div class="row">
                @yield('breadcrumbs')
            </div>
            <div class="row">
                <div class="c_wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <footer class="c_footer">
        <div class="container c_footer__content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 c_copyrights">
                            <a href="{{ route('index') }}">
                                {{ config('app.name') }}
                            </a>
                            <span>&copy; 2010-2017</span>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <ul class="c_socials list-inline">
                                <li class="gp"><a href=""></a></li>
                                <li class="tw"><a href=""></a></li>
                                <li class="vk"><a href=""></a></li>
                                <li class="fb"><a href=""></a></li>
                                <li class="in"><a href=""></a></li>
                                <li class="yt"><a href=""></a></li>
                                <li class="sm"><a href=""></a></li>
                                <li class="ok"><a href=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
