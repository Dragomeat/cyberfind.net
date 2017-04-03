@extends('layouts.app')

@section('content')
    <div class="b_inb b_inb-main">
        <div class="c_box">

            <div class="c_main_top">
                <div class="c_main_top-btn c_gamebtn">
                    <a href="#" class="c_gamebtn-csgo"></a>
                    <a href="#" class="c_gamebtn-lol"></a>
                    <a href="#" class="c_gamebtn-dota2"></a>
                </div>
                <div class="c_main_top-title">
                    <h1>Cyber<span>find</span></h1>
                    <h2>Сервис по подбору игроков и команд</h2>
                </div>
            </div>

            <div class="c_main_nav">
                <div class="c_main_nav-box c_main_nav-news">
                    <div class="c_main_nav-title">Новости</div>
                    <div class="c_main_nav-list">
                        <ul>
                            <li><a href="#">Анонсы</a></li>
                            <li><a href="#">Итоги турниров</a></li>
                            <li><a href="#">Трансферы</a></li>
                            <li><a href="#">Событие дня</a></li>
                        </ul>
                    </div>
                </div>
                <div class="c_main_nav-box c_main_nav-search">
                    <div class="c_main_nav-title">Поиск</div>
                    <div class="c_main_nav-list">
                        <ul>
                            <li><a href="#">Поиск игрока</a></li>
                            <li><a href="#">Поиск команды</a></li>
                        </ul>
                    </div>
                </div>
                <div class="c_main_nav-box c_main_nav-tournament">
                    <div class="c_main_nav-title">турниры</div>
                    <div class="c_main_nav-list">
                        <ul>
                            <li><a href="#">Профессиональные</a></li>
                            <li><a href="#">Любительские</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="c_main-slider">
                <div class="c_main-slider-item"><img src="images/bg-main-slider.jpg" alt="slider"></div>
            </div>

            <div class="c_main_info">
                <div class="c_main_info-news c_main_info-tabs">
                    <div class="c_main_info-top">
                        <div class="c_main_info-title">Новости</div>
                        <div class="c_gamebtn c_main_info-btn">
                            <a href="#" class="c_gamebtn-csgo"></a>
                            <a href="#" class="c_gamebtn-lol"></a>
                            <a href="#" class="c_gamebtn-dota2"></a>
                        </div>
                    </div>
                    <ul class="c_main_info-tabs__caption">
                        <li class="active">Анонсы</li>
                        <li>Трансферы</li>
                        <li>Итоги турниров</li>
                        <li>Событие дня</li>
                    </ul>
                    <div class="c_main_info-newsbox">
                        <div class="c_main_info-tabs__content active c_main_info-newslist">
                            <div class="c_main_info-newsitem">
                                <div class="c_main_info-newsthumb"><a href="#"><img src="images/bg-news-big.jpg" alt="main news"></a></div>
                                <div class="c_main_info-newsdop">
                                    <div class="c_main_info-newstxt">К участию в турнире по спортивному пейнтболу среди первокурсников ТулГУ будут допущены студенты первого курса ТулГУ, на основании личного заявления.</div>
                                    <div class="c_main_info-newsdata">
                                        <div class="c_main_info-newscomm">10</div>
                                        <div class="c_main_info-newslike">10</div>
                                        <div class="c_main_info-newsdislike">2</div>
                                        <a href="#" class="c_main_info-newsmore"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="c_main_info-newsitem">
                                <div class="c_main_info-newsthumb"><a href="#"><img src="images/bg-news-big.jpg" alt="main news"></a></div>
                                <div class="c_main_info-newsdop">
                                    <div class="c_main_info-newstxt">К участию в турнире по спортивному пейнтболу среди первокурсников ТулГУ будут допущены студенты первого курса ТулГУ, на основании личного заявления.</div>
                                    <div class="c_main_info-newsdata">
                                        <div class="c_main_info-newscomm">10</div>
                                        <div class="c_main_info-newslike">10</div>
                                        <div class="c_main_info-newsdislike">2</div>
                                        <a href="#" class="c_main_info-newsmore"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="c_main_info-newsitem">
                                <div class="c_main_info-newsthumb"><a href="#"><img src="images/bg-news-big.jpg" alt="main news"></a></div>
                                <div class="c_main_info-newsdop">
                                    <div class="c_main_info-newstxt">К участию в турнире по спортивному пейнтболу среди первокурсников ТулГУ будут допущены студенты первого курса ТулГУ, на основании личного заявления.</div>
                                    <div class="c_main_info-newsdata">
                                        <div class="c_main_info-newscomm">10</div>
                                        <div class="c_main_info-newslike">10</div>
                                        <div class="c_main_info-newsdislike">2</div>
                                        <a href="#" class="c_main_info-newsmore"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="c_main_info-tabs__content c_main_info-newslist">
                            <div class="c_main_info-newsitem">
                                <div class="c_main_info-newsthumb"><a href="#"><img src="images/bg-news-big.jpg" alt="main news"></a></div>
                                <div class="c_main_info-newsdop">
                                    <div class="c_main_info-newstxt">К участию в турнире по спортивному пейнтболу среди первокурсников ТулГУ будут допущены студенты первого курса ТулГУ, на основании личного заявления.</div>
                                    <div class="c_main_info-newsdata">
                                        <div class="c_main_info-newscomm">10</div>
                                        <div class="c_main_info-newslike">10</div>
                                        <div class="c_main_info-newsdislike">2</div>
                                        <a href="#" class="c_main_info-newsmore"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="c_main_info-newsitem">
                                <div class="c_main_info-newsthumb"><a href="#"><img src="images/bg-news-big.jpg" alt="main news"></a></div>
                                <div class="c_main_info-newsdop">
                                    <div class="c_main_info-newstxt">К участию в турнире по спортивному пейнтболу среди первокурсников ТулГУ будут допущены студенты первого курса ТулГУ, на основании личного заявления.</div>
                                    <div class="c_main_info-newsdata">
                                        <div class="c_main_info-newscomm">10</div>
                                        <div class="c_main_info-newslike">10</div>
                                        <div class="c_main_info-newsdislike">2</div>
                                        <a href="#" class="c_main_info-newsmore"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="c_main_info-tabs__content c_main_info-newslist">
                            <div class="c_main_info-newsitem">
                                <div class="c_main_info-newsthumb"><a href="#"><img src="images/bg-news-big.jpg" alt="main news"></a></div>
                                <div class="c_main_info-newsdop">
                                    <div class="c_main_info-newstxt">К участию в турнире по спортивному пейнтболу среди первокурсников ТулГУ будут допущены студенты первого курса ТулГУ, на основании личного заявления.</div>
                                    <div class="c_main_info-newsdata">
                                        <div class="c_main_info-newscomm">10</div>
                                        <div class="c_main_info-newslike">10</div>
                                        <div class="c_main_info-newsdislike">2</div>
                                        <a href="#" class="c_main_info-newsmore"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="c_main_info-tabs__content c_main_info-newslist">
                            <div class="c_main_info-newsitem">
                                <div class="c_main_info-newsthumb"><a href="#"><img src="images/bg-news-big.jpg" alt="main news"></a></div>
                                <div class="c_main_info-newsdop">
                                    <div class="c_main_info-newstxt">К участию в турнире по спортивному пейнтболу среди первокурсников ТулГУ будут допущены студенты первого курса ТулГУ, на основании личного заявления.</div>
                                    <div class="c_main_info-newsdata">
                                        <div class="c_main_info-newscomm">10</div>
                                        <div class="c_main_info-newslike">10</div>
                                        <div class="c_main_info-newsdislike">2</div>
                                        <a href="#" class="c_main_info-newsmore"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c_main_info-all"><a href="#">Все новости &gt;&gt;</a></div>
                </div><!-- .main news -->
                <div class="c_main_info-tourn c_main_info-tabs">
                    <div class="c_main_info-top">
                        <div class="c_main_info-title">турниры</div>
                        <ul class="c_main_info-tabs__caption">
                            <li>Все</li>
                            <li class="active">Профессиональные</li>
                            <li>Любительские</li>
                        </ul>
                    </div>
                    <div class="c_main-info-box">

                        <div class="c_main_info-tabs__content">
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

                            <div class="c_main_info-tourn-table">
                                <div class="c_main_info-tourn-head">
                                    <div>Организатор</div>
                                    <div>Дата</div>
                                    <div>Призовой фонд</div>
                                    <div>Вступи-тельный взнос</div>
                                    <div>Команды</div>
                                    <div>Площадка</div>
                                    <div>Статус</div>
                                </div>
                                <div class="c_main_info-tourn-body">
                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- .main tourn tabs -->

                        <div class="c_main_info-tabs__content active">
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

                            <div class="c_main_info-tourn-table">
                                <div class="c_main_info-tourn-head">
                                    <div>Организатор</div>
                                    <div>Дата</div>
                                    <div>Призовой фонд</div>
                                    <div>Вступи-тельный взнос</div>
                                    <div>Команды</div>
                                    <div>Площадка</div>
                                    <div>Статус</div>
                                </div>
                                <div class="c_main_info-tourn-body">
                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- .main tourn tabs -->

                        <div class="c_main_info-tabs__content">
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

                            <div class="c_main_info-tourn-table">
                                <div class="c_main_info-tourn-head">
                                    <div>Организатор</div>
                                    <div>Дата</div>
                                    <div>Призовой фонд</div>
                                    <div>Вступи-тельный взнос</div>
                                    <div>Команды</div>
                                    <div>Площадка</div>
                                    <div>Статус</div>
                                </div>
                                <div class="c_main_info-tourn-body">
                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>

                                    <div class="c_main_info-tourn-item">
                                        <div><img src="images/bg-tourn-organiz.png" alt="sber"></div>
                                        <div>21/11/16</div>
                                        <div>20 000$</div>
                                        <div>0$</div>
                                        <div>1/256</div>
                                        <div class="c_main_info-tourn-tt">internet</div>
                                        <div class="c_main_info-tourn-tt c_main_info-tourn-online">online</div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- .main tourn tabs -->

                    </div>
                    <div class="c_main_info-all"><a href="#">Все турниры &gt;&gt;</a></div>
                </div><!-- .main tourn -->

            </div><!-- .main_info -->

            <div class="c_main_teamspeak">
                <div class="c_main_teamspeak-logo"></div>
                <div class="c_main_teamspeak-list">
                    <div class="c_main_teamspeak-item">
                        <a href="#">
                            <span class="c_main_teamspeak-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            <span class="c_main_teamspeak-subscr">ПОДКЛЮЧИТЬСЯ</span>
                        </a>
                    </div>
                    <div class="c_main_teamspeak-item">
                        <a href="#">
                            <span class="c_main_teamspeak-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            <span class="c_main_teamspeak-subscr">ПОДКЛЮЧИТЬСЯ</span>
                        </a>
                    </div>
                    <div class="c_main_teamspeak-item">
                        <a href="#">
                            <span class="c_main_teamspeak-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            <span class="c_main_teamspeak-subscr">ПОДКЛЮЧИТЬСЯ</span>
                        </a>
                    </div>
                    <div class="c_main_teamspeak-item">
                        <a href="#">
                            <span class="c_main_teamspeak-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            <span class="c_main_teamspeak-subscr">ПОДКЛЮЧИТЬСЯ</span>
                        </a>
                    </div>
                </div>
            </div><!-- .main teamspeak -->

        </div><!-- .main box -->
    </div>
@endsection