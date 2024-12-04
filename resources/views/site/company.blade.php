<!DOCTYPE html>
<html lang="en">

<head>
    @include('links')
</head>

<body class="index-page">

@include('header')
<main class="main">
    <div class="container">
    <div class="testimonial-wrap">
        {!! $company->description !!}
        <div class="text-center">
            <a class="btn btn-primary" href="{{env('SITE_URL').'/companies'}}">
                <i class="bi bi-star"></i>
                شروع بازی</a>
        </div>
    </div>
    </div>
    <!-- Hero Section -->
    <!-- Scroll Top -->

</body>

</html>
