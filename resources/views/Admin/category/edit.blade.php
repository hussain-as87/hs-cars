@extends('Admin.layout.app')
@section('title')
{{ __('category-edit') }}
@endsection
@section('title-page')
{{ __('category-edit') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('category-edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-outline-info" href="{{ route('categories.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>
        <br />
        <form method="post" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('Admin.category.form')
    </form>
</div>
</div>
@endsection
