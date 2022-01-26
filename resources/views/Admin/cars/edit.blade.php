@extends('Admin.layout.app')
@section('title')
{{ __('car-edit') }}
@endsection
@section('title-page')
{{ __('car-edit') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('car-edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('cars.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>
        <br />
        <form method="post" action="{{ route('cars.update',$car->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('Admin.cars.form')
    </div>
    </form>
</div>
</div>
@endsection
