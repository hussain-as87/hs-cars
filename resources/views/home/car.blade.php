@extends('home.layout.app')
@section('content')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('images/bg_2.jpg')}});"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home.index') }}">{{ __('Home') }} <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ __('cars') }} <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">{{ __('Choose Your Car') }}</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                 style="background-image: url({{ asset('storage/cars/'.$car->image) }});">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="{{ route('home.single.car',$car->id) }}">{{ $car->name }}</a>
                                </h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{ $car->category->name }}</span>
                                    <p class="price ml-auto">${{ $car->pricing->in_day }} <span>/{{ __('day') }}</span>
                                    </p>
                                </div>
                                <p class="d-flex mb-0 d-block"><a href="{{ route('home.rent',$car->id) }}"
                                                                  class="btn btn-primary py-2 mr-1">{{ __('Book now') }}</a>
                                    <a href="{{ route('home.single.car',$car->id) }}"
                                       class="btn btn-secondary py-2 ml-1">{{ __('details') }}</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{ $cars->links() }}
                        {{--   <ul>
                             <li><a href="#">&lt;</a></li>
                             <li class="active"><span>1</span></li>
                             <li><a href="#">2</a></li>
                             <li><a href="#">3</a></li>
                             <li><a href="#">4</a></li>
                             <li><a href="#">5</a></li>
                             <li><a href="#">&gt;</a></li>
                         </ul>  --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
