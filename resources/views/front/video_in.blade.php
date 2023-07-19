@extends('layouts.front.main')

@section('title', $gallery->title)
@section('content')

    <!-- video_in start -->

    <div class="galereya_video">
        <section class="container">
            <div class="galereya_video__cart">
                <div class="about_content__cart__videos">
                    <div class="about_content__videos">
                        <a data-fancybox="video-gallery" href="{{ asset($gallery->video_url) }}">
                            <img src="/front/foto/galereya_1.png" alt="video"/>
                            <!-- play start -->
                            
                            <div class="button__min is-play" href="#">
                                <div class="button-outer-circle has-scale-animation"></div>
                                <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                <div class="button-icon is-play">
                                    <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                </div>
                            </div>
                            
                            <!-- play end -->
                        </a>
                    </div>

                    <div class="galereya_video__text">
                        <h3 class="galereya_video__title__h4">{{ $gallery->title }}</h3>
                        <h4 class="galereya_video__data">{{ date('Y-m-d',strtotime($gallery->date_mask)) }}</h4>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- video_in end -->


@endsection