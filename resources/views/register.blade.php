<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GameFac</title>
    <link rel="stylesheet" type="text/css" href="{{env('SITE_URL')}}/assets/css/home.css">
    <link rel="stylesheet" href="{{env('SITE_URL')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/home.css') }}">
    <link href="{{env('SITE_URL')}}/assets/img/favicon.png" rel="icon">
    <link href="{{env('SITE_URL')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="{{env('SITE_URL')}}/assets/fonts/Kahroba.ttf" rel="stylesheet">

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script src="{{env('SITE_URL')}}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{env('SITE_URL')}}/assets/js/popper.min.js"></script>
    <script src="{{env('SITE_URL')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{env('SITE_URL')}}/assets/js/popper.js"></script>

</head>
<style>
    .Kahroba {
        font-family: "Kahroba", serif;
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'Kahroba';
        src:
            url('assets/fonts/Kahroba.ttf') format('truetype');
        /* برای مرورگرهای قدیمی */
        font-weight: normal;
        font-style: normal;
    }

    body {
        color: #ccc;
        font-family: 'Kahroba', sans-serif;
    }

    h1,
    h3,
    h2,
    h4 {
        font-family: 'Kahroba', sans-serif;
        font-size: 16px;
        color: rgb(0, 0, 0);
        line-height: 28px;
    }

    p {
        font-family: 'Kahroba', sans-serif;
        font-size: 16px;
        color: white;
        line-height: 28px;
    }
</style>

<body>
    @if ($errors->any())
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div id="reg" class="wrapper" style="display: block;">
        <form action="{{env('SITE_URL')}}/register" method="POST" onsubmit="return register()">
            @csrf

            <h2 style="color: white;font-family: 'Kahroba', sans-serif;"> ورود </h2>
            <center> <dotlottie-player src="https://lottie.host/892fa47e-1c2c-4c8a-bbd9-581352068b7a/QRt9q6Zx3j.json"
                    background="transparent" speed="0.6" style="width: 100px; height: 100px;" loop
                    autoplay></dotlottie-player>
            </center>
            <div class="input-field">
                <input style="text-align: right;font-family: 'Kahroba', sans-serif;color: rgb(255, 255, 255)"
                    type="text" id="fullname" name="fullname" autocomplete="off"
                    placeholder="نام و نام خانوادگی خود را وارد کنید">
                <label></label>
            </div>
            <div class="input-field">
                <input style="text-align: right;font-family: 'Kahroba', sans-serif;color: white" type="tel" minlength="10" maxlength="14"
                    id="phone" name="phone" autocomplete="off" placeholder="شماره همراه خود را وارد کنید"
                    required>
            </div>
            <br>

            <button id="submitBtn" style="font-family: 'Kahroba', sans-serif;" type="button" class="btn btn-secondary"
                data-toggle="modal" data-target="#exampleModal" data-url="{{env('SITE_URL')}}/register">
                دریافت کد</button>

        </form>
    </div>
    {{-- @if (isset($showmodal) && $showmodal) --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 50%;border: 3px solid #999;border-radius: 5px" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close" style="width: 50px;background: transparent;border: 0px">
                        <span aria-hidden="true">×</span>

                    </button>

                </div>

                <form action="{{env('SITE_URL')}}/verify" method="POST" class="modal-body">
                    @csrf

                    <div class="input-field">
                        <input style="text-align: right;font-family: 'Kahroba', sans-serif;color: rgb(255, 255, 255)" maxlength="6"
                               type="tel" id="pass" name="pass" autocomplete="off"
                               placeholder="کد یک بار مصرف">
                        <label></label>
                    </div>

                    <br>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-secondary" style="margin-right: 35%;font-family: 'Kahroba', sans-serif;">
                            بزن بریم</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @if ($errors->has('pass'))
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog"  style="margin-top: 60%;border: 3px solid red;border-radius: 5px" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel"
                            style="text-align:right;font-family: 'Kahroba', sans-serif;">خطا</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body" style="text-align:right;font-family: 'Kahroba', sans-serif;">
                        {{ $errors->first('pass') }} </div>
                </div>
            </div>
        </div>
    @endif
    </div>
</body>

</html>
<script>
         $(document).ready(function() {
        @if ($errors->has('pass'))
            $('#errorModal').modal('show');
        @endif
        $('#submitBtn').on('click', function() {
            const phoneInput = $('#phone').val().trim();
            const fullnameInput = $('#fullname').val().trim();
            const registerUrl = $(this).data('url');
            if (phoneInput && fullnameInput) {


                $.ajax({
                    url: registerUrl, // Use the URL from the route
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                        fullname: fullnameInput,
                        phone: phoneInput
                    },
                    success: function(response) {
                        $('#phone').val('');
                        $('#fullname').val('');

                        // Hide the registration form and show the modal
                        //$('#reg').hide();
                        //$('#modal').show();
                    }
                });
            } else {
                alert("لطفاً نام و شماره را وارد کنید.");
                return false;
            }
        });
    });
 </script>
