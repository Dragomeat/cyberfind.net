<?php $__env->startSection('content'); ?>
    <div class="b_inb">
        <div class="c_breadcrumbs">
            <a href="#">Главная</a> /
            <span class="current">Вход</span>
        </div>
        <div class="c_box">
            <div class="c_box-contact">
                <h1>Вход</h1>
                <div class="c_box-ins">
                    <div class="c_reg-form">
                        <form action="<?php echo e(route('auth.login.post')); ?>" method="POST">
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Email:</div>
                                <div class="c_reg-item__box"><input type="email" name="email"/></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__name">Пароль:</div>
                                <div class="c_reg-item__box"><input type="password" name="password"/></div>
                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <div class="g-recaptcha" data-theme="dark" data-sitekey="<?php echo e(config('services.recaptcha.site_key')); ?>"></div>
                                </div>

                                <?php echo csrf_field(); ?>

                            </div>
                            <div class="c_reg-item">
                                <div class="c_reg-item__box">
                                    <input type="submit" value="Вход">
                                    
                                    <a href="<?php echo e(route('auth.register')); ?>" class="c_reg-login" data-event="register">Нет акаунта?</a>
                                    <div class="c_reg-socials">
                                        <ul class="f_soc">
                                            <li class="vk"><a href="<?php echo e(route('auth.social', 'vkontakte')); ?>"></a></li>
                                            <li class="fb"><a href="<?php echo e(route('auth.social', 'facebook')); ?>"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>