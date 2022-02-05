@extends('Admin.layout.app')
@section('title')
{{ $car->name }}
@endsection
@section('title-page')
{{ $car->name }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('cars.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
            <a class="btn btn-primary" href="{{ route('cars.create') }}"> {{ __('car-create') }} <i data-feather="plus-circle" class="icon-sm mr-2"></i></a>
            <a class="btn btn-secondary " href="{{ route('cars.edit',$car->id) }}"> {{ __('car-edit') }} <i data-feather="edit-3" class="icon-sm mr-2"></i></a>
        </div>
        <br />
        <div class="row">
            <div class="col-9 perfect-scrollbar-example">
               {{$car->description }}
            </div>
            <div class="col-3">
                <img class="w-100" src="{{ asset('storage/cars/'.$car->image)}}" />
            </div>
        </div>
        <br />
        <br />
        <hr />
        <div class="row col-12">
            <div class="col-2">
                <p><strong class="text-info">{{ __('user') }}</strong><br />{{ $car->user->name }}</p>
            </div>
            <div class="col-2">
                <p><strong class="text-info">{{ __('mileage') }}</strong><br />{{ $car->mileage}}</p>
            </div>
            <div class="col-2">
                <p><strong class="text-info">{{ __('transmission_type') }}</strong><br />{{ $car->transmission_type}}</p>
            </div>
            <div class="col-2">
                <p><strong class="text-info">{{ __('seats') }}</strong><br />{{ $car->seats}}</p>
            </div>
            <div class="col-2">
                <p><strong class="text-info">{{ __('luggage') }}</strong><br />{{ $car->luggage}}</p>
            </div>
            <div class="col-2">
                <p><strong class="text-info">{{ __('fuel') }}</strong><br />{{ $car->fuel}}</p>
            </div>
        </div>
        <hr>
          <strong class="text-secondary">{{ __('price') }}:</strong>
        <div class="row col-12">
            <div class="col-4">
                <p><strong class="text-info">{{ __('in the houre') }}</strong><br />{{$car_pricing->in_houre}}  $</p>
            </div>
            <div class="col-4">
                <p><strong class="text-info">{{ __('in the day') }}</strong><br />{{$car_pricing->in_day}}  $</p>
            </div>
            <div class="col-4">
                <p><strong class="text-info">{{ __('in the month') }}</strong><br />{{$car_pricing->in_month}}  $</p>
            </div>
        </div>
        <hr>
          <strong class="text-secondary">{{ __('details') }}:</strong>

        <div class="row col-12">
            <div class="col-2">
                <p ><strong class="text-info">{{ __('air_conditions') }}</strong><br /><span class="@if($car_features->air_conditions == true) text-success @else text-danger @endif">{{ $car_features->air_conditions ? __('yes') : __('no') }}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('child_seat') }}</strong><br /><span class="@if($car_features->child_seat == true) text-success @else text-danger @endif">{{ $car_features->child_seat ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('gps') }}</strong><br /><span class="@if($car_features->gps == true) text-success @else text-danger @endif">{{ $car_features->gps ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('luggage') }}</strong><br /><span class="@if($car_features->luggage == true) text-success @else text-danger @endif">{{ $car_features->luggage ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('music') }}</strong><br /><span class="@if($car_features->music == true) text-success @else text-danger @endif">{{ $car_features->music ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('seat_beit') }}</strong><br /><span class="@if($car_features->seat_beit == true) text-success @else text-danger @endif">{{ $car_features->seat_beit ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('sleeping_bed') }}</strong><br /><span class="@if($car_features->sleeping_bed == true) text-success @else text-danger @endif">{{ $car_features->sleeping_bed ? __('yes'): __('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('water') }}</strong><br /><span class="@if($car_features->water == true) text-success @else text-danger @endif">{{ $car_features->water ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('bluetooth') }}</strong><br /><span class="@if($car_features->bluetooth == true) text-success @else text-danger @endif">{{ $car_features->bluetooth ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('onboard_computer') }}</strong><br /><span class="@if($car_features->onboard_computer == true) text-success @else text-danger @endif">{{ $car_features->onboard_computer ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('audio_input') }}</strong><br /><span class="@if($car_features->audio_input == true) text-success @else text-danger @endif">{{ $car_features->audio_input ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('long_term_trips') }}</strong><br /><span class="@if($car_features->long_term_trips == true) text-success @else text-danger @endif">{{ $car_features->long_term_trips ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('car_kit') }}</strong><br /><span class="@if($car_features->car_kit == true) text-success @else text-danger @endif">{{ $car_features->car_kit ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('remote_central_locking') }}</strong><br /><span class="@if($car_features->remote_central_locking == true) text-success @else text-danger @endif">{{ $car_features->remote_central_locking ? __('yes'):__('no')}}</span</p>
            </div>
            <div class="col-2">
                <p ><strong class="text-info">{{ __('climate_control') }}</strong><br /><span class="@if($car_features->climate_control == true) text-success @else text-danger @endif">{{ $car_features->climate_control ? __('yes'):__('no')}}</span</p>
            </div>
        </div>
    </div>
</div>
@endsection
