    <!-- About the museum start -->
    @if(request()->route()->getName()!=='main'&&isset($breadcrumbs))
    <div class="about_museum" style="background-image:url({!!@asset('front/foto/about_fon.png')!!})">
        <section class="container">
            <div class="about_museum__cart">
                
                <h2 class="about__title__h2">@yield('title')</h2>

                <ul class="about_museum__menu">
                    @foreach ($breadcrumbs as $breadcrumb)
                    <li>
                        <a href="{{ isset($breadcrumb['link'])?url($breadcrumb['link']):'#' }}" class="about_museum__link">{{ $breadcrumb['name'] }}</a>
                    </li>
                    @endforeach
                </ul>

            </div>
        </section>
    </div>
    @endif
    <!-- About the museum end -->