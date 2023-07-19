@extends('layouts.front.main')

@section('title', $model->getTitleAttribute())
@section('content')
    <!-- news_in start -->

    <div class="news_in">
        <section class="container">
            <div class="news_in__cart">
                <div class="about_content__text">
                    {!! $model->getSubContentAttribute() !!}
                 </div>
                <div class="news_in__img">
                    <img src="{{ asset($model->image_url) }}" alt="news_in">
                </div>
                <div class="about_content__text">
                   {!! $model->getContentAttribute() !!}
                </div>
            </div>
        </section>
    </div>

    <!-- news_in end -->
@endsection