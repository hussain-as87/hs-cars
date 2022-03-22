@extends('Admin.layout.app')
@section('title')
    {{ __('show user') }}
@endsection
@section('title-page')
    {{ __('show user') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ __('show user') }}</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-outline-info" href="{{ route('users.index') }}">{{ __('Go Back') }} <i
                                data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                    </div>
                </div>
            </div>

            <br/>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('name') }}:</strong><br/>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('email') }}:</strong><br/>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('roles') }}:</strong><br/>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                @if ($v == 'User')
                                    <label class="badge badge-warning">{{ $v }}</label>
                                @elseif ($v == 'Admin')
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
