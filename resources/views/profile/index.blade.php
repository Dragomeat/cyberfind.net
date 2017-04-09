<?php /** @var \App\Models\User $user */ ?>
@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
                 'Профиль'
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
                    <div class="c_search-char__title">{{ trans('profile.titles.personal') }}</div>

                    <div class="c_kabinet-profile__top">
                        <div class="c_kabinet-profile__col">
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.login') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->login }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.first_name') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->first_name }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.last_name') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->last_name }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.middle_name') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->middle_name }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="c_kabinet-profile__col">
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.age') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->age }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.country.title') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ trans(
                                        sprintf('fields.country.%s', $user->country)
                                    ) }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.city') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ $user->city }}" readonly>
                                </div>
                            </div>
                            <div class="c_kabinet-profile__box">
                                <div class="c_kabinet-profile__label">{{ trans('fields.gender.title') }}</div>
                                <div class="c_kabinet-profile__place">
                                    <input type="text" value="{{ trans(
                                        sprintf('fields.gender.%s', $user->gender)
                                    ) }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="c_kabinet-profile__box">
                            <div class="c_kabinet-profile__label">{{ trans('fields.about') }}</div>
                            <div class="c_kabinet-profile__place c_kabinet-profile__textarea">
                                <textarea readonly>{{ $user->about }}</textarea>
                            </div>
                        </div>

                    </div><!-- .kabinet-profile top -->

                    @if($vkProfile || $fbProfile)
                        <div class="c_search-char__title">{{ trans('profile.titles.social') }}</div>

                        <div class="c_kabinet-soc">
                            <div class="c_kabinet-soc__col">
                                @if($vkProfile)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__vk">
                                        <a href="{{ $vkProfile }}" target="_blank"><input type="text" value="{{ $vkProfile }}"
                                                                                      readonly></a>
                                    </div>
                                @endif
                                @if($fbProfile)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__fb">
                                        <a href="{{ $fbProfile }}" target="_blank">
                                            <input type="text" value="{{ $fbProfile }}" readonly>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div><!-- .kabinet-profile social -->
                    @endif

                    @if($user->show_email || $user->skype || $user->telephone)
                        <div class="c_search-char__title">{{ trans('profile.titles.contacts') }}</div>

                        <div class="c_kabinet-soc c_kabinet-contact">
                            <div class="c_kabinet-soc__col">
                                <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__email">
                                    <a href="mailto:{!! $user->email !!}">
                                        <input type="text" value="{{ $user->email }}" readonly/>
                                    </a>
                                </div>
                                @if($user->skype)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__skype">
                                        <a href="skype:{{ $user->skype }}?chat">
                                            <input type="text" value="{{ $user->skype }}" readonly/>
                                        </a>
                                    </div>
                                @endif
                                @if($user->telephone)
                                    <div class="c_kabinet-profile__place c_kabinet-soc__item c_kabinet-soc__tel">
                                        <a href="tel:+{!! $user->telephone !!}">
                                            <input type="text" value="{{ $user->telephone }}" readonly/>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div><!-- .kabinet-profile social -->
                    @endif

                    <div class="c_kabinet-bottom">
                        @can('update', $user)
                            <a href="{{ route('profile.edit', $user->id) }}"
                               class="c_kabinet-edit">{{ trans('profile.buttons.edit') }}</a>
                        @endcan
                    </div><!-- .kabinet-bottom -->
                </div>
            </div><!-- .kabinet-profile -->

        </div><!-- .c_box -->
    </div>
@endsection