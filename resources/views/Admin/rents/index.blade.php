@extends('Admin.layout.app')
@section('title')
{{ __('rents') }}
@endsection
@section('title-page')
{{ __('rents') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <livewire:data-table-rent />
    </div>
</div>
@endsection
