@extends('home.layout.app')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('services') }} <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">{{ __('Our Services') }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">{{ __('services') }}</span>
                <h2 class="mb-3">{{ __('Our Latest Services') }}</h2>
            </div>
        </div>
        <div class="row">
        @foreach ($services as $service)
     <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="{{ $service->logo }}"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">{{ __('Do You Want To Earn With Us? So Dont Be Late.') }}</h2>
                <a href="#" class="btn btn-primary btn-lg">{{ __('Become A Driver') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
