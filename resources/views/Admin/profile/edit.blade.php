@extends('Admin.layout.app')
@section('title')
{{ __('Edit Profile') }}
@endsection
@section('title-page')
{{ __('Edit Profile') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card text-white">
            <img style="height: 300px" src="@if(auth()->user()->profile->background_image){{asset('storage/users/background_image/'.auth()->user()->profile->background_image)}}@else
            https://via.placeholder.com/1148x272 @endif" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title "><img style="width: 150px" src="@if(auth()->user()->profile->avatar){{asset('storage/users/avatar/'.auth()->user()->profile->avatar)}}
                @else https://ui-avatars.com/api/?name={{ auth()->user()->name }}@endif" class="card-img" alt="...">
                </h5>
                <p class="card-text"></p>
            </div>
        </div>
        <br />

        <form novalidate="novalidate" class="cmxform" id="signupForm" method="POST" action="{{ route('profile.update')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-city">{{__('avatar')}}</label>
                                <input type="file" name="avatar" class="file-upload-default @error('avatar') is-invalid alert-danger @enderror">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info " disabled="" placeholder="{{ __('Upload image') }}">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">{{ __('upload') }}</button>
                                    </span>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="input-group col-xs-12">
                                    <input id="avata" type="text" class="form-control file-upload-info" disabled=""
                                           placeholder="Upload Image">
                                    <span class="input-group-append">
                                                    <button onclick="" class="file-upload-browse btn btn-primary"
                                                            type="button">Upload</button>
                                                </span>
                                </div>--}}


                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label" for="input-city">{{__('background image')}}</label>
                                <input type="file" name="background_image" class="file-upload-default @error('background_image') is-invalid alert-danger @enderror">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="{{ __('Upload image') }}">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">{{ __('upload') }}</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">{{__('username')}}</label>
                                <input type="text" id="input-username" name="username" class="form-control  @error('username') border-danger @enderror" value="{{$user->username}}">
                                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{__('email')}}</label>
                                <input type="email" id="input-email" name="email" class="form-control @error('email') border-danger @enderror" value="{{ $user->email }}">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">{{__('fname')}}</label>
                                <input type="text" id="input-first-name" name="f_name" class="form-control @error('fname') border-danger @enderror" placeholder="{{ $user->profile->f_name }}" value="{{ $user->profile->f_name }}">
                                @error('fname') <span class="text-danger">{{ $message }}</span> @enderror</div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">{{__('lname')}}</label>
                                <input type="text" id="input-last-name" name="l_name" class="form-control @error('lname') border-danger @enderror" placeholder="{{ $user->profile->l_name }}" value="{{ $user->profile->l_name }}">
                                @error('lname') <span class="text-danger">{{ $message }}</span> @enderror </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">{{__('ADDRESS')}}</label>
                                <input id="input-address" name="address" class="form-control @error('address') border-danger @enderror" placeholder="{{ $user->profile->address }}" value="{{ $user->profile->address }}" type="text">
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-date-input" class="form-control-label">{{__('date_of_birth')}}</label>
                                <input class="form-control bg-gradient-secondary @error('date_of_birth') border-danger @enderror" name="date_of_birth" type="date" value="{{ $user->profile->date_of_birth }}" id="example-date-input">
                                @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-city">{{__('city')}}</label>
                                <input type="text" name="city" id="input-city" class="form-control @error('city') border-danger @enderror" placeholder="{{ $user->profile->city }}" value="{{ $user->profile->city }}">
                                @error('city') <span class="text-danger">{{ $message }}</span> @enderror</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-country">{{__('country')}}</label>
                                <input type="text" name="country" id="input-country" class="form-control @error('country') border-danger @enderror" placeholder="{{old('country')?'': $user->profile->country }}" value="{{ $user->profile->country }}">
                                @error('country') <span class="text-danger">{{ $message }}</span> @enderror </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-country">{{__('postal code')}}</label>
                                <input type="number" name="postal_code" id="input-postal-code" class="form-control @error('postal_code') border-danger @enderror" placeholder="{{old('postal_code')?'': $user->profile->postal_code }}" value="{{ $user->profile->postal_code }}">
                                @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror </div>
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">{{__('About')}}</label>
                        <textarea rows="4" name="about_me" class="form-control @error('about_me') border-danger @enderror" placeholder="{{old('about_me')?'': $user->profile->about_me }}">{{ $user->profile->about_me }}</textarea>
                        @error('about_me') <span class="text-danger">{{ $message }}</span> @enderror </div>
                </div>
                <div class="pl-lg-4">
                    <button class="btn btn-primary " type="submit">{{ __('edit') }} <i data-feather="edit" class="icon-sm mr-2"></i></button>

                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
