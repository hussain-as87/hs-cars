@extends('Admin.layout.app')
@section('title')
    {{ __('about') }}
@endsection
@section('title-page')
    {{ __('about') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">@can('about-edit')
                    <a class="btn btn-outline-warning" href="{{ route('about.edit') }}">{{ __('edit') }} <i
                            data-feather="edit-3" class="icon-sm mr-2"></i></a>
                @endcan</h4>
            <div class="table-responsive pt-3">
                <div class="row">
                    <div class="col-7">{{ $about->description }}</div>
                    <div class="col-5"><img style="width:400px" src="{{ asset('storage/about/'.$about->photo) }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div> <br/>
@endsection
