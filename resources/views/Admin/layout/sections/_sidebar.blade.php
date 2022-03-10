<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.home') }}" class="sidebar-brand">
            {{ __(config('settings.website_name')) }}<span> {{-- {{ __(env('APP_NAME')) }} --}} </span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">{{ __('main') }}</li>
            <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">{{ __('dashboard') }}</span>
                </a>
            </li>

            @can('settings')
                <li class="nav-item">
                    <a href="{{route('settings.index')}}" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">{{ __('settings') }}</span>
                    </a>
                </li>
            @endcan
            @can('about-list')
                <li class="nav-item">
                    <a href="{{route('about.index')}}" class="nav-link">
                        <i class="link-icon" data-feather="info"></i>
                        <span class="link-title">{{ __('About') }}</span>
                    </a>
                </li>
            @endcan
            @can('advert-list')
                <li class="nav-item">
                    <a href="{{route('advert.index')}}" class="nav-link">
                        <i class="mdi mdi-18px mdi-advertisements link-icon"></i>
                        <span class="link-title">{{ __('advert') }}</span>
                    </a>
                </li>
            @endcan

            @can('service-list')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#service" role="button" aria-expanded="false"
                       aria-controls="service">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">{{__('services')}}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="service">
                        <ul class="nav sub-menu">
                            @can('service-list')
                                <li class="nav-item">
                                    <a href="{{route('services.index')}}" class="nav-link">{{__('services')}}</a>
                                </li>
                            @endcan
                            @can('service-create')
                                <li class="nav-item">
                                    <a href="{{route('services.create')}}" class="nav-link">{{__('service-create')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan @can('user-list')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#users" role="button" aria-expanded="false"
                       aria-controls="icons">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">{{__('users')}}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav sub-menu">
                            @can('user-list')
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link">{{__('users')}}</a>
                                </li>
                            @endcan
                            @can('user-create')
                                <li class="nav-item">
                                    <a href="{{route('users.create')}}" class="nav-link">{{__('create user')}}</a>
                                </li>
                            @endcan
                            @can('user-trash')
                                <li class="nav-item">
                                    <a href="{{route('users.trash')}}" class="nav-link">{{__('user-trash')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('role-list')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#roles" role="button" aria-expanded="false"
                       aria-controls="roles">
                        <i class="link-icon" data-feather="lock"></i>
                        <span class="link-title">{{__('roles')}}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="roles">
                        <ul class="nav sub-menu">
                            @can('role-list')
                                <li class="nav-item">
                                    <a href="{{route('roles.index')}}" class="nav-link">{{__('roles')}}</a>
                                </li>
                            @endcan
                            @can('role-create')
                                <li class="nav-item">
                                    <a href="{{route('roles.create')}}" class="nav-link">{{__('create role')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan


            <li class="nav-item nav-category">{{ __('The Tables') }}</li>

            @can('category-list')

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#category" role="button" aria-expanded="false"
                       aria-controls="category">
                        <i class="mdi mdi-18px mdi-sitemap-outline link-icon"></i>
                        <span class="link-title">{{__('categories')}}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav sub-menu">
                            @can('category-list')

                                <li class="nav-item">
                                    <a href="{{route('categories.index')}}" class="nav-link">{{__('categories')}}</a>
                                </li>
                            @endcan
                            @can('category-create')
                                <li class="nav-item">
                                    <a href="{{route('categories.create')}}"
                                       class="nav-link">{{__('category-create')}}</a>
                                </li>
                            @endcan
                            @can('category-trash')
                                <li class="nav-item">
                                    <a href="{{route('categories.trash')}}"
                                       class="nav-link">{{__('category-trash')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('car-list')

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#cars" role="button" aria-expanded="false"
                       aria-controls="cars">
                        <i class="link-icon" data-feather="truck"></i>
                        <span class="link-title">{{__('cars')}}</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="cars">
                        <ul class="nav sub-menu">
                            @can('car-list')
                                <li class="nav-item">
                                    <a href="{{route('cars.index')}}" class="nav-link">{{__('cars')}}</a>
                                </li>
                            @endcan
                            @can('car-create')
                                <li class="nav-item">
                                    <a href="{{route('cars.create')}}" class="nav-link">{{__('car-create')}}</a>
                                </li>
                            @endcan
                            @can('car-trash')
                                <li class="nav-item">
                                    <a href="{{route('cars.trash')}}" class="nav-link">{{__('car-trash')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan

            @can('contacts')
                <li class="nav-item">
                    <a href="{{route('contacts.index')}}" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">{{ __('contacts') }}</span>
                    </a>
                </li>
            @endcan
            @can('rents')
                <li class="nav-item">
                    <a href="{{route('rent.index')}}" class="nav-link">
                        <i class="link-icon" data-feather="archive"></i>
                        <span class="link-title">{{ __('Rents') }}</span>
                    </a>
                </li>
            @endcan
            {{-- <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>  --}}
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="demo_1/dashboard-one.html">
                <img src="assets/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item active" href="demo_2/dashboard-one.html">
                <img src="assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
        </div>
    </div>
</nav>
