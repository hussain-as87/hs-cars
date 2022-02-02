<!DOCTYPE html>
<!--
Template Name: NobleUI - Admin & Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: You must have a valid license purchased only from above link or https://themeforest.net/user/nobleui/portfolio/ in order to legally use the theme for your project.
-->
<html class="no-js" lang="{{ config('settings.locale') }}||{{ str_replace('_', '-', app()->getLocale()) }}" {{--  dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}" --}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @livewireStyles

    {{-- @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')


    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">

    @endif --}}

    @if(Session::get('them'))
    <link rel="stylesheet" href="{{ asset('assets/css/demo_'.Session::get('them').'/style.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}">
    @endisset


    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    {{-- <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_2/tailwind.css')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- End layout tailwind --> --}}
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('MaterialDesign-Webfont-master/css/materialdesignicons.min.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">

    <style>
        .card-down {
            position: absolute;
            top: 65px;
        }

        .nobu {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }

        .video-fluid {
            width: 100%;
            height: auto;
        }

    </style>

</head>
<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('Admin.layout.sections._sidebar')
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
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('Admin.layout.sections._navbar')
            <!-- partial -->

            <div class="page-content" style="width: 100%;">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">@yield('title-page')</h4>
                    </div>
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                            <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                            <input type="text" class="form-control text-secondary" style="height:36px;padding:2px;text-align:center">
                        </div>
                        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="">
                            <span class="input-group-addon bg-transparent"><i data-feather="clock" class="text-primary"></i></span>
                            <div class="text-secondary" id="__time"></div>
                        </div>
                        {{-- <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
                            <i class="btn-icon-prepend" data-feather="download"></i>
                            Import
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="printer"></i>
                            Print
                        </button>
                        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                            Download Report
                        </button>  --}}
                    </div>
                </div>
                @include('Admin.layout.sections.__alert')


                @yield('content')

            </div>

            <!-- partial:partials/_footer.html -->
            @include('Admin.layout.sections._footer')
            <!-- partial -->

        </div>
    </div>
    @livewireScripts
    {{-- <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };

    </script> --}}
    {{-- <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#createModal').modal('hide');
            $('#updateModal').modal('hide');
            $('#updatecomment_*').modal('hide');
        });

    </script> --}}
    @stack('scripts')
    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <!-- end custom js for this page -->
    <script type="text/javascript">
        function showTime() {
            var date = new Date()
                , t = new Date(Date(
                    date.getFullYear()
                    , date.getMonth()
                    , date.getDate()
                    , date.getHours()
                    , date.getMinutes()
                    , date.getSeconds()
                ));

            document.getElementById('__time').innerHTML = t.toLocaleTimeString();
        }

        setInterval(showTime, 1000);

    </script>
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>

</body>
</html>
