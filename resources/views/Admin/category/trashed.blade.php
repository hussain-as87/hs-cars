@extends('Admin.layout.app')
@section('title')
    {{ __('category-trash') }}
@endsection
@section('title-page')
    {{ __('category-trash') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <livewire:data-table-categories-trashed />
        </div>
    </div>
@endsection
