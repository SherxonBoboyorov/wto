@extends('layouts.front')

@section('content')

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">{{ $activitiy->{'title_' . app()->getLocale()} }}</p>
          <p class="text"><a href="{{ route('activities', ['id' => 1]) }}">Activities</a> - {{ $activitiy->{'title_' . app()->getLocale()} }}</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Activities start -->
      <div class="container">
        <div class="activities-post">
            
          <div class="head-section">
            <div class="text-content">
              {{ $activitiy->activitycategory->{'title_' . app()->getLocale()} }} <span>{{ date('Y-m-d',strtotime($activitiy->date_mask)) }}</span>
            </div>
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
            <p class="title">{{ $activitiy->{'title_' . app()->getLocale()} }}</p>
            <p class="text">
              {!! $activitiy->{'content_' . app()->getLocale()} !!}
            </p>
            <div class="img-content">
              <div class="col col-1">
                <img src="./../images/activities-1.jpg" alt="" />
              </div>
              <div class="col col-2">
                <img src="./../images/activities-1.jpg" alt="" />
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Activities end -->


@endsection