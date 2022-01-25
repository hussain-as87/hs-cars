@extends('Admin.layout.app')
@section('title')
{{ __('users') }}
@endsection
@section('title-page')
{{ __('users') }}
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <livewire:data-table-user />
    </div>
</div>
@endsection
