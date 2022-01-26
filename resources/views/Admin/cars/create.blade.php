@extends('Admin.layout.app')
@section('title')
{{ __('car-create') }}
@endsection
@section('title-page')
{{ __('car-create') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body col-12">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('car-create') }}</h2>
                </div>
                <div class="pull-right">
                    @can('create-car')
                    <a class="btn btn-info" href="{{ route('cars.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                    @endcan
                </div>
            </div>
        </div>

        <br />
        <form action="{{ route('cars.store') }}" method="POST">
            @include('Admin.cars.form')
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
            </div>
    </div>
    </form>
</div>
</div>
@endsection
