@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_box-top">
            <div class="c_find-myliked"><a href="#">Мои избранные анкеты</a></div>
            @component('parts.breadcrumbs', [
                'elements' => [
                    'Список турниров'
                ]
            ])
            @endcomponent
        </div>
        <div class="c_box">

            <div class="c_tourn-filter">
                <ul class="c_main_info-tabs__caption">
                    <li>Все</li>
                    <li class="active">Профессиональные</li>
                    <li>Любительские</li>
                </ul>
                <div class="c_main_info-tourn-start">
                    <ul class="c_main_info-tourn-time">
                        <li>Прошедшие</li>
                        <li class="active">Текущие</li>
                        <li>Будущие</li>
                    </ul>
                    <div class="c_gamebtn c_main_info-btn c_main_info-tourn-btn">
                        <a href="#" class="c_gamebtn-csgo"></a>
                        <a href="#" class="c_gamebtn-lol"></a>
                        <a href="#" class="c_gamebtn-dota2"></a>
                    </div>
                </div>
                <div class="c_search-filter__item c_search-filter__box">
                    <input type="text" name="s" placeholder="Поиск по названию команды">
                    <input type="submit" value="">
                </div>
                </form>
            </div>


            <div class="c_search-box">

                <div class="c_search-sort">
                    <div class="c_search-line c_tourn-line">
                        <div class="c_search-line__td">Название</div>
                        <div class="c_search-line__td">Логотип</div>
                        <div class="c_search-line__td">Дата</div>
                        <div class="c_search-line__td">Игра</div>
                        <div class="c_search-line__td">Призовой фонд</div>
                        <div class="c_search-line__td">Статус</div>
                        <div class="c_search-line__td">Рейтинг</div>
                    </div>
                </div>

                <div class="c_search-list">

                    <div class="c_search-item">
                        <div class="c_search-line c_tourn-line">
                            <div class="c_search-line__td">igrok</div>
                            <div class="c_search-line__td"><img src="i/powergame.png" alt="powergame"></div>
                            <div class="c_search-line__td">23.12.2016</div>
                            <div class="c_search-line__td">
                                <div class="c_gamebtn c_main_info-btn">
                                    <a href="#" class="c_gamebtn-csgo"></a>
                                    <a href="#" class="c_gamebtn-dota2"></a>
                                </div>
                            </div>
                            <div class="c_search-line__td">3000 $</div>
                            <div class="c_search-line__td c_tourn-line__status online">Online</div>
                            <div class="c_search-line__td">
                                <div class="c_tourn-line__rate">
                                    <span class="rate-active"></span>
                                    <span class="rate-active"></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="c_search-info"></div>
                    </div>

                    <div class="c_search-item">
                        <div class="c_search-line c_tourn-line">
                            <div class="c_search-line__td">igrok</div>
                            <div class="c_search-line__td"><img src="i/powergame.png" alt="powergame"></div>
                            <div class="c_search-line__td">23.12.2016</div>
                            <div class="c_search-line__td">
                                <div class="c_gamebtn c_main_info-btn">
                                    <a href="#" class="c_gamebtn-csgo"></a>
                                </div>
                            </div>
                            <div class="c_search-line__td">3000 $</div>
                            <div class="c_search-line__td c_tourn-line__status online">Online</div>
                            <div class="c_search-line__td">
                                <div class="c_tourn-line__rate">
                                    <span class="rate-active"></span>
                                    <span class="rate-active"></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="c_search-info"></div>
                    </div>

                    <div class="c_search-item active">
                        <div class="c_search-line c_tourn-line">
                            <div class="c_search-line__td">igrok</div>
                            <div class="c_search-line__td"><img src="i/powergame.png" alt="powergame"></div>
                            <div class="c_search-line__td">23.12.2016</div>
                            <div class="c_search-line__td">
                                <div class="c_gamebtn c_main_info-btn">
                                    <a href="#" class="c_gamebtn-csgo"></a>
                                    <a href="#" class="c_gamebtn-lol"></a>
                                    <a href="#" class="c_gamebtn-dota2"></a>
                                </div>
                            </div>
                            <div class="c_search-line__td">3000 $</div>
                            <div class="c_search-line__td c_tourn-line__status online">Online</div>
                            <div class="c_search-line__td">
                                <div class="c_tourn-line__rate">
                                    <span class="rate-active"></span>
                                    <span class="rate-active"></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="c_search-info">
                            <div class="c_search-thumb">
                                <img src="i/powergame-big.png" alt="thumb">
                            </div>
                            <div class="c_search-char">
                                <div class="c_search-char__top">
                                    <div class="c_search-char__name">Turnirchik
                                        <a href="#">http://www.faceit.com</a>
                                    </div>
                                    <div class="c_search-char__eval">
                                        <div class="c_search-char__like">12370</div>
                                        <div class="c_search-char__dislike">2</div>
                                    </div>
                                    <div class="c_search-char__topbtn">
                                        <div class="c_search-char__btn"><a href="#">Сообщить об изменениях</a></div>
                                        <div class="c_search-char__btn"><a href="#">Принять участие</a></div>
                                    </div>
                                </div>
                                <div class="c_search-char__body">

                                    <div class="c_search-char__box c_search-char__personal">
                                        <div class="c_search-char__title">О турнире</div>
                                        <div class="c_search-char__column">
                                            <div class="c_search-char__pers">
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Организатор</div>
                                                    <div class="c_search-char__pers-box">PowerGame</div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Дата проведения</div>
                                                    <div class="c_search-char__pers-box">23.12.2016</div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Дата квалификации</div>
                                                    <div class="c_search-char__pers-box">23.12.2016</div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Призовой фонд</div>
                                                    <div class="c_search-char__pers-box">30 000 руб</div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Вступительный взнос</div>
                                                    <div class="c_search-char__pers-box">5 000 руб</div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Игры</div>
                                                    <div class="c_search-char__pers-box">
                                                        <div class="c_gamebtn c_main_info-btn">
                                                            <a href="#" class="c_gamebtn-csgo"></a>
                                                            <a href="#" class="c_gamebtn-lol"></a>
                                                            <a href="#" class="c_gamebtn-dota2"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Команды</div>
                                                    <div class="c_search-char__pers-box">1/256</div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Место проведения</div>
                                                    <div class="c_search-char__pers-box">Москва</div>
                                                </div>
                                                <div class="c_search-char__item">
                                                    <div class="c_search-char__pers-name">Статус</div>
                                                    <div class="c_search-char__pers-box">Online</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="c_search-char__column">
                                            <div class="c_search-char__info">
                                                <div class="c_search-char__title">Описание турнира</div>
                                                <div class="c_search-char__info-txt">
                                                    <p>Главным событием турнира должен был стать двенадцатираундовый
                                                        поединок за звание временного чемпиона мира в супертяжелом весе
                                                        по версии WBC между россиянином. Главным событием турнира должен
                                                        был стать двенадцатираундовый поединок за звание временного
                                                        чемпиона мира в супертяжелом весе по версии WBC между
                                                        россиянином.<br> Главным событием турнира должен был стать
                                                        двенадцатираундовый поединок за звание временного чемпиона мира
                                                        в супертяжелом весе по версии WBC между россиянином.</p>
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

                    <div class="c_search-item">
                        <div class="c_search-line c_tourn-line">
                            <div class="c_search-line__td">igrok</div>
                            <div class="c_search-line__td"><img src="i/powergame.png" alt="powergame"></div>
                            <div class="c_search-line__td">23.12.2016</div>
                            <div class="c_search-line__td">
                                <div class="c_gamebtn c_main_info-btn">
                                    <a href="#" class="c_gamebtn-csgo"></a>
                                    <a href="#" class="c_gamebtn-lol"></a>
                                    <a href="#" class="c_gamebtn-dota2"></a>
                                </div>
                            </div>
                            <div class="c_search-line__td">3000 $</div>
                            <div class="c_search-line__td c_tourn-line__status online">Online</div>
                            <div class="c_search-line__td">
                                <div class="c_tourn-line__rate">
                                    <span class="rate-active"></span>
                                    <span class="rate-active"></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="c_search-info"></div>
                    </div>

                    <div class="c_search-item">
                        <div class="c_search-line c_tourn-line">
                            <div class="c_search-line__td">igrok</div>
                            <div class="c_search-line__td"><img src="i/powergame.png" alt="powergame"></div>
                            <div class="c_search-line__td">23.12.2016</div>
                            <div class="c_search-line__td">
                                <div class="c_gamebtn c_main_info-btn">
                                    <a href="#" class="c_gamebtn-csgo"></a>
                                    <a href="#" class="c_gamebtn-lol"></a>
                                    <a href="#" class="c_gamebtn-dota2"></a>
                                </div>
                            </div>
                            <div class="c_search-line__td">3000 $</div>
                            <div class="c_search-line__td c_tourn-line__status online">Online</div>
                            <div class="c_search-line__td">
                                <div class="c_tourn-line__rate">
                                    <span class="rate-active"></span>
                                    <span class="rate-active"></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="c_search-info"></div>
                    </div>

                </div>

                <div class="c_search-load"></div>

            </div>


        </div>
    </div>
@endsection