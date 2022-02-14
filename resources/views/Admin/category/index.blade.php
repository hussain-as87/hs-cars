@extends('Admin.layout.app')
@section('title')
{{ __('categories') }}
@endsection
@section('title-page')
{{ __('categories') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <livewire:data-table-categories />
    </div>
</div>
@endsection
