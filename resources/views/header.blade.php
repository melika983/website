<header id="header" class="header d-flex align-items-center sticky-top">

    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('companies') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{env('SITE_URL')}}/assets/images/logo.png" alt="" style="width:10%;hight:100%;">
            <h1 class="sitename">GameFac</h1>
        </a>

{{--        <a class="btn-getstarted" href="{{ route('guide') }}">راهنما</a>--}}

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{env('SITE_URL')}}/user_rewards" class="active">جوایز شما<br></a></li>
{{--                <li><a href="{{env('SITE_URL')}}/companies" class="active">شرکتها<br></a></li>--}}
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
