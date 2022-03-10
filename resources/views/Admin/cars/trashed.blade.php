@extends('Admin.layout.app')
@section('title')
    {{ __('car-trash') }}
@endsection
@section('title-page')
    {{ __('car-trash') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <livewire:data-table-cars-trashed />
        </div>
    </div>
@endsection
