@extends('Admin.layout.app')
@section('title')
{{ __('profile') }}
@endsection
@section('title-page')
{{ __('profile') }}
@endsection
@section('content')

<div class="card ">
    <div class="card-body">
        <div class="profile-page tx-13">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="profile-header">
                        <div class="cover" wire:poll>
                            <div class="gray-shade"></div>

                            <figure>
                                <img src="@if(auth()->user()->profile->background_image){{asset('storage/users/background_image/'.auth()->user()->profile->background_image)}}@else
                                    https://via.placeholder.com/1148x272 @endif" class="img-fluid" alt="profile cover" style="height: 250px">
                            </figure>

                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                    <button class="nobu" onclick="showSwal('custom-html')"><img class="profile-pic" src="@if(auth()->user()->profile->avatar){{asset('storage/users/avatar/'.auth()->user()->profile->avatar)}}
                                                                                            @else https://ui-avatars.com/api/?name={{ auth()->user()->name }}@endif" alt="profile"></button>
                                    <span class="profile-name">{{auth()->user()->name}}</span>
                                </div>
                                <div class="d-none d-md-block">
                                    <a href="{{route('profile.edit')}}" class="btn btn-secondary btn-icon-text btn-edit-profile">
                                        <i data-feather="edit-3" class="btn-icon-prepend"></i> {{__('edit profile')}}
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="header-links">
                            <ul class="links d-flex align-items-center mt-3 mt-md-0">
                                <li class="header-link-item d-flex align-items-center active">
                                    <i class="mr-1 icon-md" data-feather="columns"></i>
                                    <a class="pt-1px d-none d-md-block" href="#">{{__('timeline')}}</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <i class="mr-1 icon-md" data-feather="user"></i>
                                    <a class="pt-1px d-none d-md-block" href="#">{{__('About')}}</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <i class="mr-1 icon-md" data-feather="users"></i>
                                    <a class="pt-1px d-none d-md-block" href="#">{{__('friends')}} <span class="text-muted tx-12">3,765</span></a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <i class="mr-1 icon-md" data-feather="image"></i>
                                    <a class="pt-1px d-none d-md-block" href="#">{{__('photos')}}</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <i class="mr-1 icon-md" data-feather="video"></i>
                                    <a class="pt-1px d-none d-md-block" href="#">{{__('VIDEOS')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0">{{__('About')}}</h6>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i>
                                            <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="git-branch" class="icon-sm mr-2"></i> <span class="">Update</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i>
                                            <span class="">View all</span></a>
                                    </div>
                                </div>
                            </div>
                            <p>{{auth()->user()->profile->about_me}}</p>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">{{__('age')}}:</label>
                                <p class="text-muted">{{date('Y', strtotime(now('Y')))-date('Y', strtotime(auth()->user()->profile->date_of_birth))}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">{{__('joined')}}:</label>
                                <p class="text-muted">{{auth()->user()->created_at->format('M d,y')}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">{{__('lives')}}:</label>
                                <p class="text-muted">{{auth()->user()->profile->city}}
                                    ,{{auth()->user()->profile->country}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">{{__('email')}}:</label>
                                <p class="text-muted">{{auth()->user()->email}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">{{__('website')}}:</label>
                                <p class="text-muted">www.nobleui.com</p>
                            </div>
                            <div class="mt-3 d-flex social-links">
                                <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                                    <i data-feather="github" data-toggle="tooltip" title="github.com/nobleui"></i>
                                </a>
                                <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                                    <i data-feather="twitter" data-toggle="tooltip" title="twitter.com/nobleui"></i>
                                </a>
                                <a href="javascript:;" class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                                    <i data-feather="instagram" data-toggle="tooltip" title="instagram.com/nobleui"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-6 middle-wrapper">
                    <div class="row">

                        @include('Admin.posts.create')
                        <div class="col-md-12 py-4">
                            <div class="card rounded">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createModal">{{ __('create new post') }} <i data-feather="feather" class="icon-sm mr-2"></i></button>
                            </div>
                        </div>
                        @foreach($posts as $post)

                        @include('Admin.posts.edit')
                        <div class="col-md-12 py-2" id="post-{{ $post->id }}">
                            <div class="card rounded">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="img-xs rounded-circle" src="@if( $post->user->profile->avatar){{asset('storage/users/avatar/'.$post->user->profile->avatar)}}
                                             @else https://ui-avatars.com/api/?name={{ $post->user->name }}@endif" alt="">
                                            <div class="ml-2">
                                                <p>{{$post->user->name}}</p>
                                                <p class="tx-11 text-muted">{{$post->created_at->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="meh" class="icon-sm mr-2"></i> <span class="">Unfollow</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="corner-right-up" class="icon-sm mr-2"></i> <span class="">Go to post</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="share-2" class="icon-sm mr-2"></i> <span class="">Share</span></a>
                                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="copy" class="icon-sm mr-2"></i> <span class="">Copy link</span></a>

                                                <button class="nobu w-100" data-toggle="modal" data-target="#updateModal">
                                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">{{ __('edit') }}</span></a>
                                                </button>
                                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="nobu w-100" onclick="return confirm('Are you sure?')" type="submit">
                                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">{{ __('delete') }}</span></a>
                                                    </button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-3 tx-14">{{$post->description}}</p>

                                    @if($post->photo != null) <img class="img-fluid" src="{{asset('storage/post/photos/'.$post->photo)}}" alt="">@endif
                                    @if($post->video != null)
                                    <video class="video-fluid z-depth-1" autoplay loop controls muted>
                                        <source src="{{ asset('storage/post/videos/'.$post->video) }}" type="video/mp4" />
                                    </video>
                                    @endif
                                </div>


                                <livewire:comment-post :post="$post" />

                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                <!-- middle wrapper end -->
                <!-- right wrapper start -->
                <div class="d-none d-xl-block col-xl-3 right-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">{{ __('latest photos') }}</h6>
                                    <div class="latest-photos">
                                        <div class="row">
                                            @foreach($posts as $key => $post)
                                            @if($post->photo != null)
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid" src="{{ asset('storage/posts/photos/'.$post->photo) }}" width="67" height="67" alt="">
                                                </figure>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">{{ __('suggestions for you') }}</h6>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip" title="Connect"></i></button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip" title="Connect"></i></button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip" title="Connect"></i></button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip" title="Connect"></i></button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip" title="Connect"></i></button>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip" title="Connect"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right wrapper end -->
            </div>
        </div>
    </div>
</div>
{{--<!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello {{$user->name}}</h1>
<p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with
    your work and manage your projects or assigned tasks</p>
<a href="#!" class="btn btn-neutral">Edit profile</a>
</div>
</div>
</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <livewire:image-profile :user="$user" />
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <livewire:edit-profile :user="$user" />
                </div>
            </div>
        </div>
    </div>

    --}}
    @endsection
