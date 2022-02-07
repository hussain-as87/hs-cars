@extends('home.layout.app')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('pricing') }} <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">{{ __('pricing') }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="car-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th class="bg-primary heading">{{ __('Per Hour Rate') }}</th>
                                <th class="bg-dark heading">{{ __('Per Day Rate') }}</th>
                                <th class="bg-black heading">{{ __('Leasing') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                            <tr class="">
                                <td class="car-image">
                                    <div class="img" style="background-image:url({{ asset('storage/cars/'.$car->image) }});"></div>
                                </td>
                                <td class="product-name">
                                    <h3>{{ $car->name }}</h3>
                                    <p class="mb-0 rated">
                                        <span>rated:</span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                    </p>
                                </td>

                                <td class="price">
                                    <p class="btn-custom"><a href="#">{{ __('Rent a car') }}</a></p>
                                    <div class="price-rate">
                                        <h3>
                                            <span class="num"><small class="currency">$</small> {{ $car->pricing->in_houre }}</span>
                                            <span class="per">/{{ __('per hour') }}</span>
                                        </h3>
                                        <span class="subheading">$3/{{ __('hour fuel surcharges') }}</span>
                                    </div>
                                </td>

                                <td class="price">
                                    <p class="btn-custom"><a href="#">{{ __('Rent a car') }}</a></p>
                                    <div class="price-rate">
                                        <h3>
                                            <span class="num"><small class="currency">$</small> {{ $car->pricing->in_day }}</span>
                                            <span class="per">/{{ __('per day') }}</span>
                                        </h3>
                                        <span class="subheading">$3/{{ __('hour fuel surcharges') }}</span>
                                    </div>
                                </td>

                                <td class="price">
                                    <p class="btn-custom"><a href="#">{{ __('Rent a car') }}</a></p>
                                    <div class="price-rate">
                                        <h3>
                                            <span class="num"><small class="currency">$</small> {{ $car->pricing->in_month }}</span>
                                            <span class="per">/{{ __('per month') }}</span>
                                        </h3>
                                        <span class="subheading">$3/{{ __('hour fuel surcharges') }}</span>
                                    </div>
                                </td>
                            </tr><!-- END TR-->

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
