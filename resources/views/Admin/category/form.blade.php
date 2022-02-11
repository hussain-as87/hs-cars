@csrf
<div class="row">
    <div class="col-3">
        @if($category->logo != null)
        <img class="w-100" src="{{ asset('storage/categories/'.$category->logo)}}" />
        @endif
    </div>
</div>
<br />
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
            <label for="name">{{__('name')}}({{ __($val['name']) }})</label>
            <input type="text" name="name[{{$key}}]" class="form-control @error('name.'.$key) is-invalid alert-danger @enderror" id="name" value="{!! old('name.'.$key,$category->getTranslation('name',$key)) ?? $category->name !!}" aria-describedby="emailHelp" placeholder="@error('name.'.$key){{$message}} @enderror">
        </div>

        <div class="form-group">
            <label>{{ __('description') }}({{ __($val['name']) }})</label>
            <textarea placeholder="@error('description.' . $key){{ $message }} @enderror" name="description[{{ $key }}]" class="form-control @error('description.' . $key) is-invalid alert-danger @enderror" rows="5">
                 {!! old('description.' . $key, $category->getTranslation('description', $key)) ?? $category->description !!}</textarea>
        </div>
    </div>
    @endforeach
    {{--tab end--}}

    <div class="form-group">
        <label>{{__('logo')}}</label>
        <input type="file" name="logo" class="file-upload-default @error('logo') is-invalid alert-danger @enderror">
        <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled="" placeholder="{{ __('Upload logo') }}">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">{{ __('upload') }}</button>
            </span>
        </div>
    </div>
</div>
<br />
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
</div>
