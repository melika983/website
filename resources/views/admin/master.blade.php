<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expo Admin</title>
    @include('admin.style')
    @yield('header-scripts')

</head>
<body>
<div class="container" id="main">


        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 text-right fs-3"
             style="width: 15%; position:fixed; right: 0;">
            <span class="fs-4">پنل مدیریت</span>


        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/admin" class="nav-link text-white {{url()->current()==url('admin') ? 'active' : '' }}" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    خانه
                </a>
            </li>
            <li>
                <a href="{{ route('Users') }}" class="nav-link text-white {{str_contains(url()->current(),'admin/Users') ? 'active' : '' }}">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#Users"></use>
                    </svg>

                    کاربران
                </a>
            </li>
            <li>

                <a href="{{ route('Company') }}" class="nav-link text-white {{str_contains(url()->current(),'admin/Company') ? 'active' : '' }}">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    شرکت ها
                </a>
            </li>
            <li>
                <a href="{{ route('Reward') }}" class="nav-link text-white {{str_contains(url()->current(),'admin/Reward') ? 'active' : '' }}">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    جوایز
                </a>
            </li>
            <li>
                <a href="{{ route('Exit') }}" class="nav-link text-white">
                    <svg class="bi bi-0-circle me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    خروج
                </a>
            </li>

        </ul>
        <hr>
    </div>

    @yield('content')
</div>
@yield('scripts')

@include('admin.script')

</body>
</html>
