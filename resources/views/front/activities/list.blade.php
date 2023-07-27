@extends('layouts.front')

@section('content')

      <!-- Main Block start -->

       <!-- Background Image start -->
       <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">@lang('front.activities')</p>
          <p class="text"><a href="{{ route('/') }}">@lang('front.home')</a> - @lang('front.activities')</p>
        </div>
      </div>
      <!-- Background Image end -->

  <!-- Activities start -->
  <div class="container">
    <div class="activities">
      <div class="btns">
        @foreach($activitiycategories as $activitycategory)
         <a href="{{ route('activities', ['id' => $activitycategory->id])}}">{{ $activitycategory->{'title_' . app()->getLocale()} }}</a>
        @endforeach 
      </div>

      <div class="row">
        @foreach($activities as $activity)
          
        <div class="col">
          <a href="{{ route('activitiy', $activity->id) }}">
            <img src="{{ asset($activity->image_url) }}" alt="" />
            <div class="text-content">
              <div class="date-content">
                <div class="type">{{ $activity->activitycategory->{'title_' . app()->getLocale()} }}</div>
                <div class="date">{{ date('Y-m-d',strtotime($activity->date_mask)) }}</div>
              </div>
              <p class="title">{{ $activity->{'title_' . app()->getLocale()} }}</p>
              <h6 class="description">
                {!! $activity->{'content_' . app()->getLocale()} !!}
              </h6>
            </div>
          </a>
        </div>
        @endforeach
      </div>
      <hr />
    </div>
  </div>


  {{ $activities->links("vendor.pagination.pagination")}}


  <!-- Activities end -->

    @endsection