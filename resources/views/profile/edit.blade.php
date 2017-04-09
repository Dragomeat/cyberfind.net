<?php /** @var \App\Models\User $user */ ?>
@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
                route('profile.show', $user->id) => 'Профиль',
                'Редактирование'
            ]
        ])
        @endcomponent

        <div class="c_box">
            @component('parts.profile.avatar', ['user' => $user])
            @slot('route')
            {{ route('profile.show', $user->id) }}
            @endslot
            @endcomponent

            <div class="c_kabinet-profile">
                <div class="c_kabinet-profile__akk">
                    <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        <div class="c_search-char__title">{{ trans('profile.titles.personal') }}</div>

                        <div class="c_kabinet-profile__top">
                            <div class="c_kabinet-profile__col">
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.login') }}</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="login" value="{{ $user->login }}" required>
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.first_name') }}</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="first_name" value="{{ $user->first_name }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.last_name') }}</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="last_name" value="{{ $user->last_name }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.middle_name') }}</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="middle_name" value="{{ $user->middle_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="c_kabinet-profile__col">
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.age') }}</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="age" value="{{ $user->age }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.country.title') }}</div>
                                    <div class="c_kabinet-profile__place c_kabinet-profile__select">
                                        <select name="country">
                                            @foreach($countries as $value)
                                                <option value="{{ $value }}" {{ $user->country === $value ? 'selected' : '' }}>{{ trans(
                                                         sprintf('fields.country.%s', $value)
                                                    ) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.city') }}</div>
                                    <div class="c_kabinet-profile__place">
                                        <input type="text" name="city" value="{{ $user->city }}">
                                    </div>
                                </div>
                                <div class="c_kabinet-profile__box">
                                    <div class="c_kabinet-profile__label">{{ trans('fields.gender.title') }}</div>
                                    <div class="c_kabinet-profile__place c_kabinet-profile__select">
                                        <select name="gender">
                                            @foreach($gender as $value)
                                                <option value="{{ $value }}" {{ $user->gender === $value ? 'selected' : '' }}>{{ trans(
                                                         sprintf('fields.gender.%s', $value)
                                                    ) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.about') }}</div>
                                <div class="c_kabinet-profile__place c_kabinet-profile__textarea">
                                    <textarea name="about">{{ $user->about }}</textarea>
                                </div>
                            </div>

                            {{--<div class="c_kabinet-profile__box">--}}
                                {{--<div class="c_kabinet-profile__label">{{ trans('fields.avatar') }}</div>--}}
                                {{--<div class="c_kabinet-profile__place">--}}
                                    {{--<input type="checkbox" class="jq-checkbox" name="avatar"/>--}}
                                    {{--<label for="avatar">Обновить аватар?</label>--}}
                                {{--</div>--}}

                                {{--<p>--}}
                                    {{--<span style="font-size: 13px">Для загрузки аватарок используйте сервис Gravatar</span>--}}
                                {{--</p>--}}
                            {{--</div>--}}

                        </div><!-- .kabinet-profile top -->

                        <div class="c_search-char__title">{{ trans('profile.titles.contacts') }}</div>

                        <div class="c_kabinet-soc c_kabinet-contact">
                            <div class="c_kabinet-soc__col">
                                <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__skype">
                                    <input type="text" name="skype" placeholder="Ваш Skype" value="{{ $user->skype }}">
                                </div>
                                <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__tel">
                                    <input type="tel" name="telephone" placeholder="Ваш телефон"
                                           value="{{ $user->telephone }}">
                                </div>
                            </div>
                        </div><!-- .kabinet-profile social -->

                        {{--<div class="c_kabinet-bottom">--}}
                        {{--<div class="c_kabinet-game">--}}
                        {{--<div class="c_search-char__title">Безопасность</div>--}}
                        {{--<div class="c_kabinet-profile__box">--}}
                        {{--<div class="c_kabinet-profile__label">Старый пароль</div>--}}
                        {{--<div class="c_kabinet-profile__place">--}}
                        {{--<input type="password" name="old_password">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="c_kabinet-profile__box">--}}
                        {{--<div class="c_kabinet-profile__label">Новый пароль</div>--}}
                        {{--<div class="c_kabinet-profile__place">--}}
                        {{--<input type="password" name="password">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="c_kabinet-profile__box" style="margin-bottom: 20px;">--}}
                        {{--<div class="c_kabinet-profile__label">Новый пароль еще раз</div>--}}
                        {{--<div class="c_kabinet-profile__place">--}}
                        {{--<input type="password" name="password_confirmation">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div><!-- .kabinet-pass -->--}}
                        {{--</div><!-- .kabinet-bottom -->--}}

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