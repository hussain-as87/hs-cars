@extends('Admin.layout.app')
@section('title')
    {{ __('category-create') }}
@endsection
@section('title-page')
    {{ __('category-create') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body col-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ __('category-create') }}</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-outline-info" href="{{ route('categories.index') }}"> {{ __('Go Back') }} <i
                                data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                    </div>
                </div>
            </div>

            <br/>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @include('Admin.category.form')
            </form>
        </div>

@endsection
