@extends('layouts.front.main')

@section('title', __('front.gallery'))
@section('content')
    <!-- Galereya start -->

    <div class="galereya_in">
        <section class="container">
            <div class="galereya_in__cart">

                <ul class="galereya_in__menu">
                    <li>
                        <a href="#!" class="galereya_in__menu__link">{{ __('front.photos') }}</a>
                    </li>

                    <li>
                        <a href="#!" class="galereya_in__menu__link">{{ __('front.videos') }}</a>
                    </li>
                </ul>


                <section class="galereya_in__cart__list">

                    <div class="galereya_in__item">
                        
                        <div class="galereya_in__list">
                            @foreach($galleries as $gallery)
                                    <div class="galereya_in__list__item">
                                        <a href="{{'/site/gallery/photos/'.$gallery->id}}">
                                            <img src="{{asset($gallery->image_url)}}" alt="galereya_in">
                                            <span><i class="fas fa-eye"></i></span>
                                            <h3 class="exposition__title__h3">{{$gallery->title()}}</h3>
                                            <h4 class="galereya_in__data">{{date('d.m.Y',strtotime($gallery->created_at))}}</h4>
                                        </a>
                                    </div>
                            @endforeach
                            {{-- <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_2.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div> --}}

                            {{-- <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_3.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_4.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_5.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_6.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_7.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_8.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_1.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_2.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_3.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_4.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_5.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_6.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_7.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__list__item">
                                <a href="galereya_in.html">
                                    <img src="/front/foto/galereya_in_8.png" alt="galereya_in">
                                    <span><i class="fas fa-eye"></i></span>
                                    <h3 class="exposition__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__data">22.10.2022</h4>
                                </a>
                            </div> --}}

                        </div>

                        {{ $galleries->links('vendor.pagination.front') }}

                    </div>

                    <div class="galereya_in__item">
                        
                        <div class="galereya_in__video">
                            @foreach($galleries as $gallery)
                                @foreach($gallery->videos as $video)
                                    <div class="galereya_in__video_item">
                                        <a href="/site/gallery/videos/{{$video->id}}">
                                            <div class="galereya_in__video__img">
                                                <img src="{{asset($video->image_url)}}" alt="video">
            
                                                <!-- play start -->
                                                
                                                <div class="button__min is-play" href="#">
                                                    <div class="button-outer-circle has-scale-animation"></div>
                                                    <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                                    <div class="button-icon is-play">
                                                        <img class="about_contint_in__video__img__play" alt="All" src="{{asset('/front/foto/play.svg')}}">
                                                    </div>
                                                </div>
                                                
                                                <!-- play end -->
                                        
                                            </div>
        
                                            <h3 class="galereya_in__title__h3">{{$video->title()}}</h3>
                                            <h4 class="galereya_in__title__data">{{date('d.m.Y',strtotime($video->created_at))}}</h4>
                                        </a>
                                    </div>
                                @endforeach
                            @endforeach

                            {{-- <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_2.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">consectetur adipiscing elit</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_3.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_4.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_5.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_6.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_7.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">consectetur adipiscing elit</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_8.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_1.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_2.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">consectetur adipiscing elit</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_3.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_4.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_5.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">incididunt ut labore et dolore</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_6.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">Lorem ipsum dolor sit amet</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_7.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">consectetur adipiscing elit</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div>

                            <div class="galereya_in__video_item">
                                <a href="video_in.html">
                                    <div class="galereya_in__video__img">
                                        <img src="/front/foto/galereya_8.png" alt="video">
    
                                        <!-- play start -->
                                        
                                        <div class="button__min is-play" href="#">
                                            <div class="button-outer-circle has-scale-animation"></div>
                                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                                            <div class="button-icon is-play">
                                                <img class="about_contint_in__video__img__play" alt="All" src="/front/foto/play.svg">
                                            </div>
                                        </div>
                                        
                                        <!-- play end -->
                                
                                    </div>

                                    <h3 class="galereya_in__title__h3">sed do eiusmod tempor</h3>
                                    <h4 class="galereya_in__title__data">22.10.2022</h4>
                                </a>
                            </div> --}}

                        </div>  
                    </div>

                </section>



            </div>
        </section>
    </div>

    <!-- Galereya end -->
@endsection