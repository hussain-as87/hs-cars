<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>500</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    @if(Session::get('them'))
    <link rel="stylesheet" href="{{ asset('assets/css/demo_'.Session::get('them').'/style.css') }}">
    @elseif(config('settings.them') == 'dark')
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}">
    @elseif(config('settings.them') == 'light')
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    @endif
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                        <img src="../../../assets/images/404.svg" class="img-fluid mb-2" alt="404">
                        <h1 class="font-weight-bold mb-22 mt-2 tx-80 text-muted">500</h1>
                        <h4 class="mb-2">{{ __('Internal server error') }}</h4>
                        <h6 class="text-muted mb-3 text-center">{{ __('Oopps!! There wan an error. Please try agin later') }}</h6>
                        <a href="@if(session('direction'))
                        {{ route(session('direction')) }}
                        @else
                        {{ route('home') }}
                        @endif" class="btn btn-primary">{{ __('Go Back') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <!-- end custom js for this page -->
</body>
</html>
