<!DOCTYPE html>
<html lang="en">

<head>
    @include('links')
    <style>
        .Kahroba {
            font-family: "Kahroba", serif;
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Kahroba';
            src: url('assets/fonts/Kahroba.ttf') format('truetype'); /* برای مرورگرهای قدیمی */
            font-weight: normal;
            font-style: normal;
        }

        body {
            color: #ccc;
            font-family: 'Kahroba', sans-serif;
        }

        span {
            direction: rtl;
            font-family: 'Kahroba', sans-serif;
        }

        h1, h3, h2, h4 {
            direction: rtl;
            font-family: 'Kahroba', sans-serif;
            font-size: 16px;
            color: rgb(0, 0, 0);
            line-height: 28px;
        }

        p {
            direction: rtl;
            font-family: 'Kahroba', sans-serif;
            font-size: 16px;
            color: rgb(0, 0, 0);
            line-height: 28px;
        }

        .dk-footer {
            padding: 75px 0 0;
            background-color: #181857;
            position: relative;
            z-index: 2;
        }

        .footer-awarad p {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin-left: 20px;
            padding-top: 15px;
        }

        .footer-widget h3 {
            font-size: 24px;
            color: #fff;
            position: relative;
            margin-bottom: 15px;
            max-width: -webkit-fit-content;
            max-width: -moz-fit-content;
            max-width: fit-content;
        }

        .footer-widget p {
            margin-bottom: 27px;
        }

        .animate-border {
            position: relative;
            display: block;
            width: 115px;
            height: 3px;
            background: #007bff;
        }

        .animate-border:after {
            position: absolute;
            content: "";
            width: 35px;
            height: 3px;
            left: 0;
            bottom: 0;
            border-left: 10px solid #fff;
            border-right: 10px solid #fff;
            -webkit-animation: animborder 2s linear infinite;
            animation: animborder 2s linear infinite;
        }

        @-webkit-keyframes animborder {
            0% {
                -webkit-transform: translateX(0px);
                transform: translateX(0px);
            }
            100% {
                -webkit-transform: translateX(113px);
                transform: translateX(113px);
            }
        }

        @keyframes animborder {
            0% {
                -webkit-transform: translateX(0px);
                transform: translateX(0px);
            }
            100% {
                -webkit-transform: translateX(113px);
                transform: translateX(113px);
            }
        }

        .animate-border.border-white:after {
            border-color: #fff;
        }

        .animate-border.border-yellow:after {
            border-color: #F5B02E;
        }

        .animate-border.border-orange:after {
            border-right-color: #007bff;
            border-left-color: #007bff;
        }

        .animate-border.border-ash:after {
            border-right-color: #EEF0EF;
            border-left-color: #EEF0EF;
        }

        .animate-border.border-offwhite:after {
            border-right-color: #F7F9F8;
            border-left-color: #F7F9F8;
        }

        /* Animated heading border */
        @keyframes primary-short {
            0% {
                width: 15%;
            }
            50% {
                width: 90%;
            }
            100% {
                width: 10%;
            }
        }

        @keyframes primary-long {
            0% {
                width: 80%;
            }
            50% {
                width: 0%;
            }
            100% {
                width: 80%;
            }
        }

        .dk-footer {
            padding: 75px 0 0;
            background-color: #181857;
            position: relative;
            z-index: 2;
        }

        .dk-footer .contact-us {
            margin-top: 0;
            margin-bottom: 30px;
            padding-left: 80px;
        }

        .dk-footer .contact-us .contact-info {
            margin-left: 50px;
        }

        .dk-footer .contact-us.contact-us-last {
            margin-left: -80px;
        }

        .dk-footer .contact-icon i {
            font-size: 24px;
            top: -15px;
            position: relative;
            color: #007bff;
        }

        .dk-footer-box-info {
            position: absolute;
            top: -122px;
            background: #202020;
            padding: 40px;
            z-index: 2;
        }

        .dk-footer-box-info .footer-social-link h3 {
            color: #fff;
            font-size: 24px;
            margin-bottom: 25px;
        }

        .dk-footer-box-info .footer-social-link ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .dk-footer-box-info .footer-social-link li {
            display: inline-block;
        }

        .dk-footer-box-info .footer-social-link a i {
            display: block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            background: #000;
            margin-right: 5px;
            color: #fff;
        }

        .dk-footer-box-info .footer-social-link a i.fa-facebook {
            background-color: #3B5998;
        }

        .dk-footer-box-info .footer-social-link a i.fa-twitter {
            background-color: #55ACEE;
        }

        .dk-footer-box-info .footer-social-link a i.fa-google-plus {
            background-color: #DD4B39;
        }

        .dk-footer-box-info .footer-social-link a i.fa-linkedin {
            background-color: #0976B4;
        }

        .dk-footer-box-info .footer-social-link a i.fa-instagram {
            background-color: #B7242A;
        }

        .footer-awarad {
            margin-top: 285px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 100%;
            -moz-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .footer-awarad p {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin-left: 20px;
            padding-top: 15px;
        }

        .footer-info-text {
            margin: 26px 0 32px;
        }

        .footer-left-widget {
            padding-left: 80px;
        }

        .footer-widget .section-heading {
            margin-bottom: 35px;
        }

        .footer-widget h3 {
            font-size: 24px;
            color: #fff;
            position: relative;
            margin-bottom: 15px;
            max-width: -webkit-fit-content;
            max-width: -moz-fit-content;
            max-width: fit-content;
        }

        .footer-widget ul {
            width: 50%;
            float: left;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .footer-widget li {
            margin-bottom: 18px;
        }

        .footer-widget p {
            margin-bottom: 27px;
        }

        .footer-widget a {
            color: #878787;
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        .footer-widget a:hover {
            color: #007bff;
        }

        .footer-widget:after {
            content: "";
            display: block;
            clear: both;
        }

        .dk-footer-form {
            position: relative;
        }

        .dk-footer-form input[type=email] {
            padding: 14px 28px;
            border-radius: 50px;
            background: #2E2E2E;
            border: 1px solid #2E2E2E;
        }

        .dk-footer-form input::-webkit-input-placeholder, .dk-footer-form input::-moz-placeholder, .dk-footer-form input:-ms-input-placeholder, .dk-footer-form input::-ms-input-placeholder, .dk-footer-form input::-webkit-input-placeholder {
            color: #878787;
            font-size: 14px;
        }

        .dk-footer-form input::-webkit-input-placeholder, .dk-footer-form input::-moz-placeholder, .dk-footer-form input:-ms-input-placeholder, .dk-footer-form input::-ms-input-placeholder, .dk-footer-form input::placeholder {
            color: #878787;
            font-size: 14px;
        }

        .dk-footer-form button[type=submit] {
            position: absolute;
            top: 0;
            right: 0;
            padding: 12px 24px 12px 17px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border: 1px solid #007bff;
            background: #007bff;
            color: #fff;
        }

        .dk-footer-form button:hover {
            cursor: pointer;
        }

        /* ==========================

            Contact

        =============================*/
        .contact-us {
            position: relative;
            z-index: 2;
            margin-top: 65px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .contact-icon {
            position: absolute;
        }

        .contact-icon i {
            font-size: 36px;
            top: -5px;
            position: relative;
            color: #007bff;
        }

        .contact-info {
            margin-left: 75px;
            color: #fff;
        }

        .contact-info h3 {
            font-size: 20px;
            color: #fff;
            margin-bottom: 0;
        }

        .copyright {
            padding: 28px 0;
            margin-top: 55px;
            background-color: #202020;
        }

        .copyright span,
        .copyright a {
            color: #878787;
            -webkit-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .copyright a:hover {
            color: #007bff;
        }

        .copyright-menu ul {
            text-align: right;
            margin: 0;
        }

        .copyright-menu li {
            display: inline-block;
            padding-left: 20px;
        }

        .back-to-top {
            position: relative;
            z-index: 2;
        }

        .back-to-top .btn-dark {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            padding: 0;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #2e2e2e;
            border-color: #2e2e2e;
            display: none;
            z-index: 999;
            -webkit-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .back-to-top .btn-dark:hover {
            cursor: pointer;
            background: #FA6742;
            border-color: #FA6742;
        }
    </style>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script src="{{env('SITE_URL')}}assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

</head>

<body class="index-page">

@include('header')

<main class="main">
    <!-- Services Section -->
    <section id="services" class="services section p-0">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>تاس ها</h2>
            {{-- <p>    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p> --}}
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                @foreach($companies as $company)

                    <div class="col-xl-3 col-md-6 col-4 text-center p-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative" style="display: block">
                            {{--                            <i class="bi bi-building"></i>--}}
                            @if ($company->id == 1)
                                <img style="min-height: 75px" src="assets/img/wd.png" />
                            @endif
                            @if ($company->id == 2)
                                <img style="min-height: 60px" src="assets/img/gamefac.png" />
                            @endif
                            @if ($company->id == 3)
                                <img style="min-height: 75px" src="assets/img/gamedojo.png" />
                            @endif
                            <br />
                            <span class="text-center ">{{$company->name}}
                            </span>

                            @if($company->id==1)
                                <span id="example_dice_container">
                                <a class="btn btn-success mt-3" id="btnTarahan" href="#">
                                    <span class="bi bi-dice-6"></span>
                                    تاس رو بریز</a>
                                </span>
                            @else
                                @php
                                    $usr = \Illuminate\Support\Facades\Auth::user();
                                    if ($usr!=null){
                                        $usedCu = \App\Models\CompanyUser::query()
                                            ->where('company_id',$company->id)
                                            ->where('user_id',$usr->id)->first();
                                    }
                                @endphp
                                {{--                                @if(in_array($company->id,$user->company->pluck('id')->toArray()))--}}
                                @if(isset($usedCu) && $usedCu!=null)
                                    @if($usedCu->is_used)
                                        <label class="btn btn-secondary mt-3">
                                            <span class="bi bi-dice-6"></span>
                                            تاس رو ریختی</label>

                                    @else
                                        <button class="btn btn-success mt-3 dice" data-company-id="{{$company->id}}"
                                                type="button">
                                            <span class="bi bi-dice-6"></span>
                                            تاس رو بریز
                                        </button>
                                    @endif
                                @endif
                            @endif

                        </div>

                    </div><!-- End Service Item -->
                @endforeach
            </div>

        </div>

    </section><!-- /Services Section -->


    <!-- Features Section -->
    <section id="features" class="features section p-0 mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>ماموریت ها</h2>
            {{-- <p>    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p> --}}
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4" style="direction: rtl;">
                {{--                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">--}}
                {{--                    <div class="features-item">--}}
                {{--                        <i class="bi bi-mortarboard" style="color: #e80368;"></i>--}}

                {{--                        <h3><a href="#" class="stretched-link">عنوان ماموریت</a></h3>--}}

                {{--                    </div>--}}
                {{--                </div><!-- End Feature Item -->--}}

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="features-item">
                        <i class="bi bi-eye" style="color: #ffbb2c;"></i>

                        <h3><a href="#" class="stretched-link ">غرفه آکادمی گیم دوجو رو پیدا کن.</a></h3>


                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="features-item">
                        <i class="bi bi-infinity" style="color: #5578ff;"></i>

                        <h3><a href="#" class="stretched-link">غرفه گیم فک رو پیدا کن.</a></h3>

                    </div>
                </div><!-- End Feature Item -->

            </div>

        </div>

    </section><!-- /Features Section -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="background-color:white;margin-top: 50%;border: 3px solid #999;border-radius: 5px" role="document">
            <div class="modal-content" style="pointer-events:none">
                <div class="modal-header">

                    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"
                            style="width: 50px;background: transparent;border: 0px">
                        <span aria-hidden="true">×</span>

                    </button>

                </div>

                <form action="{{env('SITE_URL')}}/trow-dice" method="POST" class="modal-body">
                    @csrf

                    <div class="input-field">
                        <center>
                            <dotlottie-player
                                src="https://lottie.host/892fa47e-1c2c-4c8a-bbd9-581352068b7a/QRt9q6Zx3j.json"
                                background="transparent" speed="0.6" style="width: 100px; height: 100px;" loop
                                autoplay></dotlottie-player>
                        </center>
                        <p>این یک تاس آزمایشی بود حالا برو تاسهای دیگه رو شکار کن</p>

                    </div>
                    <br>
                    <div class="modal-footer text-center">
                        <a type="submit" class="btn btn-primary" href="{{env('SITE_URL')}}/scan"
                           style="font-family: 'Kahroba', sans-serif;margin-right: 30%;justify-content:center">
                            بزن بریم شکار</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="getRewardModal" tabindex="-1" role="dialog" aria-labelledby="getRewardModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="background-color:white;margin-top: 50%;border: 3px solid #999;border-radius: 5px" role="document">
            <div class="modal-content" style="pointer-events:none">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>

            </div>

            <form action="{{env('SITE_URL')}}/trow-dice" method="POST" class="modal-body">
                @csrf

                <div class="input-field text-center" id="dic-dic">
                    <div class="text-center">

                        <dotlottie-player src="https://lottie.host/321ac2a2-7edb-4371-9bca-389fecb81af1/kmW0IcXA0S.json"
                                          background="transparent" speed="1" style="width: 300px; height: 300px;" loop
                                          autoplay></dotlottie-player>

                    </div>
                </div>
                <div class="text-center d-none" id="reward-success">
                    <dotlottie-player src="https://lottie.host/e65e5516-60e7-454d-a823-accdb632154f/OMyxkPVNzy.json"
                                      background="transparent" speed="1" style="width: 300px; height: 300px;" loop
                                      autoplay></dotlottie-player>
                </div>

                <p id="reward-message" class="text-center"></p>
                <p id="p-wait" class="text-center text-secondary">کمی صبر کنید ...</p>
            </form>

        </div>
    </div>
    </div>

    <a href="{{route('about_us')}}" class="w-100 text-center justify-content-center d-inline-block">
        <img src="/assets/images/logo.png">
    </a>
    <!-- Testimonials Section -->

    @include('footer')
    <script>
        $(document).ready(function(){
            if (localStorage.getItem('example_dice') == '1') {
                $('#example_dice_container').html(`<label class="btn btn-secondary mt-3">
                    <span class="bi bi-dice-6"></span>
                تاس رو ریختی</label>`)
            }
        })
        $(".dice").on('click', function () {
            let _this = this;
            let companyId = $(this).attr('data-company-id');
            $("#reward-message").html('');

            $("#getRewardModal").modal('show');
            $("#dic-dic").show();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $("#reward-success").addClass('d-none');
            $("#p-wait").show(); // نمایش پیام در حال انتظار

            $.ajax({
                type: 'POST',
                data: {
                    companyId: companyId
                },
                url: '{{env('SITE_URL').'/random-reward'}}',
                success: function (data) {
                    $(_this).prop('disabled', true).removeClass('btn-success').addClass('btn-secondary');

                    // تأخیر قبل از نمایش نتیجه
                    setTimeout(function () {
                        $("#p-wait").hide(); // مخفی کردن پیام در حال انتظار

                        if (data.success) {
                            $("#reward-success").removeClass('d-none');
                        } else {
                            // در صورت عدم موفقیت، می‌توانید پیام دیگری نمایش دهید
                        }
                        $("#dic-dic").hide();
                        $("#reward-message").html(data.message);
                    }, 2000); // 2000 میلی‌ثانیه = 2 ثانیه
                }
            });
        });

        $("#btnTarahan").on('click', function () {
            $("#exampleModal").modal('show');
            localStorage.setItem('example_dice', '1');
        });
    </script>


</body>

</html>
