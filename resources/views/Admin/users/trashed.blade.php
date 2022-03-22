@extends('Admin.layout.app')
@section('title')
    {{ __('user-trash') }}
@endsection
@section('title-page')
    {{ __('user-trash') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <livewire:data-table-users-trashed/>
        </div>
    </div>
@endsection
