@extends('layouts.front.main')

@section('title', __('front.index'))
@section('content')
    <!-- slider start -->
    <div class="slider">
        <div class="slider__list">

            @foreach($carousel as $item)
            <div class="slider__item"
                style="background:linear-gradient(0deg, rgba(27, 32, 42, 0.5), rgba(27, 32, 42, 0.5)), url({{ asset($item->image_url) }});">
                <section class="container">
                    <div class="slider__cart">
                        <h1 class="slider__title__h1">{{ $item->title }}</h1>
                        <a href="{{ $item->url }}" class="slider__link">{{ $item->sub_content }}</a>
                    </div>
                </section>
            </div>
            @endforeach

        </div>
    </div>

    <!-- slider end -->


    <!-- about start -->

    <div class="about">
        <section class="container">
            <div class="about__cart">
                <div class="about__list">
                    <div class="about__item__text">
                        <h2 class="about__title__h2">{{ $about->title }}</h2>

                        <div class="about__text">
                            <p>
                                {{ $about->sub_content }}
                            </p>
                        </div>

                        <div class="about__list__button">
                            <a href="#modal1" class="about__link__tickets modal-trigger">{{__('front.tickets')}} <img
                                    src="/front/foto/tickets.svg" alt="tickets"></a>
                            <a href="{{ route('site.about') }}" class="about__link"> {{__('front.more')}}<span><i
                                        class="fas fa-chevron-right"></i></span></a>
                        </div>
                    </div>

                    <div class="about__img">
                        <img src="{{ asset($about->image_main_url) }}" alt="about">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- about end -->


    <!-- exposition start -->

    <div class="exposition">
        <section class="container">
            <div class="exposition__cart">
                <h2 class="about__title__h2">{{__('front.expositions')}}</h2>

                <div class="exposition__list">
                    @foreach($expositions as $item)
                        <div class="exposition__item">
                            <a href="{{ route('site.exposition',['model'=>$item->id]) }}">
                                <img src="{{asset($item->image_main_url)}}" alt="exposition">
                                <h3 class="exposition__title__h3">{{ $item->title }}</h3>
                                <div class="exposition__text">{{ $item->sub_content }}</div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>

    <!-- exposition end -->


    <!-- It is a virtual tour start -->

    <div class="virtual_tour" style="background-image:url(/front/foto/virtual_tour_fon.png)">
        <section class="container">
            <div class="virtual_tour__cart">
                <div class="virtual_tour__list">
                    <h2 class="about__title__h2">{{__('front.virtual_tour_menu')}}</h2>

                    <div class="virtual_tour__text">
                        <p>
                            {{__('front.history_tour')}}
                        </p>
                    </div>

                    <div class="virtual_tour__button">
                        <a href="#!" class="virtual_tour__link"> {{__('front.start_tour')}}<span><i
                                    class="fas fa-chevron-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- It is a virtual tour end -->


    <!-- For children start -->

    <div class="children">
        <section class="container">
            <div class="children__cart">
                <div class="children__list">
                    <div class="about__img">
                        <img src="{{ asset($forChild->image_main_url) }}" alt="about">
                    </div>

                    <div class="about__item__text">
                        <h2 class="about__title__h2">{{ $forChild->title }}</h2>

                        <div class="about__text">
                            <p>
                                {{ $forChild->sub_content }}
                            </p>
                        </div>

                        <div class="about__list__button">
                            <a href="{{route('site.for-children',['model'=>$forChild->id])}}" class="about__link">{{__('front.more')}} <span><i
                                        class="fas fa-chevron-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- For children end -->


    <!-- Museum collection start -->

    <!-- Museum collection end -->


    <!-- Galereya start -->

    <div class="galereya">
        <section class="container">
            <div class="galereya__cart">
                <h2 class="about__title__h2">{{__('front.gallery')}}</h2>

                <div class="galereya__list">
                    @foreach($photos as $item)
                        <div class="galereya__item">
                            <img src="{{ asset($item->image_url) }}" alt="galereya">
                        </div>
                    @endforeach

                </div>

                <div class="galereya__button">
                    <a href="{{ route('site.gallery') }}" class="galereya__link">{{__('front.more')}} <span><i
                                class="fas fa-chevron-right"></i></span></a>
                </div>
            </div>
        </section>
    </div>

    <!-- Galereya end -->


    <!-- News start -->

    <div class="news">
        <section class="container">
            <div class="news__cart">

                <div class="news__title__list">
                    <h2 class="about__title__h2">{{__('front.news')}}</h2>

                    <a href="{{ route('site.news') }}" class="news__link__button">{{__('front.more')}} <span><i
                                class="fas fa-chevron-right"></i></span></a>
                </div>

                <div class="news__list">
                    @foreach($news as $item)
                    <div class="news__item">
                        <a href="{{ route('site.newsIn',['news'=>$item->id]) }}">
                            <div class="news__img">
                                <img src="{{ asset($item->image_url) }}" alt="news">
                            </div>

                            <h4 class="news__title__h4">{{ date('Y-m-d',strtotime($item->date_mask)) }}</h4>
                            <h3 class="news__title__h3">{{$item->title}}</h3>
                            <h5 class="news__title__h5">
                                <svg width="41" height="12" viewBox="0 0 41 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M40.5303 6.53033C40.8232 6.23744 40.8232 5.76256 40.5303 5.46967L35.7574 0.696699C35.4645 0.403806 34.9896 0.403806 34.6967 0.696699C34.4038 0.989593 34.4038 1.46447 34.6967 1.75736L38.9393 6L34.6967 10.2426C34.4038 10.5355 34.4038 11.0104 34.6967 11.3033C34.9896 11.5962 35.4645 11.5962 35.7574 11.3033L40.5303 6.53033ZM0 6.75H40V5.25H0V6.75Z"
                                        fill="#022133" />
                                </svg>
                            </h5>
                        </a>
                    </div>
                    @endforeach

                </div>

            </div>
        </section>
    </div>

    <!-- News end -->


    <!-- Useful links start -->

    <div class="useful_links">
        <section class="container">
            <div class="useful_links__cart">
                <h2 class="about__title__h2">{{__('front.usefull_links')}}</h2>

                <div class="useful_links__list">
                    @foreach($usefullLinks as $item)
                    <div class="useful_links__item">
                        <a href="{{ $item->redirect_url }}">
                            <div class="useful_links__img">
                                <img src="{{ asset($item->image_url) }}" alt="useful_links">
                            </div>

                            <h4 class="useful_links__title__h4">
                                {{ $item->title }}
                                <span>
                                    <svg width="41" height="12" viewBox="0 0 41 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M40.5303 6.53033C40.8232 6.23744 40.8232 5.76256 40.5303 5.46967L35.7574 0.696699C35.4645 0.403806 34.9896 0.403806 34.6967 0.696699C34.4038 0.989593 34.4038 1.46447 34.6967 1.75736L38.9393 6L34.6967 10.2426C34.4038 10.5355 34.4038 11.0104 34.6967 11.3033C34.9896 11.5962 35.4645 11.5962 35.7574 11.3033L40.5303 6.53033ZM0 6.75H40V5.25H0V6.75Z"
                                            fill="#022133" />
                                    </svg>
                                </span>
                            </h4>
                        </a>
                    </div>
                    @endforeach

                </div>

            </div>
        </section>
    </div>

    <!-- Useful links end -->
@endsection
