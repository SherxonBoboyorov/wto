@extends('layouts.front.main')

@section('title',$model->title)
@section('content')
    <div class="about_content">
        <section class="container">
            <div class="about_content__cart">

                <div class="about_content__text">
                    <p>
                       
                       {{ $model->sub_content }}
                    </p>
                    {{-- @if ($model->id != 7) --}}
                    <img src="{{ asset($model->image_url) }}" alt="perspiciatis">                        
                    {{-- @endif --}}
                    {!!$model->content!!}
                </div>
                @if(!empty($model->video_url))
                <div class="about_content__cart__videos">
                    <div class="about_content__videos">
                        <a data-fancybox="video-gallery" href="{{ $model->video_url }}">
                            <img src="/front/foto/video.png" alt="video" />
                            <!-- play start -->
                            
                            <div class="button__min is-play" href="#">
                                <div class="button-outer-circle has-scale-animation"></div>
                                <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                <div class="button-icon is-play">
                                    <img class="about_contint_in__video__img__play" alt="All"
                                        src="/front/foto/play.svg">
                                </div>
                            </div>

                            <!-- play end -->
                        </a>
                    </div>
                </div>
                @endif 

            </div>
        </section>
    </div>
@endsection
