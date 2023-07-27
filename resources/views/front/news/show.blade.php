@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">{{ $article->{'title_' . app()->getLocale()} }}</p>
          <p class="text"><a href="{{ route('articles') }}">News</a> - {{ $article->{'title_' . app()->getLocale()} }}</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Activities start -->
      <div class="container">
        <div class="news-post">
          <div class="row">
            <p class="title">{{ $article->{'title_' . app()->getLocale()} }}</p>
            <p class="text">
                {!! $article->{'sub_content_' . app()->getLocale()} !!}
            </p>

            <div class="img-content big-img"style="width: 100%; height: 400px; margin: 30px 0 !important">
              <img src="{{ asset($article->image_url) }}"  alt="" style="width: 100%; height: 100%"/>
            </div>

            <p class="text">
                {!! $article->{'content_' . app()->getLocale()} !!}
    
              </p>
          </div>
         

          <div class="head-section">
            <div class="text-content">
              <p>Research</p>
              <p>{{ $article->date_mask->format('F d,Y') }}</p>
            </div>
            <hr />
            <div class="link-logos">
              <div class="share">Share</div>
              <div class="sm-logos">
                <div class="sm-logo">
                  <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="sm-logo">
                  <i class="fa-brands fa-facebook-f"></i>
                </div>
                <div class="sm-logo">
                  <i class="fa-brands fa-youtube"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Activities end -->

      @endsection