@extends('layouts.app')

@section('content')
    <div class="b_inb">
        <div class="c_box-top">
            @component('parts.breadcrumbs', [
                'elements' => [
                    'Список игроков'
                ]
            ])
            @endcomponent
        </div>
        <div class="c_box">

            <div class="c_search-filter">
                <form action="{{ route('profile.search') }}" method="get" enctype="application/x-www-form-urlencoded">
                    <div class="c_search-filter__item c_search-filter__box">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Поиск по нику игрока">
                        <input type="submit" value="">
                    </div>
                </form>
            </div>


            <div class="c_search-box">

                <div class="c_search-sort">
                    <div class="c_search-line">
                        <div class="c_search-line__td">Название</div>
                        <div class="c_search-line__td">Ранг</div>
                        <div class="c_search-line__td">Город</div>
                        <div class="c_search-line__td">Количество часов</div>
                        <div class="c_search-line__td">Цель игры</div>
                    </div>
                </div>

                <div class="c_search-list">
                    @foreach($users as $user)
                        <div class="c_search-item">
                            <div class="c_search-line">
                                <div class="c_search-line__td">
                                    <a href="{{ route('profile.show', $user->id) }}" style="color: inherit; text-decoration: none;">
                                        {{ $user->login }}
                                    </a>
                                </div>
                                <div class="c_search-line__td"><img src="/images/bg-rang.png" alt="rang"></div>
                                <div class="c_search-line__td">{{ $user->city }}</div>
                                <div class="c_search-line__td">1200</div>
                                <div class="c_search-line__td">Онлайн соревнования</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @component('parts.pagination', [
                    'paginator' => $users
                ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection