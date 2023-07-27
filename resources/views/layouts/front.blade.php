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
                <span class="selected-display" id="destination">{{ strtoupper(app()->getLocale()) }}</span>
                <svg class="" id="drp-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow transition-all ml-auto rotate-180" >
                  <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
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

            <div class="navbar-content">
              <div class="navbar-nav">
                <div class="nav">
                  <a class="nav-link" href="{{ route('about') }}">@lang('front.about')</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('our-teams') }}">@lang('front.our_team')</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('activities', ['id' => 1]) }}">@lang('front.activities')</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('articles') }}">@lang('front.news')</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('events') }}">@lang('front.events')</a>
                </div>
                <div class="nav">
                  <a class="nav-link" href="{{ route('contact') }}">@lang('front.contacts')</a>
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
                  <a href="{{ route('about') }}">@lang('front.about')</a>
                </p>
                <p>
                  <a href="{{ route('our-teams') }}">@lang('front.our_team')</a>
                </p>
                <p>
                  <a href="{{ route('activities', ['id' => 1]) }}">@lang('front.activities')</a>
                </p>
              </div>
              <div>
                <p>
                  <a href="{{ route('articles') }}">@lang('front.news')</a>
                </p>
                <p>
                  <a href="{{ route('events') }}">@lang('front.events')</a>
                </p>
                <p>
                  <a href="{{ route('contact') }}">@lang('front.contacts')</a>
                </p>
              </div>
              <div>
                <p class="think">
                  <a href="tel:+99 893 505 45 05">
                    @lang('front.phone_number') <span>+99 893 505 45 05</span>
                  </a>
                </p>
                <p class="think">
                  <a href="#!">
                    @lang('front.address')
                    <span>68 Sadik Azimov St., Tashkent city, Uzbekistan</span>
                  </a>
                </p>
                <p class="think">
                  <a href="mailto:info@sos.uz">
                    @lang('front.email') <span>info@sos.uz</span>
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
                  <a href="#"> «WTO» @lang('front.all_rights_reserved') </a>
                </p>
                <p>
                  <a href="https://sos.uz">
                    © Copyright {{ date("Y") }} - Web developed by SOS Group
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
    