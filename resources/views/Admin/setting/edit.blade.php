@extends('Admin.layout.app')


@section('title')
{{ __('edit setting') }}
@endsection
@section('title-page')
{{ __('edit setting') }}
@endsection
@section('content')
<div class="card ">
    <div class="card-body">
        <h5>{{ __('edit setting') }}</h5>
        <a class="btn btn-info" href="{{ route('settings.index') }}"> {{__ ('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
        <br />
        <form action="{{ route('settings.update',$setting->id) }}" method="post">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('name') }}: <b>{{ $setting->name }}</b></strong>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('value') }}:</strong>
                        <input type="text" name="value" id="" placeholder="{{ __('value') }}" class="form-control @error('value') is-invalid alert-danger @enderror" value="{{ $setting->value }}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-outline-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
