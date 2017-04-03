<?php /** @var \App\Models\User $user */ ?>


<?php $__env->startSection('content'); ?>
    <div class="b_inb">
        <div class="c_breadcrumbs">
            <a href="#">Главная</a> /
            <span class="current">Личный кабинет</span>
        </div>
        <div class="c_box">

            <div class="c_kabinet-thumb">
                <a href="#">
					<span class="c_kabinet-thumb__img">
						<img src="<?php echo e(asset('static/avatars/'. $user->avatar)); ?>" alt="thumb">
						<span class="c_kabinet-thumb__dot active"></span>
					</span>
                    <span class="c_kabinet-thumb__name"><?php echo e($user->login); ?></span>
                </a>
                <div class="c_kabinet-thumb__onsite online">сейчас на сайте</div>
                <div class="c_kabinet-thumb__progress">
                    <div class="c_kabinet-thumb__proitem">
                        <img src="/images/bg-progress1.jpg" alt="progress1">
                        <div class="c_kabinet-thumb__proinfo"></div>
                    </div>
                    <div class="c_kabinet-thumb__proitem">
                        <img src="/images/bg-progress1.jpg" alt="progress1">
                        <div class="c_kabinet-thumb__proinfo"></div>
                    </div>
                    <div class="c_kabinet-thumb__proitem">
                        <img src="/images/bg-progress1.jpg" alt="progress1">
                        <div class="c_kabinet-thumb__proinfo"></div>
                    </div>
                    <div class="c_kabinet-thumb__proitem">
                        <img src="/images/bg-progress1.jpg" alt="progress1">
                        <div class="c_kabinet-thumb__proinfo"></div>
                    </div>
                    <div class="c_kabinet-thumb__proitem">
                        <img src="/images/bg-progress1.jpg" alt="progress1">
                        <div class="c_kabinet-thumb__proinfo"></div>
                    </div>
                </div>
            </div><!-- .c_kabinet-thumb -->

            <div class="c_kabinet-profile">
                <div class="c_kabinet-profile__akk">
                    <div class="c_search-char__title">Персональные данные</div>

                    <div class="c_kabinet-profile__top">
                        <div class="c_kabinet-profile__col">
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Никнейм</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e($user->login); ?>" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Фамилия</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e($user->last_name); ?>" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Имя</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e($user->first_name); ?>" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Отчество</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e($user->middle_name); ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="c_kabinet-profile__col">
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Возраст</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e($user->age); ?>" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Страна</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e(trans(
                                        sprintf('admin_users.fields.country.%s', $user->country ?? 'unknown')
                                    )); ?>" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Город</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e($user->city); ?>" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Пол</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="<?php echo e(trans(
                                        sprintf('admin_users.fields.gender.%s', $user->gender ?? 'unknown')
                                    )); ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="c_kabinet-profile__box">
                            <div class="c_kabinet-profile__label">О себе</div>
                            <div class="c_kabinet-profile__place c_kabinet-profile__textarea">
                                <textarea readonly><?php echo e($user->about); ?></textarea>
                            </div>
                        </div>

                    </div><!-- .kabinet-profile top -->

                    <?php if($vkUrl = $user->getVkontakteUrl()): ?>
                        <div class="c_search-char__title">Социальные профили</div>

                        <div class="c_kabinet-soc">
                            <div class="c_kabinet-soc__col">
                                <?php if($vkUrl): ?>
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__vk">
                                        <input type="text" value="<?php echo e($vkUrl); ?>" readonly>
                                    </div>
                                <?php endif; ?>
                                
                                
                                
                                
                                
                            </div>

                            <div class="c_kabinet-soc__col">
                                
                                
                                
                                
                                
                                
                                
                                

                                
                                
                                
                                
                            </div>
                        </div><!-- .kabinet-profile social -->
                    <?php endif; ?>

                    <?php if($user->show_email || $user->skype || $user->telephone): ?>
                        <div class="c_search-char__title">Контактные данные</div>

                        <div class="c_kabinet-soc c_kabinet-contact">
                            <div class="c_kabinet-soc__col">
                                <?php if($user->show_email): ?>
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__email">
                                        <input type="text" value="<?php echo e($user->email); ?>" readonly/>
                                    </div>
                                <?php endif; ?>
                                <?php if($user->skype): ?>
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__skype">
                                        <span><?php echo e($user->skype); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($user->telephone): ?>
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__tel">
                                        <input type="text" value="<?php echo e($user->telephone); ?>" readonly/>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div><!-- .kabinet-profile social -->
                    <?php endif; ?>

                    <div class="c_kabinet-bottom">
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                            <a href="<?php echo e(route('profile.edit', $user->id)); ?>" class="c_kabinet-edit">Редактировать
                                профиль</a>
                        <?php endif; ?>
                    </div><!-- .kabinet-bottom -->
                </div>
            </div><!-- .kabinet-profile -->

        </div><!-- .c_box -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>