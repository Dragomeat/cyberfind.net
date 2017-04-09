@extends('layouts.app')

@section('content')
    <div class="b_inb">
        @component('parts.breadcrumbs', [
            'elements' => [
                route('news.index') => 'Новости',
                route('news.show', $news->slug) => $news->title
            ]
        ])
        @endcomponent

        <div class="c_box">

            <div class="c_content c_single" style="margin-left: auto;margin-right: auto;width: 80%;float: none;">
                <h1>{{ $news->title }}</h1>
                <div class="c_single-date">{{ $news->created_at->diffForHumans() }}</div>
                <div class="c_single-thumb">
                    <img src="{{ asset($news->illustration) }}" alt="news-single">
                </div>
                <div class="c_txt c_single-txt">
                    {!! $news->content_rendered !!}
                    {{--<div class="c_search-char__eval c_single-eval">--}}
                    {{--<div class="c_search-char__like">10</div>--}}
                    {{--<div class="c_search-char__dislike">258964</div>--}}
                    {{--</div>--}}
                </div>
            </div>


            {{--<div class="c_news-big__left c_sidebar">--}}
            {{--<div class="c_news-big__item">--}}
            {{--<a href="#">--}}
            {{--<span class="c_news-big__thumb"><img src="/images/bg-news-big.jpg" alt="news"></span>--}}
            {{--<span class="c_news-big__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna , sed do eiusmod tempor incididunt ut labore et dolore magna</span>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--<div class="c_news-big__item">--}}
            {{--<a href="#">--}}
            {{--<span class="c_news-big__thumb"><img src="/images/bg-news-big.jpg" alt="news"></span>--}}
            {{--<span class="c_news-big__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna , sed do eiusmod tempor incididunt ut labore et dolore magna</span>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--<div class="c_news-big__item">--}}
            {{--<a href="#">--}}
            {{--<span class="c_news-big__thumb"><img src="/images/bg-news-big.jpg" alt="news"></span>--}}
            {{--<span class="c_news-big__title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna , sed do eiusmod tempor incididunt ut labore et dolore magna</span>--}}
            {{--</a>--}}
            {{--</div>--}}
            {{--<div class="c_news-allbtn"><a href="#">Все новости</a></div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection