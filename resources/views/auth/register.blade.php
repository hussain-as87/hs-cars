@extends('home.layout.app')
@section('title','Register')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_2.jpg')}});"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('Register') }} <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">{{ __('Register') }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-10 col-xl-6 mx-auto">
                <div class="card login-border">
                    <div class="row">
                        <div class="col-md-4 pr-md-0">
                            <div class="auth-left-wrapper">
                            </div>
                        </div>
                        <div class="col-md-8 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#"
                                   class="noble-ui-logo logo-light d-block mb-2">{{__(config('settings.website_name'))}}
                                    {{--  <span>{{__('Panel')}}</span>  --}}</a>
                                <h5 class="text-muted font-weight-normal mb-4">{{__('Create a free account.')}}</h5>
                                {{----}}
                                <form class="forms-sample" method="POST" action="{{ route('register') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="name">{{ __('name') }}</label>
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
                                                       value="{{ old('name') }}"
                                                       required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="username">{{__('username')}}</label>
                                                <input id="username" type="text"
                                                       class="form-control @error('username') border-danger is-invalid @enderror"
                                                       name="username" value="{{ old('username') }}" required
                                                       autocomplete="username">
                                                @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div><!-- Row -->


                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required
                                                       autocomplete="new-password">

                                            </div>
                                        </div>
                                    </div><!-- Row -->


                                    <div class="mt-3 py-2">
                                        <button
                                            class="btn btn-primary text-white mr-2 mb-2 mb-md-0">  {{ __('Register') }}</button>
                                    </div>
                                    <a href="{{route('login')}}"
                                       class="d-block mt-3 text-muted">{{__('Already a user? Sign in')}}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
