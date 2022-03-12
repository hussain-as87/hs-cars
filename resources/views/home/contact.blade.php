@extends('home.layout.app')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('contact') }} <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">{{ __('contact us') }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>{{ __('Address') }}:</span> {{ config('settings.address') }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>{{ __('phone') }}:</span> <a href="tel://{{ config('settings.webiste_phone') }}">+ {{ config('settings.webiste_phone') }}</a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>{{ __('email') }}:</span> <a href="{{ config('settings.webiste_email') }}">{{ config('settings.webiste_email') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form action="{{ route('home.contacts.store') }}" method="POST" class="bg-light p-5 contact-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{ __('enter your name') }}" name="name" value="{{ old('name') }}">
                        @error('name')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{ __('enter your email') }}" name="email" value="{{ old('email') }}">
                        @error('email')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{ __('Subject') }}" name="subject" value="{{ old('subject') }}">
                        @error('subject')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="7" class="form-control" placeholder="{{ __('Message') }}" name="message">{{ old('message') }}</textarea>
                        @error('message')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>
@endsection
