@csrf
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
            <input type="text" name="name[{{$key}}]" class="form-control @error('name.'.$key) is-invalid alert-danger @enderror" id="name" value="{!! old('name.'.$key,$service->getTranslation('name',$key)) ?? $service->name !!}" aria-describedby="emailHelp" placeholder="@error('name.'.$key){{$message}} @enderror">
        </div>

        <div class="form-group">
            <label>{{ __('description') }}({{ __($val['name']) }})</label>
            <textarea placeholder="@error('description.' . $key){{ $message }} @enderror" name="description[{{ $key }}]" class="form-control @error('description.' . $key) is-invalid alert-danger @enderror" rows="5">
                 {!! old('description.' . $key, $service->getTranslation('description', $key)) ?? $service->description !!}</textarea>
        </div>
    </div>
    @endforeach
    {{--tab end--}}
    <div class="form-group">
        <span class="flaticon-wedding-car"> {{ __('wedding') }}</span><br />
        <span class="flaticon-transportation"> {{ __('City') }}</span><br />
        <span class="flaticon-car"> {{ __('Airport Transfer') }}</span><br />
        <label for="logo">{{ __('logo') }}</label>
        <select id="logo" class="form-control @error('logo') is-invalid alert-danger @enderror" name="logo">
            <option></option>
            <option value="flaticon-wedding-car" {{ $service->logo = 'flaticon-wedding-car'?'selected':'' }}>{{ __('wedding') }}</option>
            <option value="flaticon-car" {{ $service->logo = 'flaticon-car' ?'selected':'' }}>{{ __('City') }}</option>
            <option value="flaticon-transportation" {{ $service->logo = 'flaticon-transportation'?'selected':'' }}>{{ __('Airport Transfer') }}</option>
        </select>
    </div>
    <br />
