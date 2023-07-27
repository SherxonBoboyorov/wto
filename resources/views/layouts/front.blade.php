

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('front/sass/style.css') }}" />
    <title>WTO | Home</title>
  </head>
  <body>
    <div class="container-fluid">
      <!-- Header start -->
      <div class="header">
        <nav class="header-content navbar navbar-expand-md">
          <a class="navbar-brand logos" href="{{ route('/') }}">
            <img src="{{ asset('front/images/logos.jpeg') }}" alt="" />
          </a> 

          <div class="collapse navbar-collapse link-content" id="navbarNavAltMarkup">
            <div class="container-dropdown lang-1">
              <div class="wrapper-dropdown" id="dropdown">
                <span class="selected-display" id="destination">Uz</span>
                <svg class="" id="drp-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow transition-all ml-auto rotate-180" >
                  <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <ul class="dropdown">
                  <li class="item"><a href="#">Uz</a></li>
                  <li class="item"><a href="#">En</a></li>
                  <li class="item"><a href="#">Ru</a></li>
                </ul>
              </div>
            </div>

            <div class="navbar-content">
              <div class="navbar-nav">
                <div class="nav">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('our-teams') }}">Our Team</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('activities', ['id' => 1]) }}">Activities</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('articles') }}">News</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('events') }}">Events</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('contact') }}">Contacts</a>
                </div>

                <div class="container-dropdown lang-2">
                  <div class="wrapper-dropdown" id="dropdown">
                    <span class="selected-display" id="destination">{{ strtoupper(app()->getLocale()) }}</span>
                    <svg class="" id="drp-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow transition-all ml-auto rotate-180">
                      <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>

                    <ul class="dropdown">
                      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                      @if($localeCode != app()->getLocale())
                      <li class="item" @if($localeCode == app()->getLocale()) active @endif>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                          {{ strtoupper($localeCode) }}
                       </a>
                      </li>
                       @endif 
                      @endforeach
                    </ul>
                  </div>
                </div>


                {{-- <section class="header__ru__list">
                  <!-- language start -->

                  <div class="header__ru">

                      <div class="header__ru_cart dropdown-trigger"data-target='dropdown1'>
                          <a data-target='dropdown1' class="header__en__link">{{ strtoupper(app()->getLocale()) }}</a>
                          <span><i class="fas fa-angle-down"></i></span>
                      </div>

                      <div class="header__ru_none dropdown-content" id='dropdown1'>
                          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                              @if($localeCode != app()->getLocale())
                              <div class="header__ru_list @if($localeCode == app()->getLocale()) active @endif">
                                  <a rel="alternate" class="header__en__link" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                      {{ strtoupper($localeCode) }}
                                  </a>
                              </div>
                              @endif
                          @endforeach
                      </div>
                  </div>

                  <!-- language start -->
                  <button class="header__burger__none sidenav-trigger" data-target="slide-out"><i class="fas fa-bars"></i></button>
              </section> --}}
                


              </div>
            </div>
          </div>
          <button class="navbar-toggler" type="button">
            <i class="fa-solid fa-bars"></i>
          </button>
        </nav>
      </div>

      <!-- Header end -->


      @yield('content')


      <!-- Main Block end -->

      <div class="footer">
        <div class="footer-content">
          <div class="row">
            <div class="col col-1">
              <div>
                <p>
                  <a href="{{ route('about') }}"> About </a>
                </p>
                <p>
                  <a href="{{ route('our-teams') }}"> Our Team </a>
                </p>
                <p>
                  <a href="{{ route('activities', ['id' => 1]) }}"> Activities </a>
                </p>
              </div>
              <div>
                <p>
                  <a href="{{ route('articles') }}"> News </a>
                </p>
                <p>
                  <a href="{{ route('events') }}"> Events </a>
                </p>
                <p>
                  <a href="{{ route('contact') }}"> Contacts </a>
                </p>
              </div>
              <div>
                <p class="think">
                  <a href="tel:+99 893 505 45 05">
                    PHONE NUMBER <span>+99 893 505 45 05</span>
                  </a>
                </p>
                <p class="think">
                  <a
                    href="https://www.google.com/maps/place/68+%D1%83%D0%BB%D0%B8%D1%86%D0%B0+%D0%A1%D0%B0%D0%B4%D1%8B%D0%BA%D0%B0+%D0%90%D0%B7%D0%B8%D0%BC%D0%BE%D0%B2%D0%B0,+%D0%A2%D0%B0%D1%88%D0%BA%D0%B5%D0%BD%D1%82,+%D0%A3%D0%B7%D0%B1%D0%B5%D0%BA%D0%B8%D1%81%D1%82%D0%B0%D0%BD/@41.3038379,69.286333,17z/data=!3m1!4b1!4m6!3m5!1s0x38aef52ca707eaa9:0x14c8b822bd473a84!8m2!3d41.3038379!4d69.2889133!16s%2Fg%2F11h1htvj25?authuser=0&entry=ttu"
                  >
                    ADDRESS
                    <span>68 Sadik Azimov St., Tashkent city, Uzbekistan</span>
                  </a>
                </p>
                <p class="think">
                  <a href="mailto:info@sos.uz">
                    EMAIL <span>info@sos.uz</span>
                  </a>
                </p>
              </div>
            </div>
            <div class="col col-2">
              <div>
                <div class="link-logos">
                  <div class="sm-logo">
                    <a href="#!"><i class="fa-brands fa-instagram"></i></a>
                  </div>
                  <div class="sm-logo">
                    <a href="#!"><i class="fa-brands fa-facebook-f"></i></a>
                  </div>
                  <div class="sm-logo">
                    <a href="#!"><i class="fa-brands fa-youtube"></i></a>
                  </div>
                </div>
                <p>
                  <a href="#"> «WTO» All rights reserved </a>
                </p>
                <p>
                  <a href="https://sos.uz">
                    © Copyright 2022 - Web developed by SOS Group
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('front/js/swiper.js') }}"></script>
    <script src="{{ asset('front/js/app.js') }}"></script>
  </body>
</html>
    