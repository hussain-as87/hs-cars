@extends('Admin.layout.app')
@section('title')
{{ __('advert-edit') }}
@endsection
@section('title-page')
{{ __('advert-edit') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('advert-edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('advert.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>

        <br />
        <form action="{{ route('advert.update') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="title">{{__('title')}}({{ __($val['name']) }})</label>
                        <input type="text" name="title[{{$key}}]" class="form-control @error('title.'.$key) is-invalid alert-danger @enderror" id="title" value="{!! old('title.'.$key,$advert->getTranslation('title',$key)) ?? $advert->title !!}" aria-describedby="emailHelp" placeholder="@error('title.'.$key){{$message}} @enderror">
                    </div>

                    <div class="form-group">
                        <label>{{ __('description') }}({{ __($val['name']) }})</label>
                        <textarea placeholder="@error('description.' . $key){{ $message }} @enderror" name="description[{{ $key }}]" class="form-control" rows="5">
                 {!! old('description.' . $key, $advert->getTranslation('description', $key)) ?? $advert->description !!}</textarea>
                    </div>
                </div>
                @endforeach
                {{--tab end--}}
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="video">{{ __('video') }}</label>
                        <input type="url" name="video" class="form-control @error('video') border-danger @enderror" id="image" value="{{ old('video') ?? $advert->video }}">
                        @error('video')
                        <small class="alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="photo">{{ __('image') }}</label>
                        <input type="file" name="image" class="form-control @error('image') border-danger @enderror" id="image" value="{{ old('image') ?? $advert->image }}">
                        @error('image')
                        <small class="alert-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2">
                        @if($advert->image != null)
                        <img class="w-100" src="{{ asset('storage/advert/'.$advert->image) }}" />
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
