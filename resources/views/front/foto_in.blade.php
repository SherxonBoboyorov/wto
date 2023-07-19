@extends('layouts.front.main')

@section('title',$gallery->title)
@section('content')

    <!-- Fotogalereya in start -->

    <div class="fotogalereya_in">
        <section class="container">
            <div class="fotogalereya_in__cart">
                <div class="fotogalereya_in__list1">
                    @foreach($gallery->photos as $photo)
                        <div class="fotogalereya_in__item1">
                            <img src="{{asset($photo->image_url)}}" alt="fotogalereya_in">
                            <h3 class="fotogalereya_in__title__h3">{{$photo->title()}}</h3>
                        </div>
                    @endforeach

                    {{-- <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_2.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_3.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_4.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_5.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_6.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_1.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_2.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_3.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_4.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_5.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div>

                    <div class="fotogalereya_in__item1">
                        <img src="/front/foto/galereya_in_6.png" alt="fotogalereya_in">
                        <h3 class="fotogalereya_in__title__h3">Consectetur adipiscing elit</h3>
                    </div> --}}

                </div>

                <div class="fotogalereya_in__list2">

                    @foreach ($gallery->photos as $photo)
                        <div class="fotogalereya_in__item2">
                            <img src="{{asset($photo->image_url)}}" alt="fotogalereya_in">
                        </div>
                    @endforeach

                    {{-- <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_2.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_3.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_4.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_5.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_6.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_1.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_2.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_3.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_4.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_5.png" alt="fotogalereya_in">
                    </div>

                    <div class="fotogalereya_in__item2">
                        <img src="/front/foto/galereya_in_6.png" alt="fotogalereya_in">
                    </div> --}}
                    
                </div>
            </div>
        </section>
    </div>

    <!-- Fotogalereya in end -->

@endsection