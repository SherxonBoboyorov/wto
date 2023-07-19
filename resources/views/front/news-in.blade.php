@extends('layouts.front.main')

@section('title', $model->title)
@section('content')
    <!-- news_in start -->

    <div class="news_in">
        <section class="container">
            <div class="news_in__cart">

                <div class="news_in__img">
                    <img src="{{ asset($model->image_url) }}" alt="news_in">
                </div>

                <h4 class="news_in__data">{{ date('Y-m-d',strtotime($model->date_mask)) }}</h4>

                <div class="about_content__text">
                   {!! $model->content !!}
                </div>
            </div>
        </section>
    </div>

    <!-- news_in end -->
@endsection