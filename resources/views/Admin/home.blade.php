@extends('Admin.layout.app')
@section('title')
{{ __('Home') }}
@endsection
@section('title-page')
{{ __('Home') }}
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
                                    @can('car-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>

                                    @endcan
                                    @can('car-create')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.create') }}"><i data-feather="plus" class="icon-sm mr-2"></i> <span class="">{{ __('create') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{ $car_count }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px mdi-truck-outline"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('categories') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    @can('category-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('categories.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>

                                    @endcan
                                    @can('category-create')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('categories.create') }}"><i data-feather="plus" class="icon-sm mr-2"></i> <span class="">{{ __('create') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{ $category_count }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px mdi-sitemap-outline"></i>
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
                                    @can('about-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('about.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>
                                    @endcan
                                    @can('about-create')
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
                                <i class="mdi mdi-36px  mdi-information-outline"></i>
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
                                    @can('service-list')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('roles.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>

                                    @endcan
                                    @can('service-create')
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
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('New Rents') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    @can('rents')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('rent.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>
                                    @endcan

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2 text-success"> {{ $rent_count }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px  mdi-archive-check-outline "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">{{ __('New Contacts') }}</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                    @can('contacts')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('contacts.index') }}"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">{{ __('view') }}</span></a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2 text-success"> {{ $contact_count }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="">

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                                <i class="mdi mdi-36px  mdi-email-outline "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->
<div class="row">
    <div class="col-xl-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {{-- <div id="myAreaChart"></div>  --}}
                <div id="apexLine"></div>
            </div>
        </div>
    </div>
</div>

@endsection
