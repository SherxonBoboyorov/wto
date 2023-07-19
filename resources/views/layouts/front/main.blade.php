@php
use App\Models\Admin\Exposition;
use App\Models\Admin\ScientificResearch;
use App\Models\Admin\ForChildren;
$expostionsCategories = Exposition::where('status',1)->orderBy('order','asc')->get();
$researchCategories = ScientificResearch::where('status',1)->orderBy('order','asc')->get();
$forChildrenCategory = ForChildren::where('status',1)->orderBy('order','asc')->get();
      
       

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    @include('layouts/front/_styles')
    <title>@yield('title')</title>
</head>
<body>
   
    <!-- header start -->

    <header>
        <div class="header">
            <div class="header__top">
                <section class="container">
                    <div class="header__top__list">

                        <div class="header__item_list">

                        <!-- language start -->
                            
                        <div class="header__ru">
                                
                            <div class="header__ru_cart dropdown-trigger"data-target='dropdown1'>
                                <?php
            $availLocale=['en'=>'en', 'ru'=>'ru','uz'=>'O\'z'];
                                    ?>
                                <a data-target='dropdown1' class="header__en__link">{{ $availLocale[config('app.locale')] }}</a>
                                <span><i class="fas fa-angle-down"></i></span>
                            </div>
                            
                            <div class="header__ru_none dropdown-content" id='dropdown1'>
                                <div class="header__ru_list @if(config('app.locale')=='ru') active @endif">
                                    <a href="{{ url('lang/ru') }}" class="header__en__link">Ru</a>
                                </div>
                                
                                <div class="header__ru_list @if(config('app.locale')=='en') active @endif">
                                    <a href="{{ url('lang/en') }}" class="header__en__link">En</a>
                                </div>
                                
                                <div class="header__ru_list @if(config('app.locale')=='oz') active @endif">
                                    <a href="{{ url('lang/uz') }}" class="header__en__link">O’z</a>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- language start -->


                        <!-- Ko'zi ojizlar uchun start -->
							
							<div class="header__accessibility__mrx">
								<div class="header__accessibility">
									<span class="header__accessibility__icon" id="haAccessibilityIcon">
										<button class="header__button__top">{{__('front.special_opportunities')}}<span><i class="fas fa-eye"></i></span></button>
									</span>

									<div class="header__accessibility__dropdown ha__dropdown">
										<div class="ha__dropdown__content">
											<h4 class="ha__title">View:</h4>
											<div class="custom-form-group">
												<div class="custom-form-check">
													<input
														id="normalDesign"
														name="designPatterns"
														class="custom-form-check-input"
														type="radio"
														value="normalDesign"
													/>
													<label class="custom-form-check-label" for="normalDesign">
														{{__('front.normal_design')}}
													</label>
												</div>
		
												<div class="custom-form-check">
													<input
														id="blackAndWhiteDesign"
														name="designPatterns"
														class="custom-form-check-input"
														type="radio"
														value="blackAndWhiteDesign"
													/>
													<label class="custom-form-check-label" for="blackAndWhiteDesign">
														{{__('front.black_and_white_design')}}
													</label>
												</div>
											</div>
		
											<h4 class="ha__title">{{__('front.font_size')}}</h4>
											<div class="ha__btn-group">
												<button id="fontSizeMin" class="ha_btn">A-</button>
												<button id="fontSizeDefault" class="ha_btn">A</button>
												<button id="fontSizeMax" class="ha_btn">A+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
                            
						<!-- Ko'zi ojizlar uchun end -->

                        </div>

                        <div class="header__top__logo">
                            <a href="/">
                                <img src="/front/foto/logo.svg" alt="logo">
                            </a>
                        </div>

                        <div class="header__trigger__button">
                            <a href="#modal1" class="header__top__tickets modal-trigger">{{__('front.tickets')}} <img src="/front/foto/tickets.svg" alt="tickets"></a>
                        </div>

                        <button class="header__burger__none sidenav-trigger" data-target="slide-out">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                    </div>
                </section>
            </div>

            <div class="header__bottom">
                <section class="container">
                    <ul class="header__bottom__menu sidenav" id="slide-out">

                        <li>
                            <h4 class="header__bottom__title__h4">{{__('front.main_menu')}}<span><i class="fas fa-angle-down"></i></span></h4>

                            <ul class="header__bottom__dropdown">
                                <li>
                                    <a href="{{route('site.about')}}" class="header__bottom__dropdown__link">{{__('front.about_menu')}}</a>
                                </li>

                                <li>
                                    <a href="{{route('site.leaders')}}" class="header__bottom__dropdown__link">{{__('front.leaders_menu')}}</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <h4 class="header__bottom__title__h4">{{__('front.expositions_menu')}} <span><i class="fas fa-angle-down"></i></span></h4>

                            <ul class="header__bottom__dropdown">
                               
                                @foreach($expostionsCategories as $item)
                                <li>
                                    <a href="{{ route('site.exposition',['model'=>$item->id]) }}" class="header__bottom__dropdown__link">{{ $item->title }}</a>
                                </li>
                                @endforeach

                                

                            </ul>
                        </li>

                        <li>
                            <h4 class="header__bottom__title__h4">{{__('front.science_menu')}} <span><i class="fas fa-angle-down"></i></span></h4>

                            <ul class="header__bottom__dropdown">
                            
                                @foreach($researchCategories as $item)
                                <li>
                                    <a href="{{ route('site.research',['model'=>$item->id]) }}" class="header__bottom__dropdown__link">{{ $item->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <h4 class="header__bottom__title__h4">{{__('front.for_children_menu')}}<span><i class="fas fa-angle-down"></i></span></h4>

                            <ul class="header__bottom__dropdown">
                            
                                @foreach($forChildrenCategory as $item)
                                <li>
                                    <a href="{{ route('site.for-children',['model'=>$item->id]) }}" class="header__bottom__dropdown__link">{{ $item->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        {{-- <li>
                            <a href="{{ route('site.for-children') }}" class="header__bottom__link">{{__('front.for_children_menu')}}</a>
                        </li> --}}

                        <li>
                            <a href="{{ route('site.news') }}" class="header__bottom__link">{{__('front.news_menu')}}</a>
                        </li>

                        <li>
                            <a href="#!" class="header__bottom__link">{{__('front.virtual_tour_menu')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('site.gallery') }}" class="header__bottom__link">{{__('front.gallery_menu')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('site.museum-collection') }}" class="header__bottom__link">{{__('front.museum_collections_menu')}}</a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </header>

    <!-- header end -->


    <!-- payment start -->

    <div class="payment modal" id="modal1">
        <h2 class="payment__title">
            <span>
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 30C20.5667 30 21.042 29.808 21.426 29.424C21.81 29.04 22.0013 28.5653 22 28V20C22 19.4333 21.808 18.958 21.424 18.574C21.04 18.19 20.5653 17.9987 20 18C19.4333 18 18.958 18.192 18.574 18.576C18.19 18.96 17.9987 19.4347 18 20V28C18 28.5667 18.192 29.042 18.576 29.426C18.96 29.81 19.4347 30.0013 20 30ZM20 14C20.5667 14 21.042 13.808 21.426 13.424C21.81 13.04 22.0013 12.5653 22 12C22 11.4333 21.808 10.958 21.424 10.574C21.04 10.19 20.5653 9.99867 20 10C19.4333 10 18.958 10.192 18.574 10.576C18.19 10.96 17.9987 11.4347 18 12C18 12.5667 18.192 13.042 18.576 13.426C18.96 13.81 19.4347 14.0013 20 14ZM20 40C17.2333 40 14.6333 39.4747 12.2 38.424C9.76667 37.3733 7.65 35.9487 5.85 34.15C4.05 32.35 2.62533 30.2333 1.576 27.8C0.526667 25.3667 0.00133333 22.7667 0 20C0 17.2333 0.525333 14.6333 1.576 12.2C2.62667 9.76667 4.05133 7.65 5.85 5.85C7.65 4.05 9.76667 2.62533 12.2 1.576C14.6333 0.526667 17.2333 0.00133333 20 0C22.7667 0 25.3667 0.525333 27.8 1.576C30.2333 2.62667 32.35 4.05133 34.15 5.85C35.95 7.65 37.3753 9.76667 38.426 12.2C39.4767 14.6333 40.0013 17.2333 40 20C40 22.7667 39.4747 25.3667 38.424 27.8C37.3733 30.2333 35.9487 32.35 34.15 34.15C32.35 35.95 30.2333 37.3753 27.8 38.426C25.3667 39.4767 22.7667 40.0013 20 40ZM20 36C24.4667 36 28.25 34.45 31.35 31.35C34.45 28.25 36 24.4667 36 20C36 15.5333 34.45 11.75 31.35 8.65C28.25 5.55 24.4667 4 20 4C15.5333 4 11.75 5.55 8.65 8.65C5.55 11.75 4 15.5333 4 20C4 24.4667 5.55 28.25 8.65 31.35C11.75 34.45 15.5333 36 20 36Z" fill="#E13434"/>
                </svg>              
                <div></div>      
            </span>
            @lang('front.this_section_is_under_development')
        </h2>
        <div class="payment__cart">
            <div class="payment__list" id="paymentIncriment">
                <h2 class="payment__title__h2">Turlari</h2>

                <div class="payment__list__item">
                    <h3 class="payment__title__h3">O’zbekiston katta yoshdagi axolisi uchun</h3>

                    <div class="payment__cart__item">
                        <button class="payment__incriment payment__minus"><i class="fas fa-minus"></i></button>
                        <span class="payment__span payment__value">0</span>
                        <button class="payment__incriment payment__plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <h4 class="payment__title__h4" data-payment="7500">0</h4>
                </div>

                <div class="payment__list__item">
                    <h3 class="payment__title__h3">O’zbekiston oliy o’quv yurtlari talabalari uchun</h3>

                    <div class="payment__cart__item">
                        <button class="payment__incriment payment__minus"><i class="fas fa-minus"></i></button>
                        <span class="payment__span payment__value">0</span>
                        <button class="payment__incriment payment__plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <h4 class="payment__title__h4" data-payment="1000">0</h4>
                </div>

                <h2 class="payment__title__h2">Ekskursiya xizmati: (1-20 kishilik guruxga)</h2>

                <div class="payment__list__item">
                    <h3 class="payment__title__h3">Katta yoshdagilar va O’zR faoliyat yuritayotgan shaxslar uchun</h3>

                    <div class="payment__cart__item">
                        <button class="payment__incriment payment__minus"><i class="fas fa-minus"></i></button>
                        <span class="payment__span payment__value">0</span>
                        <button class="payment__incriment payment__plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <h4 class="payment__title__h4" data-payment="1000">0</h4>
                </div>

                <div class="payment__list__item">
                    <h3 class="payment__title__h3">Oliy o’quv yurtlari talabalari uchun</h3>

                    <div class="payment__cart__item">
                        <button class="payment__incriment payment__minus"><i class="fas fa-minus"></i></button>
                        <span class="payment__span payment__value">0</span>
                        <button class="payment__incriment payment__plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <h4 class="payment__title__h4" data-payment="5000">0</h4>
                </div>

                <h2 class="payment__title__h2">Tasvirga tushirish xizmati</h2>
                
                <div class="payment__list__item">
                    <h3 class="payment__title__h3">Eksponatlarning videokamerada suratga tushirish</h3>

                    <div class="payment__cart__item">
                        <button class="payment__incriment payment__minus"><i class="fas fa-minus"></i></button>
                        <span class="payment__span payment__value">0</span>
                        <button class="payment__incriment payment__plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <h4 class="payment__title__h4" data-payment="1000">0</h4>
                </div>

                <div class="payment__list__item">
                    <h3 class="payment__title__h3">Eksponatlarni rasmga olish</h3>

                    <div class="payment__cart__item">
                        <button class="payment__incriment payment__minus"><i class="fas fa-minus"></i></button>
                        <span class="payment__span payment__value">0</span>
                        <button class="payment__incriment payment__plus"><i class="fas fa-plus"></i></button>
                    </div>
                    <h4 class="payment__title__h4" data-payment="60000">0</h4>
                </div>
                
            </div>

            <div class="payment__cart__list">
                <h3 class="payment__title__sum" id="payment_sum">Umumiy qiymat: <span>0</span> so’m</h3>
                <button  id="payment_sum_button" class="payment__button" data-target="modal2">
                    Sotib olish <span><i class="fas fa-chevron-right"></i></span>
                </button>
            </div> 
        </div>
    </div>

    <div class="payment__email modal2" id="modal2">
        <form action="#!" class="payment__email__form">
            <input class="payment__input__form" type="email" placeholder="Email">
            <button class="payment__button" type="submit">Yuborish <span><i class="fas fa-chevron-right"></i></span></button>
        </form>
    </div>

    <!-- payment end -->
    @include('layouts.front._breadcrumbs')
    <!-- about_content start-->
    
    @yield('content')

    <!-- about_content end-->


    <!-- footer start -->

    <footer>
        <div class="footer">
            <div class="footer__top">
                <section class="container">
                    <div class="footer__top__list">
                        <div class="footer__list__item">
                            <div class="footer__img">
                                <a href="/">
                                    <img src="/front/foto/footer_logo.svg" alt="logo">
                                </a>
                            </div>

                            <ul class="footer__menu__icons">
                                <li>
                                    <a href="https://www.instagram.com/uzbekiston_tarixi_davlat_muzey/" class="footer__link__icons"><i class="fab fa-instagram"></i></a>
                                </li>

                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100063460395898" class="footer__link__icons"><i class="fab fa-facebook-f"></i></a>
                                </li>

                                <li>
                                    <a href="https://t.me/tarix_muzeyi" class="footer__link__icons"><i class="fab fa-telegram"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="footer__item__menu">

                            <ul class="footer__menu">
                                <li>
                                    <a href="{{route('site.about')}}" class="footer__menu__link">{{__('front.about_menu')}}</a>
                                </li>
                                                                <li>
                                    <a href="{{ route('site.expositions') }}" class="footer__menu__link">{{__('front.expositions_menu')}}</a>
                                </li>

                                <li>
                                    <a href="{{ route('site.news') }}" class="footer__menu__link">{{__('front.news_menu')}}</a>
                                </li>
{{-- 
                                <li>
                                    <a href="about_museum/" class="footer__menu__link">{{__('front.science_menu')}}</a>
                                </li> --}}

                                {{-- <li>
                                    <a href="{{ route('site.for-children') }}" class="footer__menu__link">{{__('front.for_children_menu')}}</a>
                                </li> --}}
                            </ul>

                            <ul class="footer__menu">
                                

                                <li>
                                    <a href="http://360.vrmuseum.uz/museum5/" class="footer__menu__link">{{__('front.virtual_tour_menu')}}</a>
                                </li>

                                <li>
                                    <a href="{{ route('site.gallery') }}" class="footer__menu__link">{{__('front.gallery_menu')}}</a>
                                </li>

                                <li>
                                    <a href="{{ route('site.museum-collection') }}" class="footer__menu__link">{{__('front.museum_collections_menu')}}</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </section>
            </div>

            <div class="footer__bottom">
                <section class="container">
                    <div class="footer__bottom__list">
                        <h4 class="footer__bottom__title__h4">«O’zbekiston tarixi davlat muzeyi» {{__('front.rights_reserved')}}</h4>
                        <h4 class="footer__bottom__title__h4">© Copyright <?= date('Y') ?> - {!! __('front.developed_by_sos',['link'=>'<a href="https://www.sos.uz" style="color: white">SOS Group</a>']) !!}  </h4>
                    </div>
                </section>
            </div>
        </div>
    </footer>
    <div id="highlightMenu" class="highlight-menu">
        <!-- <span id="highlight_share" class="highlight-menu__item disabled">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z"></path></svg>
        </span> -->
        <span id="highlight_textToSpeech" class="highlight-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.84-5 6.7v2.07c4-.91 7-4.49 7-8.77c0-4.28-3-7.86-7-8.77M16.5 12c0-1.77-1-3.29-2.5-4.03V16c1.5-.71 2.5-2.24 2.5-4M3 9v6h4l5 5V4L7 9H3Z"></path></svg>
        </span>
        <span id="highlight_resetTextToSpeech" class="highlight-menu__item">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4L9.91 6.09L12 8.18M4.27 3L3 4.27L7.73 9H3v6h4l5 5v-6.73l4.25 4.26c-.67.51-1.42.93-2.25 1.17v2.07c1.38-.32 2.63-.95 3.68-1.81L19.73 21L21 19.73l-9-9M19 12c0 .94-.2 1.82-.54 2.64l1.51 1.51A8.916 8.916 0 0 0 21 12c0-4.28-3-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71m-2.5 0c0-1.77-1-3.29-2.5-4.03v2.21l2.45 2.45c.05-.2.05-.42.05-.63Z"></path></svg>
        </span>
    </div>
    
    @include('layouts/front/_scripts')

    

</body>
</html>