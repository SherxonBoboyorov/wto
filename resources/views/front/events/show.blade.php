@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">{{ $event->{'title_' . app()->getLocale()} }}</p>
          <p class="text"><a href="{{ route('events') }}">Events</a> - {{ $event->{'title_' . app()->getLocale()} }}</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Activities start -->
      <div class="container">
        <div class="events-post">
          <div class="video-section">
            <div class="video-box">
              <img src="{{ asset($event->image_url) }}" alt="" />
              <div class="play video-play"><i class="fa-solid fa-play"></i></div>
              <video controls frameborder="0" >
                <source src="{{ asset($event->video_url) }}" type="video/mp4">
              </video>
              <div class="close close-video"><i class="fa-solid fa-xmark"></i></div>
            </div>
          </div>

          <div class="head-section">
            <div class="text-content">{{ date('Y-m-d',strtotime($event->date_mask)) }}</div>
            <div class="link-logos">
              <div class="share">Share</div>
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
          <div class="row">
            <p class="title">{{ $event->{'title_' . app()->getLocale()} }}</p>
            <p class="text">
                {!! $event->{'content_' . app()->getLocale()} !!}
            </p>
          </div>
        </div>
      </div>

      <!-- Activities end -->

   @endsection