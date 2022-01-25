<!DOCTYPE html>
<html class="no-js" lang="{{ config('settings.locale') }}||{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_2/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}"/>
    <style>
        .auth-page .auth-left-wrapper {
            width: 100%;
            height: 100%;
            background-image: url('{{asset('background images/ekmeds-photos-jsCC0c2sZTI-unsplash.jpg')}}');
            background-size: cover;
        }
    </style>

    @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')


        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">


    @endif
</head>
<body>

<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">


            @yield('content')

        </div>
    </div>
</div>
<ul class="navbar-nav">

    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="languagesDropdown" data-toggle="dropdown"
           role="button" aria-expanded="false" aria-haspopup="true">
            {{ __(config('locales.languages')[app()->getLocale()]['name']) }} <span
                class="caret"></span><i
                class="flag-icon flag-icon-{{__(config('locales.languages')[app()->getLocale()]['icon'])}} mt-1"
                title="us"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="languagesDropdown">
            @foreach(config('locales.languages') as $key => $val)
                @if ($key != app()->getLocale())
                    <a href="{{ route('change.language', __($key)) }}"
                       class="dropdown-item">{{ __($val['name'] )}} <i class="flag-icon flag-icon-{{__($val['icon'])}}"
                                                                       title="{{$key}}" id="{{$key}}"></i></a>
                @endif
            @endforeach
        </div>
    </li>
</ul>
<!-- core:js -->
<script src="{{asset('assets/vendors/core/core.js')}}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<!-- endinject -->
<!-- custom js for this page -->
<!-- end custom js for this page -->
</body>
</html>
