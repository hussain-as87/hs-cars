@extends('home.layout.app')
@section('title','login')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_2.jpg')}});"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('login') }} <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">{{ __('login') }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
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
                                    {{--<span>{{__('Panel')}}</span>--}}</a>
                                <h5 class="text-muted font-weight-normal mb-4">{{__('Welcome back! Log in to your account.')}}</h5>
                                <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">{{ __('username') }}</label>
                                        <input type="text"
                                               class="form-control @error('username') is-invalid @enderror"
                                               id="exampleInputEmail1" name="username"
                                               value="{{ old('username') }}">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{__('Password')}}</label>
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" id="password"
                                               autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-check ">
                                        <input class="" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('login') }}
                                        </button>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <a href="{{route('register')}}"
                                       class="d-block mt-3 text-muted">{{__('Create a free account.')}}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
