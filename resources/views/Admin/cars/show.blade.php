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
            <div class="col-9">
                <p class="card-text"> {{ $car->description }} </p>
            </div>
            <div class="col-3">
                <img class="w-100" src="{{ asset('storage/cars/'.$car->image)}}" />
            </div>
        </div>
        <br />
        <br />
        <hr />
        <div class="row">
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
    </div>
</div>
@endsection
