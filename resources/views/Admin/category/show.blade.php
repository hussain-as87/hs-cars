@extends('Admin.layout.app')
@section('title')
{{ $category->name }}
@endsection
@section('title-page')
{{ $category->name }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('categories.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
            <a class="btn btn-primary" href="{{ route('categories.create') }}"> {{ __('category-create') }} <i data-feather="plus-circle" class="icon-sm mr-2"></i></a>
            <a class="btn btn-primary" href="{{ route('cars.create') }}"> {{ __('car-create') }} <i data-feather="plus-circle" class="icon-sm mr-2"></i></a>
            <a class="btn btn-secondary " href="{{ route('categories.edit',$category->id) }}"> {{ __('category-edit') }} <i data-feather="edit-3" class="icon-sm mr-2"></i></a>
        </div>
        <br />
        <div class="row">
            <div class="col-9 perfect-scrollbar-example">
                {{$category->description }}
            </div>
            <div class="col-3">
                <img class="w-100" src="{{ asset('storage/categories/'.$category->logo)}}" />
            </div>
        </div>
        <br />
        <br />
        <hr />
        <div class="row col-12">
        <livewire:data-table-single-category :category="$category"/>
        </div>
    </div>
</div>
@endsection
