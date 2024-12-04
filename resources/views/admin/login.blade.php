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
        src: url('assets/fonts/Kahroba.ttf') format('truetype');
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
    <form action="{{env('SITE_URL')}}/admin-login" method="POST" onsubmit="return register()">
        @csrf
        <h2 style="color: white;font-family: 'Kahroba', sans-serif;"> ورود به پنل کاربری </h2>
        <div class="input-field">
            <input style="text-align: right;font-family: 'Kahroba', sans-serif;color: rgb(255, 255, 255)"
                   type="text" value="" id="username" name="username" autocomplete="off"
                   placeholder="نام کاربر" required>
            <label></label>
        </div>
        <div class="input-field">
            <input style="text-align: right;font-family: 'Kahroba', sans-serif;color: white" type="password" minlength="3"
                   id="password" value="" name="password" autocomplete="off" placeholder="رمز عبور"
                   required>
        </div>
        <br>

        <button style="font-family: 'Kahroba', sans-serif;" type="submit" class="btn btn-secondary">
            ورود
        </button>

    </form>
</div>
{{-- @if (isset($showmodal) && $showmodal) --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 50%;border: 3px solid #999;border-radius: 5px" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"
                        style="width: 50px;background: transparent;border: 0px">
                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <form action="{{env('SITE_URL')}}/verify" method="POST" class="modal-body">
                @csrf

                <div class="input-field">
                    <input style="text-align: right;font-family: 'Kahroba', sans-serif;color: rgb(255, 255, 255)"
                           maxlength="6"
                           type="tel" id="pass" name="pass" autocomplete="off"
                           placeholder="کد یک بار مصرف">
                    <label></label>
                </div>

                <br>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-secondary"
                            style="margin-right: 35%;font-family: 'Kahroba', sans-serif;">
                        بزن بریم
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@if ($errors->has('pass'))
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="border: 3px solid red;border-radius: 5px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel"
                        style="text-align:right;font-family: 'Kahroba', sans-serif;">خطا</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="text-align:right;font-family: 'Kahroba', sans-serif;">
                    {{ $errors->first('pass') }} </div>
            </div>
        </div>
    </div>
@endif
</body>

</html>
<script>
    $(document).ready(function () {
        @if ($errors->has('pass'))
        $('#errorModal').modal('show');
        @endif

    });
</script>
