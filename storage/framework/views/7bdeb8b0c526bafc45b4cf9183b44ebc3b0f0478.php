<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/jquery.formstyler.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>

<header class="b_box header">
    <div class="b_inb">
        <a href="#" class="h_logo"></a>
        <div class="h_info">
            <div class="h_auth">
                <?php if(Auth::check()): ?>
                    
                    <a href="<?php echo e(route('profile.show', Auth::id())); ?>" class="h_profile" title="Ваш профиль"></a>
                    <form action="<?php echo e(route('auth.logout')); ?>" method="POST" id="_logout" style="display: none;">
                        <?php echo csrf_field(); ?>

                    </form>
                    <a href="<?php echo e(route('auth.logout')); ?>" onclick="event.preventDefault();
                      document.getElementById('_logout').submit();" class="h_logout" title="Выйти"></a>
                <?php else: ?>
                    <a href="#" class="h_steam" title="Войти через Steam"></a>
                    <a href="<?php echo e(route('auth.login')); ?>" class="h_logout h_login" data-event="login" title="Войти"></a>
                <?php endif; ?>
            </div>
            <nav class="h_nav">
                <ul>
                    <li class="current-menu-item"><a href="#">ГЛАВНАЯ</a></li>
                    <li><a href="#">ПОИСК ИГРОКА</a></li>
                    <li><a href="#">ПОИСК КОМАНДЫ</a></li>
                    <li><a href="#">О НАС</a></li>
                    <li><a href="#">ПАРТНЕРЫ</a></li>
                    <li><a href="#">КОНТАКТЫ</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header><!-- .header-->

<main class="b_box content">
    <?php echo $__env->yieldContent('content'); ?>
</main><!-- .content -->

<footer class="b_box footer">
    <div class="b_inb">
        <div class="f_copy"><a href="<?php echo e(route('index')); ?>"><?php echo e(config('app.name')); ?></a> &copy; 2010-<?php echo e(date('Y')); ?>.
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

<div class="popup-login popup">
    <div class="popup-close">x</div>
    <div class="popup-head">
        <div class="popup-title">Вход</div>
    </div>
    <div class="popup-body">
        <form action="<?php echo e(route('auth.login.post')); ?>" method='post' class="form">
            <div class='form-label'>
                <label>E-mail</label>
                <input type="email" name='email'/>
            </div>
            <div class='form-label'>
                <label>Пароль</label>
                <input type="password" name="password"/>
                <div class="popup-forgetpass"><a href="#">Забыли пароль?</a></div>
            </div>
            <div class="form-label">
                <div class="g-recaptcha" data-theme="dark"
                     data-sitekey="<?php echo e(config('services.recaptcha.site_key')); ?>"></div>
                <?php echo csrf_field(); ?>

            </div>
            <input type="submit" value='ВОЙТИ И ИГРАТЬ'>
        </form>
    </div>
    <div class="popup-bottom">
        <a href="#" class="popup-bottom-notakk">Нет аккаунта?</a>
        <a href="#" class="popup-bottom-reg">регистрация сейчас ></a>
    </div>
</div>

<div class="popup-thy popup">
    <div class="popup-close"></div>
    <div class="popup-head">
        <div class="popup-title">Ваша заявка успешно отправлена.</div>
    </div>
</div>

<div class="overlay"></div>

<!-- Scripts -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="<?php echo e(asset('js/jquery.forms.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.formstyler.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>

</body>
</html>