<!DOCTYPE html>
<html lang="en">

<head>
    @include('links')
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

</head>
@include('header')

<body class="index-page">


<main class="main">
    <section id="learn" class="alt-services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item ">
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="details">

                            <p> تاس هارو از داخل غرفه ها پیدا کن</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item">
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="details">

                            <p>تاس هاتو بریز</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="service-item ">
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="details">

                            <p>جایزه برنده شو</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class=" text-center">
                    <a href="#qr" class="btn btn-secondary"
                       style="font-family: 'Kahroba', sans-serif;">بعدی</a>
                </div>
            </div>

        </div>

    </section><!-- /Alt Services Section -->
    <!-- Hero Section -->
    <section id="qr" class="">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <center><img src="{{env('SITE_URL')}}assets/images/cf70eedd445b8d6cb106646a0232f11e.png"
                                 class="img-fluid animated" alt=""></center>
                </div>

                {{-- <video id="camera" autoplay playsinline></video> --}}

                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <center>
                        <p class="Kahroba" style="color:black;font-family:'Kahroba', sans-serif;">
                            در قسمت ماموریت ها، محل پیدا کردن تاس ها برات مشخص شده. به اون محل ها برو و تاس هارو با اسکن کردن QR کد، بدست بیار.

                        </p>
                    </center>

                </div>

            </div>
        </div>
        <div class=" text-center">
            <a href="#features" class="btn btn-secondary"
               style="font-family: 'Kahroba', sans-serif;">بعدی</a>

        </div>

    </section><!-- /Hero Section -->

    <div style="height: 10vh;justify-content:center" ></div>
    {{--    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">--}}
    <div class="features-item text-center">
        <dotlottie-player src="https://lottie.host/344276ab-6cd2-4a97-a0d0-8a3a766aca63/ieFpMR7xvt.json" background="transparent" speed="0.5" style="width: 300px; height: 300px;margin-left:15%"  autoplay></dotlottie-player>
    </div>
    {{--    </div><!-- End Feature Item -->--}}

    <section id="features" class="features section">
        <center>
            <h2> حالا بهت یک شانس آموزشی میدیم تا روند کار رو بهتر درک کنید</h2>
        </center>

    </section><!-- /Features Section -->

    <!-- Alt Services Section -->

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <div class=" text-center">
                    <a href="{{ route('login') }}" class="btn btn-secondary"
                       style="font-family: 'Kahroba', sans-serif;">شروع </a>

                </div>

            </div>

        </div>
    </div>
    <br>
    <br>
@include('footer')

</body>

</html>

