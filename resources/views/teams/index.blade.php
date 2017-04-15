@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_box-top">
            @component('parts.breadcrumbs', [
                'elements' => [
                    trans('header.links.search_team')
                ]
            ])
            @endcomponent
        </div>
        <div class="c_box">

            <div class="c_search-filter">
                <form action="{{ route('teams.search') }}" method="get" enctype="application/x-www-form-urlencoded">
                    <div class="c_search-filter__item c_search-filter__box">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Поиск по названию команды">
                        <input type="submit" value="">
                    </div>
                </form>
            </div>


            <div class="c_search-box">
                <div class="c_search-sort">
                    <div class="c_search-line">
                        <div class="c_search-line__td">Название</div>
                        <div class="c_search-line__td">Город</div>
                        <div class="c_search-line__td">Количество игроков</div>
                        <div class="c_search-line__td">Цель игры</div>
                    </div>
                </div>

                <div class="c_search-list">

                    @forelse($teams as $team)
                        <div class="c_search-item">
                            <div class="c_search-line">
                                <div class="c_search-line__td">
                                    <a href="{{ route('teams.show', $team->id) }}" style="color: #fff; text-decoration: none;">
                                        {{ $team->title }}
                                    </a>
                                </div>
                                <div class="c_search-line__td">
                                    <a href="{{ route('teams.search', ['search' => $team->city]) }}" style="color: #fff; text-decoration: none;">
                                        {{ $team->city }}
                                    </a>
                                 </div>
                                <div class="c_search-line__td"><div class="c_search-line__num-players">
                                     @for($i = 0; $i < 5; $i++)
                                        @if($i < $team->getUsersWhereRole('main_part')->count())
                                             <span class="c_search-line__num-active"></span>
                                        @else
                                             <span></span>
                                        @endif
                                     @endfor
                                    </div>
                                </div>
                                <div class="c_search-line__td">{{ $team->goal }}</div>
                            </div>
                        </div>
                    @empty
                        <div>Команд пока нет :(</div>
                    @endforelse
                </div>

                <div style="margin-top: 20px">
                    @component('parts.pagination', [
                        'paginator' => $teams
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection