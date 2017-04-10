@extends('layouts.app')

@section('breadcrumbs')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row carousel-container">
            <div id="mainCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="/images/bg-main-slider.jpg" alt="...">
                        <div class="carousel-caption">
                            <h1 class="c_logotype uppercase">
                                Cyber<span>find</span>
                            </h1>
                            <p>Сервис по подбору игроков</p>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#mainCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#mainCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row info-container">
            <div class="col-md-6">
                <div class="panel panel-default c_panel news-panel">
                    <div class="panel-heading">Новости</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills" role="tablist" id="indexTabs">
                            <li role="presentation" class="active">
                                <a href="#announcements">Анонсы</a>
                            </li>
                            <li role="presentation">
                                <a href="#transfers">Трансферы</a>
                            </li>
                            <li role="presentation">
                                <a href="#result_tournaments">Итоги турниров</a>
                            </li>
                            <li role="presentation">
                                <a href="#events">События дня</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="announcements">
                                <ul class="media-list">
                                    <li class="media c_media__news">
                                        <div class="media-left hidden-xs">
                                            <img class="media-object" src="https://lorempixel.com/148/127/"/>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Gambit Esports стала пятой командой</h4>
                                            Gambit Esports стала пятой командой, которая получила прямой инвайт от
                                            организаторов DreamHack Austin 2017. С 28 по 30 апреля коллектив
                                            выступит на LAN-чемпионате
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="transfers">

                            </div>
                            <div role="tabpanel" class="tab-pane" id="result_tournaments">

                            </div>
                            <div role="tabpanel" class="tab-pane" id="events">

                            </div>
                        </div>

                        <div class="more">
                            <a href="">Все новости</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default c_panel">
                    <div class="panel-heading">Турниры</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills" role="tablist" id="indexTabs">
                            <li role="presentation" class="active">
                                <a href="#tournament_past">Прошедшие</a>
                            </li>
                            <li role="presentation">
                                <a href="#tournament_current">Текущие</a>
                            </li>
                            <li role="presentation">
                                <a href="#tournament_future">Будущие</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane table-responsive active" id="tournament_past">
                                <table class="table c_table__tournaments">
                                    <tr>
                                        <td>Организатор</td>
                                        <td>Дата</td>
                                        <td>Призовой фонд</td>
                                        <td>Втупительный взнос</td>
                                        <td>Команды</td>
                                        <td>Площадка</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <img src="http://beta.cyberfind.net/i/bg-tourn-organiz.png" alt="sberbank"
                                                 class="img-responsive">
                                        </td>
                                        <td>
                                            21/11/16
                                        </td>
                                        <td>
                                            <span class="dollars">
                                                20 000
                                            </span>
                                        </td>
                                        <td>
                                             <span class="dollars">
                                               0
                                            </span>
                                        </td>
                                        <td>
                                            1/256
                                        </td>
                                        <td>
                                            <span class="uppercase">
                                                Internet
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://beta.cyberfind.net/i/bg-tourn-organiz.png" alt="sberbank"
                                                 class="img-responsive">
                                        </td>
                                        <td>
                                            21/11/16
                                        </td>
                                        <td>
                                            <span class="dollars">
                                                20 000
                                            </span>
                                        </td>
                                        <td>
                                             <span class="dollars">
                                               0
                                            </span>
                                        </td>
                                        <td>
                                            1/256
                                        </td>
                                        <td>
                                            <span class="uppercase">
                                                Internet
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://beta.cyberfind.net/i/bg-tourn-organiz.png" alt="sberbank"
                                                 class="img-responsive">
                                        </td>
                                        <td>
                                            21/11/16
                                        </td>
                                        <td>
                                            <span class="dollars">
                                                20 000
                                            </span>
                                        </td>
                                        <td>
                                             <span class="dollars">
                                               0
                                            </span>
                                        </td>
                                        <td>
                                            1/256
                                        </td>
                                        <td>
                                            <span class="uppercase">
                                                Internet
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="http://beta.cyberfind.net/i/bg-tourn-organiz.png" alt="sberbank"
                                                 class="img-responsive">
                                        </td>
                                        <td>
                                            21/11/16
                                        </td>
                                        <td>
                                            <span class="dollars">
                                                20 000
                                            </span>
                                        </td>
                                        <td>
                                             <span class="dollars">
                                               0
                                            </span>
                                        </td>
                                        <td>
                                            1/256
                                        </td>
                                        <td>
                                            <span class="uppercase">
                                                Internet
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tournament_current">

                            </div>
                            <div role="tabpanel" class="tab-pane" id="tournament_future">

                            </div>
                        </div>

                        <div class="more">
                            <a href="">Все турниры</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row teamspeak-container">
            <div class="col-md-2 hidden-sm hidden-xs teamspeak-icon">
                <img src="http://beta.cyberfind.net/i/bg-teamspeak.png" alt="teamspeak">
            </div>
            <div class="col-md-10 col-sm-12 pull-right">
                <ul class="list-unstyled teamspeak-list">
                    <li class="row">
                        <div class="col-md-1 hidden-sm hidden-xs">
                            <span class="glyphicon glyphicon-bullhorn"></span>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-8">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-4 teamspeak-subscribe">
                            <a href="">
                                <span class="uppercase">Подключится</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection