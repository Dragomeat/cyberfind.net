@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_box-top">
            @component('parts.breadcrumbs', [
                'elements' => [
                    route('tournaments.index') => 'Список турниров',
                    'Турнир'
                ]
            ])
            @endcomponent
        </div>
        <div class="c_box">
            <div class="c_search-info" style="display: block;">
                <div class="c_search-thumb">
                    <img src="{{ asset($tournament->logotype ?? '/images/powergame-big.png' ) }}" style="width: inherit;" alt="thumb">
                </div>
                <div class="c_search-char">
                    <div class="c_search-char__top">
                        <div class="c_search-char__name">
                            {{ $tournament->title }}
                            <a href="#">{{ $tournament->link }}</a>
                        </div>
                        {{--<div class="c_search-char__eval">--}}
                            {{--<div class="c_search-char__like">12370</div>--}}
                            {{--<div class="c_search-char__dislike">2</div>--}}
                        {{--</div>--}}
                        <div class="c_search-char__topbtn">
                            <div class="c_search-char__btn">
                                <a href="#">Сообщить об изменениях</a>
                            </div>
                            <div class="c_search-char__btn">
                                <a href="#">Принять участие</a>
                            </div>
                        </div>
                    </div>
                    <div class="c_search-char__body">

                        <div class="c_search-char__box c_search-char__personal">
                            <div class="c_search-char__title">О турнире</div>
                            <div class="c_search-char__column">
                                <div class="c_search-char__pers">
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Организатор</div>
                                        <div class="c_search-char__pers-box">{{ $tournament->organizer }}</div>
                                    </div>
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Дата проведения</div>
                                        <div class="c_search-char__pers-box">{{ $tournament->created_at_formatted }}</div>
                                    </div>
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Дата квалификации</div>
                                        <div class="c_search-char__pers-box">{{ $tournament->qualification_at_formatted }}</div>
                                    </div>
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Призовой фонд</div>
                                        <div class="c_search-char__pers-box">{{ $tournament->prize_fund }} $</div>
                                    </div>
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Вступительный взнос</div>
                                        <div class="c_search-char__pers-box">{{ $tournament->entrance_fee }} $</div>
                                    </div>
                                    <div class="c_search-char__item">
                                        <div class="c_search-char__pers-name">Игры</div>
                                        <div class="c_search-char__pers-box">
                                            <div class="c_gamebtn c_main_info-btn">
                                                <a href="#" class="c_gamebtn-csgo"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c_search-char__column">
                                <div class="c_search-char__info">
                                    <div class="c_search-char__title">Описание турнира</div>
                                    <div class="c_search-char__info-txt">
                                        <p>{{ $tournament->description }}</p>
                                    </div>
                                </div>
                                <div class="c_search-char__social">
                                    <div class="c_search-char__social-link">
                                        <a href="#" class="vk"></a>
                                        <a href="#" class="fb"></a>
                                        <a href="#" class="twitch"></a>
                                        <a href="#" class="in"></a>
                                        <a href="#" class="yt"></a>
                                        <a href="#" class="tw"></a>
                                        <a href="#" class="w"></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Personal ================================= -->

                    </div>

                </div>


            </div>
        </div>
@endsection