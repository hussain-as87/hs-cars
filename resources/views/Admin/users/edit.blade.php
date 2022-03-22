@extends('Admin.layout.app')


@section('title')
    {{ __('edit user') }}
@endsection
@section('title-page')
    {{ __('edit user') }}
@endsection
@section('content')
    <div class="card ">
        <div class="card-body">
            <h5>{{ __('edit user') }}</h2>
                <a class="btn btn-outline-info" href="{{ route('users.index') }}"> {{__ ('Go Back') }} <i
                        data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                <br/>
                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('name') }}:</strong>
                            {!! Form::text('name', null, array('placeholder' => __('name'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('email') }}:</strong>
                            {!! Form::text('email', null, array('placeholder' => __('email'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('username') }}:</strong>
                            {!! Form::text('username', null, array('placeholder' => __('username'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Password') }}:</strong>
                            {!! Form::password('password', array('placeholder' => __('Password'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Confirm Password') }}:</strong>
                            {!! Form::password('confirm-password', array('placeholder' => __('Confirm Password'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('roles') }}:</strong>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-outline-primary">{{ __('Submit') }} <i data-feather="save"
                                                                                                    class="icon-sm mr-2"></i>
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
