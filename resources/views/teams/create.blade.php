@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
               route('teams.index') => trans('team.breadcrumbs.teams'),
               trans('team.breadcrumbs.create')
            ]
        ])
        @endcomponent

        <div class="c_box">
            <div class="c_search-char__body c_search-char__registration">
                <form action="{{ route('teams.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="c_search-char__column">
                        {{--style="width: 60%; margin-right: auto; margin-left: auto; float: none;">--}}
                        <div class="c_search-char__box c_search-char__personal">
                            <div class="c_search-char__title">{{ trans('team.edit.titles.information') }}</div>
                            <div class="c_search-char__pers">
                                <div class="c_search-char__item">
                                    <div class="c_search-char__pers-name">{{ trans('team.edit.name') }}</div>
                                    <input type="text" name="title" class="c_search-char__pers-box"
                                           value="{{ old('title') }}" required>
                                </div>

                                @if($errors->has('title'))
                                    <div class="c_search-char__item" style="border-color: red;">
                                        <input type="text" class="c_search-char__pers-box"
                                               style="border-color: red; color: red;"
                                               value="{{ $errors->first('title') }}" readonly/>
                                    </div>
                                @endif

                                <div class="c_search-char__item">
                                    <div class="c_search-char__pers-name">{{ trans('team.edit.age') }}</div>

                                    <input type="text" name="age" class="c_search-char__pers-box c_age"
                                           maxlength="5"
                                           value="{{ old('age') }}">
                                </div>

                                @if($errors->has('age'))
                                    <div class="c_search-char__item" style="border-color: red;">
                                        <input type="text" class="c_search-char__pers-box"
                                               style="border-color: red; color: red;"
                                               value="{{ $errors->first('age') }}" readonly/>
                                    </div>
                                @endif

                                <div class="c_search-char__item">
                                    <div class="c_search-char__pers-name">{{ trans('team.edit.city') }}</div>
                                    <input type="text" name="city" class="c_search-char__pers-box"
                                           value="{{ old('city') }}" required>
                                </div>

                                @if($errors->has('city'))
                                    <div class="c_search-char__item" style="border-color: red;">
                                        <input type="text" class="c_search-char__pers-box"
                                               style="border-color: red; color: red;"
                                               value="{{ $errors->first('city') }}" readonly/>
                                    </div>
                                @endif

                                <div class="c_search-char__item">
                                    <div class="c_search-char__pers-name">{{ trans('team.edit.country') }}</div>
                                    <input type="text" name="country" class="c_search-char__pers-box"
                                           value="{{ old('country') }}" required>
                                </div>

                                @if($errors->has('country'))
                                    <div class="c_search-char__item" style="border-color: red;">
                                        <input type="text" class="c_search-char__pers-box"
                                               style="border-color: red; color: red;"
                                               value="{{ $errors->first('country') }}" readonly/>
                                    </div>
                                @endif

                                <div class="c_search-char__item">
                                    <div class="c_search-char__pers-name">{{ trans('team.edit.goal') }}</div>
                                    <input type="text" name="goal" class="c_search-char__pers-box"
                                           value="{{  old('goal')  }}" required>
                                </div>

                                @if($errors->has('goal'))
                                    <div class="c_search-char__item" style="border-color: red;">
                                        <input type="text" class="c_search-char__pers-box"
                                               style="border-color: red; color: red;"
                                               value="{{ $errors->first('goal') }}" readonly/>
                                    </div>
                                @endif
                            </div>
                            <div class="c_search-char__info">
                                <div class="c_search-char__title">{{ trans('team.edit.titles.goal') }}</div>
                                <textarea name="goal_text" class="c_search-char__info-txt"
                                          required>{{ old('goal_text') }}</textarea>
                            </div>

                            @if($errors->has('goal_text'))
                                <div class="c_search-char__info" style="border-color: red;">
                                    <textarea type="text" class="c_search-char__info-txt"
                                              style="border-color: red; color: red; height: auto;"
                                              readonly>{{ $errors->first('goal_text') }}</textarea>
                                </div>
                            @endif
                        </div><!-- Personal ================================= -->

                        <div class="c_search-char__box c_search-char__trebkomand">
                            <div class="c_search-char__info">
                                <div class="c_search-char__title">{{ trans('team.edit.titles.additional') }}</div>
                                <textarea name="join_additional" class="c_search-char__info-txt"
                                          required>{{ old('join_additional') }}</textarea>
                            </div>

                            @if($errors->has('join_additional'))
                                <div class="c_search-char__info" style="border-color: red;">
                                    <textarea type="text" class="c_search-char__info-txt"
                                              style="border-color: red; color: red; height: auto;"
                                              readonly>{{ $errors->first('join_additional') }}</textarea>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="c_search-char__column">
                        {{--<div class="c_search-char__box  c_search-char__gamebox">--}}
                        {{--<div class="c_search-char__title">Количество игроков</div>--}}
                        {{--<input name="max_teams" class="c_search-char__pers-box" maxlength="2" value="{{ isset($team) ? $team->max_teams : old('max_teams') }}" required/>--}}
                        {{--</div>--}}

                        <div class="c_search-char__box c_search-char__maplist">
                            <div class="c_search-char__title">Карты</div>
                            <select name="maps[]" class="c_search-char__pers-box c_multiple" multiple>
                                @foreach($maps as $map)
                                    <option value="{{ $map }}">
                                        {{ trans(sprintf('team.edit.maps.%s', $map)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if($errors->has('maps'))
                            <div class="c_search-char__item" style="border-color: red;">
                                <input type="text" class="c_search-char__pers-box"
                                       style="border-color: red; color: red;"
                                       value="{{ $errors->first('maps') }}" readonly/>
                            </div>
                        @endif

                        <div class="c_search-char__box c_search-char__contactbox">
                            <div class="c_search-char__title">Контактные данные</div>
                            <div class="c_search-char__dop">
                                <div class="c_search-char__pers">
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Почта</div>
                                        <input type="email" name="contacts[email]"
                                               value="{{ old('contacts.email') }}"
                                               class="c_search-char__pers-box">
                                    </div>

                                    @if($errors->has('contacts.email'))
                                        <div class="c_search-char__item" style="border-color: red;">
                                            <input type="text" class="c_search-char__pers-box"
                                                   style="border-color: red; color: red;"
                                                   value="{{ $errors->first('contacts.email') }}" readonly/>
                                        </div>
                                    @endif

                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Скайп</div>
                                        <input type="text" name="contacts[skype]"
                                               value="{{ old('contacts.skype') }}"
                                               class="c_search-char__pers-box">
                                    </div>

                                    @if($errors->has('contacts.skype'))
                                        <div class="c_search-char__item" style="border-color: red;">
                                            <input type="text" class="c_search-char__pers-box"
                                                   style="border-color: red; color: red;"
                                                   value="{{ $errors->first('contacts.skype') }}" readonly/>
                                        </div>
                                    @endif

                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Теамспик</div>
                                        <input type="text" name="contacts[teamspeak]"
                                               value="{{ old('contacts.teamspeak') }}"
                                               class="c_search-char__pers-box">
                                    </div>

                                    @if($errors->has('contacts.teamspeak'))
                                        <div class="c_search-char__item" style="border-color: red;">
                                            <input type="text" class="c_search-char__pers-box"
                                                   style="border-color: red; color: red;"
                                                   value="{{ $errors->first('contacts.teamspeak') }}" readonly/>
                                        </div>
                                    @endif


                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Телефон</div>
                                        <input type="tel" name="contacts[telephone]"
                                               value="{{  old('contacts.telephone') }}"
                                               class="c_search-char__pers-box">
                                    </div>

                                    @if($errors->has('contacts.telephone'))
                                        <div class="c_search-char__item" style="border-color: red;">
                                            <input type="text" class="c_search-char__pers-box"
                                                   style="border-color: red; color: red;"
                                                   value="{{ $errors->first('contacts.telephone') }}" readonly/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="c_search-char__title">Социальные сети</div>
                            <div class="c_search-char__dop">
                                <div class="c_search-char__pers">
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Вконтакте</div>
                                        <input type="text" name="socials[vk]" value="{{ old('socials.vk') }}" class="c_search-char__pers-box">
                                    </div>
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Facebook</div>
                                        <input type="text" name="socials[fb]" value="{{ old('socials.vk') }}" class="c_search-char__pers-box">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="c_kabinet-submit" style="margin: 0;"
                               value="{{ trans('team.create.save') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection