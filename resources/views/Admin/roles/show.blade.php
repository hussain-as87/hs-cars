@extends('Admin.layout.app')

@section('title')
    {{ __('show role') }}
@endsection
@section('title-page')
    {{ __('show role') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> {{ __('show role') }}</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-outline-info" href="{{ route('roles.index') }}"> {{ __('Go Back') }} <i
                                data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                    </div>
                </div>
            </div>

            <br/>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('name') }}:</strong>
                        <br/>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('permission') }}:</strong>
                        <br/>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ __($v->name) }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
