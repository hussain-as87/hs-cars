@extends('home.layout.app')
@section('title','Verify Your Email Address')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_2.jpg')}});"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('Verify Your Email Address') }} <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">{{ __('Verify Your Email Address') }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                                .
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
