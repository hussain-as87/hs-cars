@extends('Admin.layout.app')
@section('title')
{{ __('create-service') }}
@endsection
@section('title-page')
{{ __('create-service') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('create-service') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('services.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>

        <br />
        <form  action="{{ route('services.store') }}" method="POST">
            @include('Admin.services.form')
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
