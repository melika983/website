<!DOCTYPE html>
<html lang="en">

<head>
    @include('links')
</head>

<body class="index-page">

@include('header')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <center>

                        @if(Auth::check())
                            <h2>👋 {{Auth::user()->fullname}} به رویداد تاس خوش آمدید </h2>
                        @else
                            <h2>مهمان عزیز، به رویداد شکار تاس خوش آمدید.</h2>
                            {{--                            <button class="btn btn-outline-primary"--}}
                            {{--                                    onclick="window.location.href='{{ route('login')}}';">ثبت نام--}}
                            {{--                            </button>--}}

                        @endif
                        {{--                        <p>حلقه اصلی تاس و روند بازی رو به درستی مطالعه کنید</p>--}}
                    </center>

                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img text-center">
                    <img src="{{env('SITE_URL')}}/assets/images/logo.png" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->


    <!-- Alt Services Section -->
    {{--    <section id="alt-services" class="alt-services section">--}}

    {{--        <div class="container" data-aos="fade-up" data-aos-delay="100">--}}

    {{--            <div class="row gy-4">--}}

    {{--                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">--}}
    {{--                    <div class="service-item position-relative">--}}
    {{--                        <div class="img">--}}
    {{--                            <img src="{{env('SITE_URL')}}/assets/images/11 (1).jpg" class="img-fluid" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="details">--}}
    {{--                            <a href="{{ route('main') }}" class="stretched-link">--}}
    {{--                            </a>--}}
    {{--                            <p> تاس هارو از داخل غرفه ها پیدا کنم</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div><!-- End Service Item -->--}}

    {{--                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">--}}
    {{--                    <div class="service-item position-relative">--}}
    {{--                        <div class="img">--}}
    {{--                            <img src="{{env('SITE_URL')}}/assets/images/11 (3).jpg" class="img-fluid" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="details">--}}
    {{--                            <a href="{{ route('main') }}" class="stretched-link">--}}
    {{--                            </a>--}}
    {{--                            <p>تاس هاتو بریز</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div><!-- End Service Item -->--}}

    {{--                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">--}}
    {{--                    <div class="service-item position-relative">--}}
    {{--                        <div class="img">--}}
    {{--                            <img src="{{env('SITE_URL')}}/assets/images/22.jpg" class="img-fluid" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="details">--}}
    {{--                            <a href="{{ route('main') }}" class="stretched-link">--}}
    {{--                            </a>--}}
    {{--                            <p>جایزه برنده شو</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div><!-- End Service Item -->--}}


    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </section><!-- /Alt Services Section -->--}}
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <div class=" text-center">
                        <a href="{{ route('help') }}" class="btn btn-secondary"
                           style="font-family: 'Kahroba', sans-serif;">بعدی</a>

                    </div>
                @endif
            </div>

        </div>
    </div>
    <br>
    <br>

    <div class="mb-2 text-center">
        <a href="{{route('companies')}}" class="text-center btn btn-secondary w-50" style="border-radius: 20px">
            <span >ادامه</span >
        </a>
    </div>

    @include('footer')
    <!-- Scroll Top -->

</body>

</html>
