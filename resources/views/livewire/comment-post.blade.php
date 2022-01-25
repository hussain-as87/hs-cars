@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

<!-- core:css -->
<link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<!-- end plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{asset('assets/css/demo_2/style.css')}}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@endpush
<div class="card-footer" wire:poll.750ms>
    <div class="d-flex post-actions">
        <livewire:like-post :post="$post" />


        <a class="d-flex align-items-center text-muted mr-4" data-toggle="collapse" {{--  href="#{{ $post->description.$post->id }}" --}} role="button" aria-expanded="false" aria-controls="icons">
            <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="15.5" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            </svg>
            <p class="d-none d-md-block ml-2">{{ __('Comment') }}</p>
        </a>

        {{-- <a href="javascript:;" class="d-flex align-items-center text-muted">
                                        <i class="icon-md" data-feather="share"></i>
                                        <p class="d-none d-md-block ml-2">Share</p>
                                    </a>  --}}
    </div>
    <br />
    <div{{--  class="collapse"  id="{{ $post->description.$post->id }}" --}}>
        <form action="" wire:submit.prevent="store">
            <textarea id="description" wire:model="description" style="background-color:rgba(54, 54, 54, 0.377)" class="form-control w-100" maxlength="500" rows="2" placeholder="{{ __('create new comment') }}"></textarea>
            <button type="submit" class="btn btn-outline-secondary" style="border:none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cursor" viewBox="0 0 16 16">
                    <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103zM2.25 8.184l3.897 1.67a.5.5 0 0 1 .262.263l1.67 3.897L12.743 3.52 2.25 8.184z" />
                </svg>
            </button>
        </form>
</div>
<br>
<div>
    @foreach($comments as $key => $com)
    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom" wire:poll id="comment-{{ $com->id }}-{{ $key }}">
        <div class="d-flex align-items-center hover-pointer">
            <img class="img-xs rounded-circle" src="@if($com->user->profile->avatar){{ asset('storage/user/avatar'.$com->user->profile->avatar) }}@else https://ui-avatars.com/api/?name={{ auth()->user()->name }}@endif" alt="" style="width:37px ; height: 37px;">
            <div class="ml-2">
                <p>{{ $com->user->name }}</p>
                <p class="tx-11 text-muted"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                        <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                    </svg> {{ $com->updated_at->diffForHumans() }}</p>


                <p class="tx-15 text-light">{{ $com->description }}</p>
            </div>
        </div>


        <div class="dropdown">
            <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <button class="nobu w-100" type="button" data-toggle="modal" data-target="#updatecomment_{{ $com->id }}">
                    <a class="dropdown-item d-flex align-items-center" href="#comment-{{ $com->id }}-{{ $key }}"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">{{ __('edit') }}</span></a>
                </button>
                <button type="button" class="nobu w-100" wire:click="destroy({{$com->id}})">
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">{{ __('delete') }}</span></a>
                </button>
            </div>
        </div>
        {{-- <button class="btn btn-icon"><i data-feather="user-plus" data-toggle="tooltip"
                                    title="Connect"></i></button>  --}}
    </div>
    <div wire:ignore.self id="updatecomment_{{ $com->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updatecommentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatecommentLabel">{{ __('edit comment') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" wire:submit.prevent="update({{ $com->id }})">
                        <div class="form-group mb-0 row">
                            <div class="col-lg-3">
                                <label for="description" class="col-form-label">{{__('description')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <textarea id="description_up" wire:model="description_up" class="form-control" maxlength="500" rows="8">
                                {{ $com->description }} </textarea>
                                @error('description')
                                <small class="text-danger-muted">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary">
                            <i data-feather="edit-2" class="icon-sm mr-2"></i>{{__('edit')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endforeach
    <button class="nobu mr-3" type="button" wire:click="loadMore()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z" />
        </svg>
    </button>
    <button class="nobu mr-3" type="button" wire:click="loadLess()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
        </svg>
    </button>

</div>
</div>
@push('scripts')
<!-- core:js -->
<script src="{{asset('assets/vendors/core/core.js')}}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<!-- endinject -->
<!-- custom js for this page -->
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/datepicker.js')}}"></script>
<!-- end custom js for this page -->
<script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endpush
