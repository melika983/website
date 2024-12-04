<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>GameFac</title>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/fonts/Kahroba.ttf" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>
<style>
    .Kahroba {
            font-family: "Kahroba", serif;
            font-weight: 400;
            font-style: normal;
            }
    @font-face { font-family: 'Kahroba';
    src:
    url('assets/fonts/Kahroba.ttf') format('truetype'); /* برای مرورگرهای قدیمی */
    font-weight: normal;
    font-style: normal; }

     body { color: #ccc;
         font-family: 'Kahroba', sans-serif;
    }
    h1,h3,h2,h4 {
    direction: rtl;
    font-family: 'Kahroba', sans-serif;
    font-size: 16px;
    color:rgb(0, 0, 0);
    line-height: 28px;
    }
    p {
        direction: rtl;
        font-family: 'Kahroba', sans-serif;
        font-size: 16px;
        color:white;
        line-height: 28px;
    }
    .footer-widget p {
        margin-bottom: 27px;
    }
    .animate-border {
    position: relative;
    display: block;
    width: 115px;
    height: 3px;
    background: #007bff; }

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
    animation: animborder 2s linear infinite; }

    @-webkit-keyframes animborder {
    0% {
        -webkit-transform: translateX(0px);
        transform: translateX(0px); }
    100% {
        -webkit-transform: translateX(113px);
        transform: translateX(113px); } }

    @keyframes animborder {
    0% {
        -webkit-transform: translateX(0px);
        transform: translateX(0px); }
    100% {
        -webkit-transform: translateX(113px);
        transform: translateX(113px); } }

    .animate-border.border-white:after {
    border-color: #fff; }

    .animate-border.border-yellow:after {
    border-color: #F5B02E; }

    .animate-border.border-orange:after {
    border-right-color: #007bff;
    border-left-color: #007bff; }

    .animate-border.border-ash:after {
    border-right-color: #EEF0EF;
    border-left-color: #EEF0EF; }

    .animate-border.border-offwhite:after {
    border-right-color: #F7F9F8;
    border-left-color: #F7F9F8; }

    /* Animated heading border */
    @keyframes primary-short {
    0% {
        width: 15%; }
    50% {
        width: 90%; }
    100% {
        width: 10%; } }

    @keyframes primary-long {
    0% {
        width: 80%; }
    50% {
        width: 0%; }
    100% {
        width: 80%; } }

    .dk-footer {
    padding: 75px 0 0;
    background-color: #181857;
    position: relative;
    z-index: 2; }
  .dk-footer .contact-us {
    margin-top: 0;
    margin-bottom: 30px;
    padding-left: 80px; }
    .dk-footer .contact-us .contact-info {
      margin-left: 50px; }
    .dk-footer .contact-us.contact-us-last {
      margin-left: -80px; }
  .dk-footer .contact-icon i {
    font-size: 24px;
    top: -15px;
    position: relative;
    color:#007bff; }

    .dk-footer-box-info {
    position: absolute;
    top: -122px;
    background: #202020;
    padding: 40px;
    z-index: 2; }
  .dk-footer-box-info .footer-social-link h3 {
    color: #fff;
    font-size: 24px;
    margin-bottom: 25px; }
  .dk-footer-box-info .footer-social-link ul {
    list-style-type: none;
    padding: 0;
    margin: 0; }
  .dk-footer-box-info .footer-social-link li {
    display: inline-block; }
  .dk-footer-box-info .footer-social-link a i {
    display: block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
    background: #000;
    margin-right: 5px;
    color: #fff; }
    .dk-footer-box-info .footer-social-link a i.fa-facebook {
      background-color: #3B5998; }
    .dk-footer-box-info .footer-social-link a i.fa-twitter {
      background-color: #55ACEE; }
    .dk-footer-box-info .footer-social-link a i.fa-google-plus {
      background-color: #DD4B39; }
    .dk-footer-box-info .footer-social-link a i.fa-linkedin {
      background-color: #0976B4; }
    .dk-footer-box-info .footer-social-link a i.fa-instagram {
      background-color: #B7242A; }

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
    align-items: center; }
    .footer-awarad p {
        color: #fff;
        font-size: 24px;
        font-weight: 700;
        margin-left: 20px;
        padding-top: 15px; }

    .footer-info-text {
    margin: 26px 0 32px; }

    .footer-left-widget {
    padding-left: 80px; }

    .footer-widget .section-heading {
    margin-bottom: 35px; }

    .footer-widget h3 {
    font-size: 24px;
    color: #fff;
    position: relative;
    margin-bottom: 15px;
    max-width: -webkit-fit-content;
    max-width: -moz-fit-content;
    max-width: fit-content; }

    .footer-widget ul {
    width: 50%;
    float: left;
    list-style: none;
    margin: 0;
    padding: 0; }

    .footer-widget li {
    margin-bottom: 18px; }

    .footer-widget p {
    margin-bottom: 27px; }

    .footer-widget a {
    color: #878787;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s; }
    .footer-widget a:hover {
        color: #007bff; }

    .footer-widget:after {
    content: "";
    display: block;
    clear: both; }

    .dk-footer-form {
    position: relative; }
    .dk-footer-form input[type=email] {
        padding: 14px 28px;
        border-radius: 50px;
        background: #2E2E2E;
        border: 1px solid #2E2E2E; }
    .dk-footer-form input::-webkit-input-placeholder, .dk-footer-form input::-moz-placeholder, .dk-footer-form input:-ms-input-placeholder, .dk-footer-form input::-ms-input-placeholder, .dk-footer-form input::-webkit-input-placeholder {
        color: #878787;
        font-size: 14px; }
    .dk-footer-form input::-webkit-input-placeholder, .dk-footer-form input::-moz-placeholder, .dk-footer-form input:-ms-input-placeholder, .dk-footer-form input::-ms-input-placeholder, .dk-footer-form input::placeholder {
        color: #878787;
        font-size: 14px; }
    .dk-footer-form button[type=submit] {
        position: absolute;
        top: 0;
        right: 0;
        padding: 12px 24px 12px 17px;
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
        border: 1px solid #007bff;
        background: #007bff;
        color: #fff; }
    .dk-footer-form button:hover {
        cursor: pointer; }

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
    align-items: center; }

    .contact-icon {
    position: absolute; }
    .contact-icon i {
        font-size: 36px;
        top: -5px;
        position: relative;
        color: #007bff; }

    .contact-info {
    margin-left: 75px;
    color: #fff; }
    .contact-info h3 {
        font-size: 20px;
        color: #fff;
        margin-bottom: 0; }

    .copyright {
    padding: 28px 0;
    margin-top: 55px;
    background-color: #202020; }
    .copyright span,
    .copyright a {
        color: #878787;
        -webkit-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
        transition: all 0.3s linear; }
    .copyright a:hover {
        color:#007bff; }

    .copyright-menu ul {
    text-align: right;
    margin: 0; }

    .copyright-menu li {
    display: inline-block;
    padding-left: 20px; }

    .back-to-top {
    position: relative;
    z-index: 2; }
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
        transition: all 0.3s linear; }
        .back-to-top .btn-dark:hover {
        cursor: pointer;
        background: #FA6742;
        border-color: #FA6742; }



        /** Simple Reset - START */
    html {
    box-sizing: border-box;
    font-size: 16px;
    overflow-x: hidden;
    }

    *,
    *:before,
    *:after {
    box-sizing: inherit;
    }


    img {
    max-width: 100%;
    height: auto;
    }

    /** Animating - START */
    @keyframes moving {
    0%,
    5% {
        left: 0;
        background-color: #039be5;
    }
    95%,
    100% {
        left: calc(100% - 3rem);
        background-color: #84d6fd;
    }
    }

    @keyframes box-2-anim {
    0% {
        transform: scale(1, 1) rotate(0deg);
        bottom: 0;
    }
    5% {
        bottom: 3rem;
    }
    15% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    17.001% {
        bottom: 0;
        transform: translate(0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(-180deg);
    }
    25% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    66% {
        transform: scale(1, 1) rotate(-180deg);
        bottom: 0;
    }
    71% {
        bottom: 3rem;
    }
    81% {
        bottom: 0;
        transform: scale(1, 1) rotate(0deg);
    }
    83.001% {
        bottom: 0;
        transform: translate(-0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(0deg);
    }
    91% {
        transform: scale(1, 1) rotate(0deg);
    }
    100% {
        transform: scale(1, 1) rotate(0deg);
    }
    }

    @keyframes box-3-anim {
    0% {
        transform: scale(1, 1) rotate(0deg);
        bottom: 0;
    }
    5% {
        bottom: 3rem;
    }
    15% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    17.001% {
        bottom: 0;
        transform: translate(0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(-180deg);
    }
    25% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    56% {
        transform: scale(1, 1) rotate(-180deg);
        bottom: 0;
    }
    61% {
        bottom: 3rem;
    }
    71% {
        bottom: 0;
        transform: scale(1, 1) rotate(0deg);
    }
    73.001% {
        bottom: 0;
        transform: translate(-0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(0deg);
    }
    81% {
        transform: scale(1, 1) rotate(0deg);
    }
    100% {
        transform: scale(1, 1) rotate(0deg);
    }
    }

    @keyframes box-4-anim {
    0% {
        transform: scale(1, 1) rotate(0deg);
        bottom: 0;
    }
    5% {
        bottom: 3rem;
    }
    15% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    17.001% {
        bottom: 0;
        transform: translate(0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(-180deg);
    }
    25% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    45% {
        transform: scale(1, 1) rotate(-180deg);
        bottom: 0;
    }
    50% {
        bottom: 3rem;
    }
    60% {
        bottom: 0;
        transform: scale(1, 1) rotate(0deg);
    }
    62.001% {
        bottom: 0;
        transform: translate(-0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(0deg);
    }
    70% {
        transform: scale(1, 1) rotate(0deg);
    }
    100% {
        transform: scale(1, 1) rotate(0deg);
    }
    }

    @keyframes box-5-anim {
    0% {
        transform: scale(1, 1) rotate(0deg);
        bottom: 0;
    }
    5% {
        bottom: 3rem;
    }
    15% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    17.001% {
        bottom: 0;
        transform: translate(0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(-180deg);
    }
    25% {
        bottom: 0;
        transform: scale(1, 1) rotate(-180deg);
    }
    33% {
        transform: scale(1, 1) rotate(-180deg);
        bottom: 0;
    }
    38% {
        bottom: 3rem;
    }
    48% {
        bottom: 0;
        transform: scale(1, 1) rotate(0deg);
    }
    50.001% {
        bottom: 0;
        transform: translate(-0.9rem, 0.6rem) scale(1.3, 0.6) translateY(0px)
        rotate(0deg);
    }
    58% {
        transform: scale(1, 1) rotate(0deg);
    }
    100% {
        transform: scale(1, 1) rotate(0deg);
    }
    }

    .loading-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    }

    .box-loading {
    width: 21rem;
    height: 3rem;
    position: relative;
    margin: 0 auto;
    }

    .box-loading > .box {
    position: absolute;
    width: 3rem;
    height: 3rem;
    border-radius: 0.6rem;
    background-color: #007bff;
    transform-origin: -0.75rem 1.5rem;
    box-shadow: 0 0 6px 2px rgba(40, 139, 171, 0.15);
    }

    .box-loading > .box:nth-child(1) {
    left: 0rem;
    background-color: #06abfc;
    }

    .box-loading > .box:nth-child(2) {
    left: 4.5rem;
    background-color: #1fb4fc;
    animation: box-2-anim 2s infinite linear;
    animation-delay: 0.22s;
    }

    .box-loading > .box:nth-child(3) {
    left: 9rem;
    background-color: #38bcfc;
    animation: box-3-anim 2s infinite linear;
    animation-delay: 0.33s;
    }

    .box-loading > .box:nth-child(4) {
    left: 13.5rem;
    background-color: #51c5fd;
    animation: box-4-anim 2s infinite linear;
    animation-delay: 0.44s;
    }

    .box-loading > .box:nth-child(5) {
    left: 18rem;
    background-color: #6acdfd;
    animation: box-5-anim 2s infinite linear;
    animation-delay: 0.55s;
    }

    .box-loading > .box:nth-child(1) {
    background-color: #039be5;
    animation: moving 1s infinite cubic-bezier(0.6, 0, 0.4, 1) alternate;
    }

</style>



<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">

    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('main') }}" class="logo d-flex align-items-center me-auto">
        <img src="assets/images/logo.png" alt="" style="width:10%;hight:100%;">
        <h1 class="sitename">GameFac</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('guide') }}">راهنما</a>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">

            <center>

                @if(Auth::check())
               <h2>👋  {{Auth::user()->fullname}}   به رویداد تاس خوش آمدید </h2>
                   @else
                   <script>
                    window.location.href = "{{ route('login')}}"; // Redirect to login page
                </script>
                @endif
            </center>
            <div class="loading-container">
                <div class="box-loading">
                  <div class="box"></div>
                  <div class="box"></div>
                  <div class="box"></div>
                  <div class="box"></div>
                  <div class="box"></div>
                </div>
              </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->



    <!-- Alt Services Section -->


    <br>
    <br>
    <footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">
                                 <center>
                                <div class="section-heading">
                                   <h3 >شرکت طراحان سفید</h3>
                                    <span class="animate-border border-black"></span>
                                </div></center>
                                <p style="direction: rtl;">
                                شرکت طراحان سفید با سابقه‌ی بیش از ده سال در حوزه بازی‌های دیجیتال، انیمیشن، هویت بصری و صنایع خلاق تخصص دارد و یکی از شرکتهای قدیمی و فعال کشور در حوزه بازی‌های رایانه‌ای است.
                                این شرکت متشکل از افراد متخصص، با تجربه و خلاق در قالب شرکت‌های زیرمجموعه، دپارتمان‌ها و استودیوهای تخصصی، در جمع شرکت‌های برتر کشور در حوزه صنایع خلاق رده‌بندی می‌شود. رویکرد ما استفاده از فناوری‌های روز دنیا در راه ارایه خدمات و محصولاتی متفاوت و برتر به کاربران داخلی و بین‌المللی است</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></s>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
