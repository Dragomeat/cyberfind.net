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
                                    <input type="text" value="{{ $user->login }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Фамилия</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->last_name }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Имя</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->first_name }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Отчество</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->middle_name }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="c_kabinet-profile__col">
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Возраст</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->age }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Страна</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ trans(
                                        sprintf('admin_users.fields.country.%s', $user->country ?? 'unknown')
                                    ) }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Город</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->city }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">Пол</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ trans(
                                        sprintf('admin_users.fields.gender.%s', $user->gender ?? 'unknown')
                                    ) }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="c_kabinet-profile__box">
                            <div class="c_kabinet-profile__label">О себе</div>
                            <div class="c_kabinet-profile__place c_kabinet-profile__textarea">
                                <textarea readonly>{{ $user->about }}</textarea>
                            </div>
                        </div>

                    </div><!-- .kabinet-profile top -->

                    @if($vkUrl = $user->getVkontakteUrl())
                        <div class="c_search-char__title">Социальные профили</div>

                        <div class="c_kabinet-soc">
                            <div class="c_kabinet-soc__col">
                                @if($vkUrl)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__vk">
                                        <input type="text" value="{{ $vkUrl }}" readonly>
                                    </div>
                                @endif
                                {{--@if($facebook !== null)--}}
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__fb">--}}
                                {{--<input type="text" value="{{ $facebook->provider_user_id }}" readonly>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                            </div>

                            <div class="c_kabinet-soc__col">
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__twich">--}}
                                {{--<input type="text" name="soc-vk" placeholder="">--}}
                                {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}
                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__yt">--}}
                                {{--<input type="text" name="soc-vk" placeholder="">--}}
                                {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}

                                {{--<div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__tw">--}}
                                {{--<input type="text" name="soc-vk" placeholder="">--}}
                                {{--<div class="c_kabinet-profile__place-change c_kabinet-soc__change">Изменить</div>--}}
                                {{--</div>--}}
                            </div>
                        </div><!-- .kabinet-profile social -->
                    @endif

                    @if($user->show_email || $user->skype || $user->telephone)
                        <div class="c_search-char__title">Контактные данные</div>

                        <div class="c_kabinet-soc c_kabinet-contact">
                            <div class="c_kabinet-soc__col">
                                @if($user->show_email)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__email">
                                        <input type="text" value="{{ $user->email }}" readonly/>
                                    </div>
                                @endif
                                @if($user->skype)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__skype">
                                        <span>{{ $user->skype }}</span>
                                    </div>
                                @endif
                                @if($user->telephone)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__tel">
                                        <input type="text" value="{{ $user->telephone }}" readonly/>
                                    </div>
                                @endif
                            </div>
                        </div><!-- .kabinet-profile social -->
                    @endif

                    <div class="c_kabinet-bottom">
                        {{--<div class="c_kabinet-game">--}}
                        {{--<div class="c_search-char__title">Анкеты</div>--}}
                        {{--<div class="c_kabinet-profile__box">--}}
                        {{--<div class="c_kabinet-profile__label">Поиск игрока</div>--}}
                        {{--<div class="c_kabinet-profile__place c_kabinet-game__list">--}}
                        {{--<label for="player-csgo"><img src="/images/bg-main-csgo.png" alt="CS:GO"></label>--}}
                        {{--<input type="radio" name="search-player" id="player-csgo" value="csgo">--}}
                        {{--<label for="player-lol"><img src="/images/bg-main-lol.png" alt="lol"></label>--}}
                        {{--<input type="radio" name="search-player" id="player-lol" value="lol">--}}
                        {{--<label for="player-dota2"><img src="/images/bg-main-dota2.png" alt="DOTA2"></label>--}}
                        {{--<input type="radio" name="search-player" id="player-dota2" value="dota2">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="c_kabinet-profile__box">--}}
                        {{--<div class="c_kabinet-profile__label">Поиск команды</div>--}}
                        {{--<div class="c_kabinet-profile__place c_kabinet-game__list">--}}
                        {{--<label for="comand-csgo"><img src="/images/bg-main-csgo.png" alt="CS:GO"></label>--}}
                        {{--<input type="radio" name="search-comand" id="comand-csgo" value="csgo">--}}
                        {{--<label for="comand-lol"><img src="/images/bg-main-lol.png" alt="lol"></label>--}}
                        {{--<input type="radio" name="search-comand" id="comand-lol" value="lol">--}}
                        {{--<label for="comand-dota2"><img src="/images/bg-main-dota2.png" alt="DOTA2"></label>--}}
                        {{--<input type="radio" name="search-comand" id="comand-dota2" value="dota2">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div><!-- .kabinet-game -->--}}
                        @can('update', $user)
                            <a href="{{ route('profile.edit', $user->id) }}" class="c_kabinet-edit">Редактировать
                                профиль</a>
                        @endcan
                    </div><!-- .kabinet-bottom -->
                </div>
            </div><!-- .kabinet-profile -->

        </div><!-- .c_box -->
    </div>
@endsection