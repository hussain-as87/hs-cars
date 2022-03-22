@extends('home.layout.app')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_2.jpg')}});"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('rent') }} <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">{{ __('rent') }}</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form action="{{ route('home.rent.store') }}" class="request-form ftco-animate bg-primary"
                                  method="post">
                                @csrf
                                <h2>{{ __('Make your trip') }}</h2>
                                <div class="form-group">
                                    <label for="" class="label">{{ __('Pick-up location') }}</label>
                                    <input type="text" name="location" value="{{ old('location') }}"
                                           class="form-control" placeholder="{{ __('City, Airport, Station, etc') }}">
                                    @error('location')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <input type="hidden" name="car_id" value="{{$car->id}}"/>
                                <div class="form-group">
                                    <label for="" class="label">{{ __('Drop-off location') }}</label>
                                    <input type="text" name="drop_off_location" value="{{ old('drop_off_location') }}"
                                           class="form-control" placeholder="{{ __('City, Airport, Station, etc') }}">
                                    @error('drop_off_location')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">{{ __('quantity') }}</label>
                                    <input type="number" name="quantity" value="{{ old('quantity') ?? 1 }}"
                                           class="form-control" placeholder="{{ __('how much need?') }}">
                                    @error('quantity')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">{{ __('Pick-up date') }}</label>
                                        <input type="text" name="pik_up_date" value="{{ old('pik_up_date') }}"
                                               class="form-control" id="book_pick_date" placeholder="{{ __('Date') }}">
                                        @error('pik_up_date')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">{{ __('Drop-off date') }}</label>
                                        <input type="text" name="drop_off_date" value="{{ old('drop_off_date') }}"
                                               class="form-control" id="book_off_date" placeholder="{{ __('Date') }}">
                                        @error('drop_off_date')
                                        <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">{{ __('Pick-up time') }}</label>
                                    <input type="text" name="pik_up_time" value="{{ old('pik_up_time') }}"
                                           class="form-control" id="time_pick" placeholder="{{ __('Time') }}">
                                    @error('pik_up_time')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label style="color:white">{{ __('payment type') }}</label>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input @error('pay_type') is-invalid alert-danger @enderror"
                                            type="radio" name="pay_type" id="exampleRadios1"
                                            value="1" {{ old('pay_type') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleRadios1">
                                            <img src="{{ asset('images/paypal (2).png') }}"/></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input @error('pay_type') is-invalid alert-danger @enderror"
                                            type="radio" name="pay_type" id="exampleRadios2"
                                            value="0" {{ old('pay_type') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleRadios2" style="color:white">
                                            {{ __('Pay Later') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{ __('Rent A Car Now') }}"
                                           class="btn btn-secondary py-3 px-4">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">{{ __('Better Way to Rent Your Perfect Cars') }}</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">{{ __('Choose Your Pickup Location') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">{{ __('Select the Best Deal') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">{{ __('Reserve Your Rental Car') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><a href="{{ route('home.cars') }}"
                                      class="btn btn-primary py-3 px-4">{{ __('Reserve Your Perfect Car') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
