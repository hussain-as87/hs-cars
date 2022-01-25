@php
$user_count = App\Models\User::all()->count();
@endphp
@extends('Admin.layout.app')
@section('title')
{{ __('home') }}
@endsection
@section('title-page')
{{ __('home') }}
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow">
            @can('settings')
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('settings') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('settings.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2"></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px  mdi-cog-outline "></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('user-list')
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('users') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                    @can('user-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('users.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>
                                    @endcan
                                    @can('user-create')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('users.create') }}"><i data-feather="file-plus" class="icon-sm mr-2"></i> <span class="">{{ __('create') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{ $user_count }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-danger">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px  mdi-account-multiple-outline "></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('role-list')
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('roles') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    @can('role-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>

                                    @endcan
                                    @can('role-create')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.create') }}"><i data-feather="plus" class="icon-sm mr-2"></i> <span class="">{{ __('create') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2"></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px  mdi-lock-outline "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('cars') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    @can('role-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>

                                    @endcan
                                    @can('role-create')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.create') }}"><i data-feather="plus" class="icon-sm mr-2"></i> <span class="">{{ __('create') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2"></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px   mdi-car-hatchback  "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('about') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    @can('role-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('about.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>
                                    @endcan
                                    @can('role-create')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('about.edit',1) }}"><i data-feather="plus" class="icon-sm mr-2"></i> <span class="">{{ __('create') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2"></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px  mdi-information-variant"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('services') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    @can('role-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>

                                    @endcan
                                    @can('role-create')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.create') }}"><i data-feather="plus" class="icon-sm mr-2"></i> <span class="">{{ __('create') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2"></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px  mdi-briefcase-outline "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->
@endsection
