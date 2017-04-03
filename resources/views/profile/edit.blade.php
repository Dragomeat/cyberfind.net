<?php /** @var \App\Models\User $user */ ?>
@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_breadcrumbs">
            <a href="#">Главная</a> /
            <span class="current">Личный кабинет</span>
        </div>
        <div class="c_box">
            <div class="c_kabinet-thumb">
                <a href="#">
					<span class="c_kabinet-thumb__img">
						<img src="{{ asset('static/avatars/'. $user->avatar) }}" alt="thumb">
						<span class="c_kabinet-thumb__dot active"></span>
					</span>
                    <span class="c_kabinet-thumb__name">{{ $user->login }}</span>
                </a>
            </div><!-- .c_kabinet-thumb -->

            <div class="c_kabinet-profile">
                <div class="c_kabinet-profile__akk">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        <div class="c_search-char__title">Персональные данные</div>

                        <div class="c_kabinet-profile__top">
                            <div class="c_kabinet-profile__col">
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Никнейм</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="login" value="{{ $user->login }}" required>
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Фамилия</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="first_name" value="{{ $user->first_name }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Имя</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="last_name" value="{{ $user->last_name }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Отчество</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="middle_name" value="{{ $user->middle_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="c_kabinet-profile__col">
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Возраст</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="age" value="{{ $user->age }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Страна</div>
                                    <div class="c_kabinet-profile__place c_kabinet-profile__select">
                                        <select name="country">
                                            <option value="ru">Россия</option>
                                            <option value="ua">Украина</option>
                                            <option value="us">США</option>
                                            <option value="cn">Китай</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Город</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="city" value="{{ $user->city }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Пол</div>
                                    <div class="c_kabinet-profile__place c_kabinet-profile__select">
                                        <select name="gender">
                                            <option value="male">Мужской</option>
                                            <option value="female">Женский</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">О себе</div>
                                <div class="c_kabinet-profile__place c_kabinet-profile__textarea">
                                    <textarea name="about"></textarea>
                                    <div class="c_kabinet-profile__place-change">
                                        <button>Изменить описание</button>
                                    </div>
                                </div>
                            </div>

                        </div><!-- .kabinet-profile top -->

                        {{--<div class="c_search-char__title">Социальные профиль</div>--}}

                        {{--<div class="c_kabinet-soc">--}}
                            {{--<div class="c_kabinet-soc__col">--}}
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__vk">--}}
                                    {{--<input type="text" name="soc-vk" placeholder="">--}}
                                    {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__twich">--}}
                                    {{--<input type="text" name="soc-vk" placeholder="">--}}
                                    {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__yt">--}}
                                    {{--<input type="text" name="soc-vk" placeholder="">--}}
                                    {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="c_kabinet-soc__col">--}}
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__fb">--}}
                                    {{--<input type="text" name="soc-vk" placeholder="">--}}
                                    {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__tw">--}}
                                    {{--<input type="text" name="soc-vk" placeholder="">--}}
                                    {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div><!-- .kabinet-profile social -->--}}

                        <div class="c_search-char__title">Контактные данные</div>

                        <div class="c_kabinet-soc c_kabinet-contact">
                            <div class="c_kabinet-soc__col">
                                <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__skype">
                                    <input type="text" name="skype" placeholder="Ваш Skype">
                                </div>
                                <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__tel">
                                    <input type="tel" name="telephone" placeholder="Ваш телефон" value="{{ $user->telephone }}">
                                </div>
                            </div>
                        </div><!-- .kabinet-profile social -->

                        <div class="c_kabinet-bottom">
                            <div class="c_kabinet-game">
                                <div class="c_search-char__title">Безопасность</div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Старый пароль</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="password" name="old_password">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">Новый пароль</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="password" name="password">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box" style="margin-bottom: 20px;">
                                    <div class="c_kabinet-profile__label">Новый пароль еще раз</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="password" name="password_confirmation">
                                    </div>
                                </div>
                            </div><!-- .kabinet-pass -->
                        </div><!-- .kabinet-bottom -->

                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}

                        <input type="submit" class="c_kabinet-submit" value="Сохранить изменения">
                        <a href="{{ route('profile.show', $user->id) }}" class="c_kabinet-back">Назад к профилю</a>
                    </form>
                </div>
            </div><!-- .kabinet-profile -->

        </div><!-- .c_box -->
    </div>
@endsection