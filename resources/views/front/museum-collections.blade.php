@extends('layouts.front.main')

@section('title', __('front.museum_collections_menu'))
@section('content')
    <!-- news start -->

    <div class="news">
        <section class="container">
            <div class="news__cart">

                <div class="news__list">
                    @foreach ($model as $item)
                        <div class="news__item">
                            <a href="{{ route('site.museum-collection',['model'=>$item->id]) }}">
                                <div class="news__img">
                                    <img src="{{ asset($item->image_url) }}" alt="news">
                                </div>

                                <h4 class="news__title__h4">{{ date('Y-m-d',strtotime($item->date_mask)) }}</h4>
                                <h3 class="news__title__h3">{{ $item->title }}</h3>
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


                {{ $model->links('vendor.pagination.front') }}

            </div>
        </section>
    </div>

    <!-- news end -->
@endsection
