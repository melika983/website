@if(\Illuminate\Support\Facades\Auth::check())
    {{--<div class="mb-2 text-center">--}}
    {{--    <a href="{{route('scan')}}" class="text-center btn btn-secondary w-50" style="border-radius: 20px">--}}
    {{--        <i class="bi bi-qr-code ms-2 me-2 "></i>--}}
    {{--        <span >اسکن کن</span >--}}
    {{--        </a>--}}
    {{--</div>--}}
@endif
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{env('SITE_URL')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{env('SITE_URL')}}/assets/vendor/php-email-form/validate.js"></script>
<script src="{{env('SITE_URL')}}/assets/vendor/aos/aos.js"></script>
<script src="{{env('SITE_URL')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{env('SITE_URL')}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{env('SITE_URL')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{env('SITE_URL')}}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="{{env('SITE_URL')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="{{env('SITE_URL')}}/assets/js/main.js"></script>
