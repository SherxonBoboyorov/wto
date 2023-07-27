@extends('layouts.front')

@section('content')
      <!-- Main Block start -->

      <!-- Background Image start -->
      <div class="back-img">
        <img src="{{ asset('front/images/./../images/back-img.jpg') }}" alt="" />
        <div class="text-content">
          <p class="title">Contacts</p>
          <p class="text"><a href="{{ route('/') }}">Main</a> - Contacts</p>
        </div>
      </div>
      <!-- Background Image end -->

      <!-- Contacts start -->

    @include('alert')

      <div class="contacts">
        <div class="text-content">
          <div class="title">Our Contacts</div>
          <div class="row">
            <div class="col col-1">
              <p>
                <a href="./../about"
                  ><span>Phone number:</span> (+99871) 269-40-50
                </a>
              </p>
              <p>
                <a href="./../about"><span>Fax:</span> (+99871) 269-10-00 </a>
              </p>
              <p>
                <a href="./../about"><span>Email:</span> info@wto.uz </a>
              </p>
            </div>
            <div class="col col-2">
              <p>
                <a href="./../about"
                  ><span>Adress: </span>68 Sadik Azimov St., Tashkent city,
                  Uzbekistan
                </a>
              </p>
              <p>
                <a href="./../about"
                  ><span>Landmarks: </span>School #145, Dark Hall cafe,
                  Govermental Polyclinic
                </a>
              </p>
            </div>
          </div>


          <div class="title" style="margin-top: 40px !important">
            Contack us
          </div>

          <div class="form">
            <form action="{{ route('saveCallback') }}" method="POST">
              @csrf
              <div class="col">
                <input type="text" name="fullname" placeholder="Name" required/>
              </div>

              <div class="row">
                <div class="col">
                  <input type="text" name="email" placeholder="Email" required/>
                </div>
                <div class="col">
                  <input type="text" name="phone_number" placeholder="Phone number" required/>
                </div>
              </div>
              <div class="col">
                <textarea cols="30" rows="10" name="content" placeholder="Comment" required></textarea>
              </div>

              <button type="submit">SEND</button>
            </form>
          </div>

          <div class="title" style="margin-top: 60px !important">Map</div>
        </div>
      </div>

      <div class="map">
         <iframe
            src="https://yandex.uz/map-widget/v1/?azimuth=0.49958372318048605&ll=73.302678%2C49.852729&z=10.41"
            width="100%"
            height="100%"
            frameborder="0"
            allowfullscreen="true"
            style="position: relative"
          ></iframe>
      </div>

      <!-- Contacts end -->

  @endsection