@extends('Admin.layout.app')
@section('title')
{{ __('about-edit') }}
@endsection
@section('title-page')
{{ __('about-edit') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('about-edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('about.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>

        <br />
        <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach(config('locales.languages') as $key => $val)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home{{$key}}">{{__($val['name'])}}</a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                {{--tab start--}}
                @foreach(config('locales.languages') as $key => $val)
                <div id="home{{$key}}" class="container tab-pane {{ $loop->index == 0 ? 'show active' : '' }}" aria-labelledby="{{ $key }}-tab"><br>
                    <div class="form-group">
                        <label>{{ __('description') }}({{ __($val['name']) }})</label>
                        <textarea placeholder="@error('description.' . $key){{ $message }} @enderror" name="description[{{ $key }}]" class="form-control" rows="5">
                 {!! old('description.' . $key, $about->getTranslation('description', $key)) ?? $about->description !!}</textarea>
                    </div>
                </div>
                @endforeach
                {{--tab end--}}
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="photo">{{ __('photo') }}</label>
                        <input type="file" name="photo" class="form-control @error('photo') border-danger @enderror" id="photo" value="{{ old('photo') ?? $about->photo }}">
                        @error('photo')
                        <small class="alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2">
                        @if($about->photo != null)
                        <img class="w-100" src="{{ asset('storage/about/'.$about->photo) }}" />
                        @endif
                    </div>
                </div>

                <br />
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
