@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_box-top">
            @component('parts.breadcrumbs', [
                'elements' => [
                    route('teams.index') => trans('team.breadcrumbs.teams'),
                    trans('team.breadcrumbs.show'),
                ]
            ])
            @endcomponent
        </div>
        <div class="c_box">
            <div class="c_search-info" style="display: block">
                <div class="c_search-char" style="width: 100%">
                    <div class="c_search-char__top">
                        <div class="c_search-char__name">{{ $team->title }}</div>
                        <div class="c_search-char__topbtn">
                            @can('update', $team)
                                <div class="c_search-char__btn">
                                    <a href="{{ route('teams.edit', $team->id) }}">Обновить анкету</a>
                                </div>
                            @endcan

                            @if($teamspeak)
                                <div class="c_search-char__btn">
                                    <a href="ts3server://{{ $teamspeak }}">Подключится
                                        <span>Powered by TeamSpeak</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="c_search-char__body">
                        <div class="c_search-char__column">
                            <div class="c_search-char__box c_search-char__personal">
                                <div class="c_search-char__title">Данные о команде</div>
                                <div class="c_search-char__pers">
                                    {{--<div class="c_search-char__teamlogo"><img src="i/teamlogo.png" alt="teamlogo"></div>--}}
                                    <div class="c_search-char__toleft">
                                        <div class="c_search-char__item">
                                            <div class="c_search-char__pers-name">Возраст</div>
                                            <div class="c_search-char__pers-box">{{ $team->age_min }}
                                                - {{ $team->age_max ?? '&#8734;' }}</div>
                                        </div>
                                        <div class="c_search-char__item">
                                            <div class="c_search-char__pers-name">Город</div>
                                            <div class="c_search-char__pers-box">{{ $team->city }}</div>
                                        </div>
                                        {{--<div class="c_search-char__item">--}}
                                        {{--<div class="c_search-char__pers-name">Время</div>--}}
                                        {{--<div class="c_search-char__pers-box">--}}
                                        {{--{{ $team->holding_at->diffForHumans() }}  ({{ $team->holding_at }})--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="c_search-char__toleft-clear"></div>
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Цель</div>
                                        <div class="c_search-char__pers-box">{{ $team->goal }}</div>
                                    </div>
                                    {{--<div class="c_search-char__item">--}}
                                    {{--<div class="c_search-char__pers-name"><img src="i/bg-stat-faceit.png"--}}
                                    {{--alt="FACEIT"></div>--}}
                                    {{--<a href="#" class="c_search-char__pers-box">Посмотреть статистику</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="c_search-char__item">--}}
                                    {{--<div class="c_search-char__pers-name"><img src="i/bg-esea.png" alt="ESEA"></div>--}}
                                    {{--<a href="#" class="c_search-char__pers-box">Посмотреть статистику</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="c_search-char__item">--}}
                                    {{--<div class="c_search-char__pers-name"><img src="i/bg-starladder.png"--}}
                                    {{--alt="starladder"></div>--}}
                                    {{--<a href="#" class="c_search-char__pers-box">Посмотреть статистику</a>--}}
                                    {{--</div>--}}
                                </div>

                                <div class="c_search-char__info">
                                    <div class="c_search-char__title">Достижения</div>
                                    <div class="c_search-char__info-txt">
                                        <p>
                                            {{ $team->goal_text }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- Personal ================================= -->


                            <div class="c_search-char__box c_search-char__trebkomand">
                                <div class="c_search-char__info">
                                    <div class="c_search-char__title">Требования к вступлению</div>
                                    <div class="c_search-char__info-txt">
                                        <p>
                                            {{ $team->join_additional }}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- Treb komand ================================= -->


                        </div><!--Column left ================================= -->


                        <div class="c_search-char__column">
                            <div class="c_search-char__box  c_search-char__teamcompl">
                                <div class="c_search-char__title">Командир</div>
                                <div class="c_search-char__teamlist">
                                    <div class="c_search-char__teamitem">
                                        <div class="c_search-char__teamitem-type c_search-char__doplist-sniper"></div>
                                        <div class="c_search-char__teamitem-nickname">
                                            <a href="{{ route('profile.show', $commander->id) }}"
                                               style="color: white; text-decoration: none;">
                                                {{ $commander->login }}
                                            </a>
                                        </div>
                                        <div class="c_search-char__teamitem-years">{{ $commander->age ?? 'Не указан' }}</div>
                                        <div class="c_search-char__teamitem-city">{{ $commander->city ?? 'Не указан' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="c_search-char__box  c_search-char__teamcompl">
                                <div class="c_search-char__title">Основной состав команды</div>
                                <div class="c_search-char__teamlist">
                                    @forelse($mainCommand as $user)
                                        <div class="c_search-char__teamitem">
                                            <div class="c_search-char__teamitem-type c_search-char__doplist-sniper"></div>
                                            <div class="c_search-char__teamitem-nickname">
                                                <a href="{{ route('profile.show', $user->id) }}"
                                                   style="color: white; text-decoration: none;">
                                                    {{ $user->login }}
                                                </a>
                                            </div>
                                            <div class="c_search-char__teamitem-years">{{ $user->age ?? 'Не указан' }}</div>
                                            <div class="c_search-char__teamitem-city">{{ $user->city ?? 'Не указан' }}</div>
                                            @can('manage', $team)
                                                <div class="c_search-char__teamitem-rang">
                                                    <form action="{{ route('teams.reject', $team->id) }}" method="post"
                                                          id="denyForm__{{ $user->id }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    </form>

                                                    <a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('denyForm__{{ $user->id }}').submit();"
                                                       style="color: white; text-decoration: none; margin-left: 5px;">
                                                        {{--{{ trans('team.show.join.deny') }}--}}
                                                        Delete
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    @empty
                                        <div class="c_search-char__teamitem">
                                            <div>Нет никого :(</div>
                                        </div>
                                    @endforelse

                                    @component('parts.teams.join', ['team' => $team, 'role' => 'main_part'])
                                    @endcomponent
                                </div>

                                <div class="c_search-char__title">Запасные игроки</div>
                                <div class="c_search-char__teamlist c_search-char__teamlist-zapas">
                                    @forelse($additionalCommand as $user)
                                        <div class="c_search-char__teamitem">
                                            <div class="c_search-char__teamitem-type c_search-char__doplist-sniper"></div>
                                            <div class="c_search-char__teamitem-nickname">
                                                <a href="{{ route('profile.show', $user->id) }}"
                                                   style="color: white; text-decoration: none;">
                                                    {{ $user->login }}
                                                </a>
                                            </div>
                                            <div class="c_search-char__teamitem-years">{{ $user->age ?? 'Не указан' }}</div>
                                            <div class="c_search-char__teamitem-city">{{ $user->city ?? 'Не указан' }}</div>
                                            @can('manage', $team)
                                                <div class="c_search-char__teamitem-rang">
                                                    <form action="{{ route('teams.reject', $team->id) }}" method="post"
                                                          id="denyForm__{{ $user->id }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    </form>

                                                    <a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('denyForm__{{ $user->id }}').submit();"
                                                       style="color: white; text-decoration: none; margin-left: 5px;">
                                                        {{--{{ trans('team.show.join.deny') }}--}}
                                                        Delete
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    @empty
                                        <div class="c_search-char__teamitem">
                                            <div>Нет никого :(</div>
                                        </div>
                                    @endforelse

                                    @component('parts.teams.join', ['team' => $team, 'role' => 'additional_part'])
                                    @endcomponent
                                </div>

                                <div class="c_search-char__title">Менеджмент команды</div>
                                <div class="c_search-char__teamlist">
                                    @forelse($managers as $user)
                                        <div class="c_search-char__teamitem">
                                            <div class="c_search-char__teamitem-type c_search-char__doplist-sniper"></div>
                                            <div class="c_search-char__teamitem-nickname">
                                                <a href="{{ route('profile.show', $user->id) }}"
                                                   style="color: white; text-decoration: none;">
                                                    {{ $user->login }}
                                                </a>
                                            </div>
                                            <div class="c_search-char__teamitem-years">{{ $user->age ?? 'Не указан' }}</div>
                                            <div class="c_search-char__teamitem-city">{{ $user->city ?? 'Не указан' }}</div>
                                            @can('manage', $team)
                                                <div class="c_search-char__teamitem-rang">
                                                    <form action="{{ route('teams.reject', $team->id) }}" method="post"
                                                          id="denyForm__{{ $user->id }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    </form>

                                                    <a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('denyForm__{{ $user->id }}').submit();"
                                                       style="color: white; text-decoration: none; margin-left: 5px;">
                                                        {{--{{ trans('team.show.join.deny') }}--}}
                                                        Delete
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    @empty
                                        <div class="c_search-char__teamitem">
                                            <div>Нет никого :(</div>
                                        </div>
                                    @endforelse

                                    @component('parts.teams.join', ['team' => $team, 'role' => 'manager'])
                                    @endcomponent
                                </div>

                                @can('manage', $team)
                                    <div class="c_search-char__title">Заявки</div>
                                    <div class="c_search-char__teamlist">
                                        @forelse($requests as $request)
                                            <div class="c_search-char__teamitem">
                                                <div class="c_search-char__teamitem-type c_search-char__doplist-sniper"></div>
                                                <div class="c_search-char__teamitem-nickname">
                                                    <a href="{{ route('profile.show', $request->id) }}"
                                                       style="color: white; text-decoration: none;">
                                                        {{ $request->login }}
                                                    </a>
                                                </div>
                                                <div class="c_search-char__teamitem-age">
                                                    {{ $request->pivot->role }}
                                                </div>
                                                <div class="c_search-char__teamitem-city" style="float: right;">
                                                    <form action="{{ route('teams.accept', $team->id) }}" method="post"
                                                          id="acceptForm__{{ $request->id }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="user_id" value="{{ $request->id }}">
                                                    </form>

                                                    <form action="{{ route('teams.reject', $team->id) }}" method="post"
                                                          id="denyForm__{{ $request->id }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="user_id" value="{{ $request->id }}">
                                                    </form>

                                                    <a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('acceptForm__{{ $request->id }}').submit();"
                                                       style="color: white; text-decoration: none;">
                                                        {{--{{ trans('team.show.join.accept') }}--}}
                                                        Accept
                                                    </a>
                                                    <a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('denyForm__{{ $request->id }}').submit();"
                                                       style="color: white; text-decoration: none; margin-left: 5px;">
                                                        {{--{{ trans('team.show.join.deny') }}--}}
                                                        Deny
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="c_search-char__teamitem">
                                                <div>Нет заявок :(</div>
                                            </div>
                                        @endforelse
                                    </div>
                                @endcan
                            </div><!-- Game data ================================= -->


                            <div class="c_search-char__box  c_search-char__maplist">
                                <div class="c_search-char__title">Карты</div>
                                <div class="c_search-char__map">
                                    @foreach($maps as $map)
                                        <div class="c_search-char__map-item">
                                            <div class="c_search-char__map-{{ $map }}"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- Map list ================================= -->


                            <div class="c_search-char__box c_search-char__contactbox">
                                <div class="c_search-char__title">Контактные данные</div>
                                <div class="c_search-char__dop">
                                    <div class="c_search-char__doplist c_search-char__contlist">
                                        @if($email)
                                            <div class="c_search-char__dopitem">
                                                <div class="c_search-char__doplist-name">Почта</div>
                                                <div class="c_search-char__doplist-box">{{ $email }}</div>
                                            </div>
                                        @endif
                                        @if($skype)
                                            <div class="c_search-char__dopitem">
                                                <div class="c_search-char__doplist-name">Скайп</div>
                                                <div class="c_search-char__doplist-box">{{ $skype }}</div>
                                            </div>
                                        @endif
                                        @if($telephone)
                                            <div class="c_search-char__dopitem">
                                                <div class="c_search-char__doplist-name">Телефон</div>
                                                <div class="c_search-char__doplist-box">{{ $telephone }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if($vkProfile || $fbProfile)
                                    <div class="c_search-char__social">
                                        <div class="c_search-char__social-head">Внешние источники</div>
                                        <div class="c_search-char__social-link">
                                            @if($vkProfile)
                                                <a href="{{ $vkProfile }}" target="_blank" class="vk"></a>
                                            @endif
                                            @if($fbProfile)
                                                <a href="{{ $fbProfile }}" target="_blank" class="fb"></a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div><!-- Contact data ================================= -->


                        </div><!--Column right ================================ -->


                    </div>

                    {{--<div class="c_search-char__change">Дата заполнения &nbsp;&nbsp;{{ $team->created_at->diffForHumans() }} </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection