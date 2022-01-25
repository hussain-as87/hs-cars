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
            <textarea placeholder="@error('description.' . $key){{ $message }} @enderror" name="description[{{ $key }}]" class="form-control" rows="5">
                 {!! old('description.' . $key, $service->getTranslation('description', $key)) ?? $service->description !!}</textarea>
        </div>
    </div>
    @endforeach
    {{--tab end--}}
    <div class="form-group">
        <span class="flaticon-wedding-car"> wedding</span><br />
        <span class="flaticon-transportation"> City</span><br />
        <span class="flaticon-car"> Airport Transfer</span><br />
        <label for="logo">{{ __('logo') }}</label>
        <select id="logo" class="form-control" name="logo">
            <option value="flaticon-wedding-car" {{ $service->logo = 'flaticon-wedding-car'?'selected':'' }}>wedding</option>
            <option value="flaticon-car" {{ $service->logo = 'flaticon-car' ?'selected':'' }}>City</option>
            <option value="flaticon-transportation" {{ $service->logo = 'flaticon-transportation'?'selected':'' }}>Airport Transfer</option>
        </select>
    </div>
    <br />
