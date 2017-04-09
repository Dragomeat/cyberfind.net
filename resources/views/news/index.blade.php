@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
                'Новости'
            ]
        ])
        @endcomponent

        <div class="c_box">

            <div class="c_news-filter">
                <form action="/">
                    <div class="c_news-filter__type"></div>
                    <div class="c_news-filter__theme"></div>
                    <div class="c_news-filter__location"></div>
                    <div class="c_news-filter__archive"></div>
                    <div class="c_news-filter__search"></div>
                </form>
            </div>

            <div class="c_news-list">
                @forelse($news as $value)
                    <div class="c_news-list__item">
                        <a href="{{ route('news.show', $value->slug) }}" class="c_news-list__thumb">
                            <img src="{{ asset($value->illustration) }}" alt="news">
                        </a>
                        <div class="c_news-list__box">
                            <a href="{{ route('news.show', $value->slug) }}" class="c_news-list__title">{{ $value->title }}</a>
                            <div class="c_news-list__txt">
                                {!! $value->content_rendered  !!}
                            </div>
                            <div class="c_news-list__more">
                                <a href="{{ route('news.show', $value->slug) }}">Подробнее</a>
                            </div>
                            {{--<div class="c_news-list__asses">--}}
                                {{--<div class="c_news-list__like">10</div>--}}
                                {{--<div class="c_news-list__dislike">2</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                @empty
                    <div>Новостей пока нет :(</div>
                @endforelse
            </div>

            {{--<div class="c_news-pagination">--}}
                {{--<div class="c_news-prev"><a href="#">Предыдущая</a></div>--}}
                {{--<div class="c_news-next"><a href="#">Следующая</a></div>--}}
            {{--</div>--}}

            {{ $news->links('parts.pagination', ['paginator' => $news]) }}

        </div>
    </div>
@endsection