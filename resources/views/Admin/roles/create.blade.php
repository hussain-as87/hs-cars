@extends('Admin.layout.app')

@section('title')
{{ __('create role') }}
@endsection
@section('title-page')
{{ __('create role') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('create role') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-outline-info" href="{{ route('roles.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>

        <br />
        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('name') }}:</strong>
                    {!! Form::text('name', null, array('placeholder' => __('name'),'class' => 'form-control')) !!}
                </div>
            </div>
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('permission') }}:</strong>
                    <br />
                    <br />
                    @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ __($value->name) }}</label>
                    <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
