@extends('Admin.layout.app')
@section('title')
{{ __('edit-service') }}
@endsection
@section('title-page')
{{ __('edit-service') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('edit-service') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('services.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <br />
        <form method="post" action="{{ route('services.update',$service->id) }}">
        @method('PUT')
            @include('Admin.services.form')
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
