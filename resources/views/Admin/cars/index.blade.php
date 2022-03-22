@extends('Admin.layout.app')
@section('title')
    {{ __('cars') }}
@endsection
@section('title-page')
    {{ __('cars') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <livewire:data-table-cars/>
        </div>
    </div>
@endsection
