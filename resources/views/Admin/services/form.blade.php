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
        <label for="logo">{{ __('logo') }}</label>
        <div class="form-check">
            <input class="form-check-input @error('logo') is-invalid alert-danger @enderror" type="radio" name="logo" id="exampleRadios1" value="flaticon-wedding-car" {{ $service->logo == 'flaticon-wedding-car' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios1">
                <span class="flaticon-wedding-car"> {{ __('wedding') }}</span>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('logo') is-invalid alert-danger @enderror" type="radio" name="logo" id="exampleRadios2" value="flaticon-car" {{ $service->logo == 'flaticon-car' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios2">
                <span class="flaticon-transportation"> {{ __('City') }}</span>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('logo') is-invalid alert-danger @enderror" type="radio" name="logo" id="exampleRadios3" value="flaticon-transportation" {{ $service->logo == 'flaticon-transportation' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios3">
                <span class="flaticon-car"> {{ __('Airport Transfer') }}</span>
            </label>
        </div>
    </div>
    <br />
