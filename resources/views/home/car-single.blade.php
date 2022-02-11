@extends('home.layout.app')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('car details') }} <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">{{ __('car details') }}</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <div class="img rounded" style="background-image: url({{ asset('storage/cars/'.$car->image) }});"></div>
                    <div class="text text-center">
                        <span class="subheading">{{ $car->category->name }}</span>
                        <h2>{{ $car->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    {{ __('mileage') }}
                                    <span>{{ $car->mileage }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    {{ __('transmission_type') }}
                                    <span>{{ __($car->transmission_type) }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    {{ __('seats') }}
                                    <span>{{ $car->seats }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    {{ __('luggage') }}
                                    <span>{{ $car->luggage }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    {{ __('fuel') }}
                                    <span>{{ __($car->fuel) }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pills">
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">{{ __('Features') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">{{ __('description') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">{{ __('Reviews') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="@if($car->feature->air_conditions == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('air_conditions') }}</li>
                                        <li class="@if($car->feature->child_seat == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('child_seat') }}</li>
                                        <li class="@if($car->feature->gps == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('gps') }}</li>
                                        <li class="@if($car->feature->luggage == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('luggage') }}</li>
                                        <li class="@if($car->feature->music == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('music') }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="@if($car->feature->seat_beit == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('seat_beit') }}</li>
                                        <li class="@if($car->feature->sleeping_bed == true) check @else remove @endif"><span class="ion-ios-close"></span>{{ __('sleeping_bed') }}</li>
                                        <li class="@if($car->feature->water == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('water') }}</li>
                                        <li class="@if($car->feature->bluetooth == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('bluetooth') }}</li>
                                        <li class="@if($car->feature->onboard_computer == true) check @else remove @endif"><span class="ion-ios-close"></span>{{ __('onboard_computer') }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="@if($car->feature->audio_input == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('audio_input') }}</li>
                                        <li class="@if($car->feature->long_term_trips == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('long_term_trips') }}</li>
                                        <li class="@if($car->feature->car_kit == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('car_kit') }}</li>
                                        <li class="@if($car->feature->remote_central_locking == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('remote_central_locking') }}</li>
                                        <li class="@if($car->feature->climate_control == true) check @else remove @endif"><span class="ion-ios-checkmark"></span>{{ __('climate_control') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                            <p>{{ $car->description }}</p>
                        </div>

                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3 class="head">23 Reviews</h3>
                                    <div class="review d-flex">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review d-flex">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review d-flex">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="rating-wrap">
                                        <h3 class="head">Give a Review</h3>
                                        <div class="wrap">
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (98%)
                                                </span>
                                                <span>20 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (85%)
                                                </span>
                                                <span>10 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (70%)
                                                </span>
                                                <span>5 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (10%)
                                                </span>
                                                <span>0 Reviews</span>
                                            </p>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    (0%)
                                                </span>
                                                <span>0 Reviews</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">{{ __('Choose Car') }}</span>
                <h2 class="mb-2">{{ __('Related Cars') }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($cars as $key => $car)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('storage/cars/'.$car->image) }});">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="{{ route('home.single.car',$car->id) }}">{{ $car->name }}</a></h2>
                        <div class="d-flex mb-3">
                            <span class="cat">{{ $car->category->name }}</span>
                            <p class="price ml-auto">${{ $car->pricing->in_day }} <span>/day</span></p>
                        </div>
                        <p class="d-flex mb-0 d-block"><a href="{{ route('home.rent',$car->id) }}" class="btn btn-primary py-2 mr-1">{{ __('Book now') }}</a> <a href="{{ route('home.single.car',$car->id) }}" class="btn btn-secondary py-2 ml-1">{{ __('details') }}</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
