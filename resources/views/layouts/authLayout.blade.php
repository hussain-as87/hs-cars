<!DOCTYPE html>
<html class="no-js" lang="{{ config('settings.locale') }}||{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}">
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
    @if(Session::get('them'))
    <link rel="stylesheet" href="{{ asset('assets/css/demo_'.Session::get('them').'/style.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}">
    @endif
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <style>
        .auth-page .auth-left-wrapper {
            width: 100%;
            height: 100%;
            background-image: url('{{asset('background images/ekmeds-photos-jsCC0c2sZTI-unsplash.jpg')}}');
            background-size: cover;
        }

        /* (A) FULL SCREEN WRAPPER */
        .sp {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 0.2s;
        }

        /* (B) CENTER LOADING SPINNER */
        .sp div {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        /* (C) SHOW & HIDE */

    </style>

    @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
    @endif
</head>
<body>
    <nav class="settings-sidebar">
        <div class="sidebar-body">
            <a href="#" class="settings-sidebar-toggler">
                <i data-feather="settings"></i>
            </a>
            <div class="theme-wrapper">
                <form action="{{ route('change.them.light') }}" method="post">
                    @csrf
                    <h6 class="text-muted mb-2">{{ __('Light Theme') }}:</h6>
                    <button type="submit" class="theme-item">
                        <img src="{{ asset('assets/images/screenshots/light.jpg') }}" alt="light theme">
                    </button>
                </form>
                <form action="{{ route('change.them.dark') }}" method="post">
                    @csrf
                    <h6 class="text-muted mb-2">{{ __('Dark Theme') }}:</h6>
                    <button type="submit" class="theme-item active">
                        <img src="{{ asset('assets/images/screenshots/dark.jpg') }}" alt="dark theme">
                    </button>
                </form>
            </div>

        </div>
    </nav>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="sp" id="spinner-wrapper">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                @yield('content')

            </div>
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="languagesDropdown" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ __(config('locales.languages')[app()->getLocale()]['name']) }} <span class="caret"></span><i class="flag-icon flag-icon-{{__(config('locales.languages')[app()->getLocale()]['icon'])}} mt-1" title="us"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="languagesDropdown">
                    @foreach(config('locales.languages') as $key => $val)
                    @if ($key != app()->getLocale())
                    <a href="{{ route('change.language', __($key)) }}" class="dropdown-item">{{ __($val['name'] )}} <i class="flag-icon flag-icon-{{__($val['icon'])}}" title="{{$key}}" id="{{$key}}"></i></a>
                    @endif
                    @endforeach
                </div>
            </li>
        </ul>
        <p class="text-muted text-center text-md-left">{{__('Copyright')}} © {{\Illuminate\Support\Carbon::now()->format('Y')}}
            {{__('All rights reserved')}}</p>
        <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">{{__('Handcrafted With')}} <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
    </footer>
        </div>
    </div>



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
    <script type="text/javascript">
        let spinnerWrapper = document.querySelector('#spinner-wrapper');

        window.addEventListener('load', function() {
            // spinnerWrapper.style.display = 'none';
            spinnerWrapper.parentElement.removeChild(spinnerWrapper);
        });

    </script>
</body>
</html>
