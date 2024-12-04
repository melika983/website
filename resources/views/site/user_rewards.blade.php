<!DOCTYPE html>
<html lang="en">

<head>
    @include('links')
</head>

<body class="index-page">

@include('header')
<main class="main">
    <div class="container">
        @if($rewards==null || count($rewards)<=0)
            <h2 class="text-center">هنوز جایزه ای ندارید</h2>
        @else
            <section id="team" class="team section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2 style="font-size:28px">جایزه های شما</h2>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4">
                        @foreach($rewards as $reward)
                            <div class="col-12 d-flex align-items-stretch text-center" data-aos="fade-up"
                                 data-aos-delay="100">
                                <div class="team-member">
                                    <div class="member-img text-center ">
                                        <h1 style="font-size: 40px;color: blue;margin-top: 20px" class="bi bi-gift"></h1>

                                    </div>
                                    <div class="member-info">
                                        <h4>{{$reward->name}}</h4>
                                        <span dir="rtl">{!! $reward->description !!}</span>
                                    </div>
                                </div>
                            </div><!-- End Team Member -->
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
    <!-- Hero Section -->
    @include('footer')
    <!-- Scroll Top -->

</body>

</html>






