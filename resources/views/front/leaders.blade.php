@extends('layouts.front.main')

@section('title', __('front.leaders_menu'))
@section('content')

    <!-- Leadership start -->

    <div class="leadership">
        <section class="container">
            <div class="leadership__cart">
    
                <div class="leadership__list">
                    @foreach($model as $item)
                    <div class="leadership__item">
                        
                        <div class="leadership__item__list">
    
                            <div class="leadership__img">
                                <img src="{{ asset($item->image_url) }}" alt="leadership">
                            </div>
    
                            <section class="leadership__item__text">
                                <h2 class="leadership__title__h2">{{ $item->name }}</h2>
                                <ul class="leadership__menu__contacts">
                                    <li>
                                        <span>{{__('front.position')}}</span>
                                        <h4 class="leadership__link__contacts">{{ $item->position }}</h4>
                                    </li>
    
                                    <li>
                                        <span>{{__('front.phone')}}</span>
                                        <a href="tel:{{$item->phone}}" class="leadership__link__contacts">{{$item->phone}}</a>
                                    </li>
    
                                    <li>
                                        <span>{{__('front.reception_days')}}</span>
                                        <h4 class="leadership__link__contacts">{{ $item->reception_days }}</h4>
                                    </li>
    
                                    <li>
                                        <span>{{__('front.email')}}</span>
                                        <a href="mailto:{{ $item->email }}" class="leadership__link__contacts">{{ $item->email }}</a>
                                    </li>
                                </ul>
                                <button class="leadership__button__open">{{__('front.more')}}</button> 
                            </section>
    
                        </div>
    
                        <section class="leadership__text__next">
                            {{-- <h2 class="about__title__h2">Lorem ipsum</h2> --}}
                            <div class="about_content__text clearfix">
                                {!! $item->content !!}
                            </div>
                        </section>
    
                    </div>
                    @endforeach
                </div>
    
            </div>
        </section>
        </div>
    
        <!-- Leadership end -->
    
@endsection