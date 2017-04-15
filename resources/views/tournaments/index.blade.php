@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_box-top">
            @component('parts.breadcrumbs', [
                'elements' => [
                    'Список турниров'
                ]
            ])
            @endcomponent
        </div>
        <div class="c_box">

            <div class="c_tourn-filter">
                <form action="{{ route('tournaments.search') }}" method="get" enctype="application/x-www-form-urlencoded">
                    <div class="c_search-filter__item c_search-filter__box">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Поиск по названию турнира">
                        <input type="submit" value="">
                    </div>
                </form>
            </div>


            <div class="c_search-box">

                <div class="c_search-sort">
                    <div class="c_search-line c_tourn-line">
                        <div class="c_search-line__td">Название</div>
                        <div class="c_search-line__td">Организатор</div>
                        <div class="c_search-line__td">Дата</div>
                        <div class="c_search-line__td">Игра</div>
                        <div class="c_search-line__td">Призовой фонд</div>
                        <div class="c_search-line__td">Статус</div>
                        <div class="c_search-line__td">Рейтинг</div>
                    </div>
                </div>

                <div class="c_search-list">
                    @foreach($tournaments as $tournament)
                      <div class="c_search-item">
                        <div class="c_search-line c_tourn-line">
                            <div class="c_search-line__td">
                                <a href="{{ route('tournaments.show', $tournament->id) }}" style="color: inherit; text-decoration: none;">
                                    {{ $tournament->title }}
                                </a>
                            </div>
                            <div class="c_search-line__td">
                               {{ $tournament->organizer }}
                            </div>
                            <div class="c_search-line__td">{{ $tournament->holding_at_formatted }}</div>
                            <div class="c_search-line__td">
                                <div class="c_gamebtn c_main_info-btn">
                                    <a href="#" class="c_gamebtn-csgo"></a>
                                </div>
                            </div>
                            <div class="c_search-line__td">{{ $tournament->prize_fund }} $</div>
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
                    @endforeach
                </div>

                @component('parts.pagination', [
                    'paginator' => $tournaments
                ])
                @endcomponent
            </div>


        </div>
    </div>
@endsection