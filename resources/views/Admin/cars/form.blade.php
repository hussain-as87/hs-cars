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
            <input type="text" name="name[{{$key}}]" class="form-control @error('name.'.$key) is-invalid alert-danger @enderror" id="name" value="{!! old('name.'.$key,$car->getTranslation('name',$key)) ?? $car->name !!}" aria-describedby="emailHelp" placeholder="@error('name.'.$key){{$message}} @enderror">
        </div>

        <div class="form-group">
            <label>{{ __('description') }}({{ __($val['name']) }})</label>
            <textarea placeholder="@error('description.' . $key){{ $message }} @enderror" name="description[{{ $key }}]" class="form-control" rows="5">
                 {!! old('description.' . $key, $car->getTranslation('description', $key)) ?? $car->description !!}</textarea>
        </div>
    </div>
    @endforeach
    {{--tab end--}}
    <div class="form-group">
        <label for="image">{{__('image')}}</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid alert-danger @enderror" id="image">
    </div>
    <div class="form-group">
        <label for="mileage">{{__('mileage')}}</label>
        <select id="mileage" class="form-control" name="mileage" class="form-control @error('mileage') is-invalid alert-danger @enderror">
            <option value="10.000">10.000</option>
            <option value="20.000">20.000</option>
            <option value="30.000">30.000</option>
            <option value="40.000">40.000</option>
            <option value="50.000">50.000</option>
        </select>
    </div>
    <div class="form-group">
        <label for="transmission_type">{{__('transmission')}}</label>
        <select id="transmission_type" class="form-control" name="transmission_type" class="form-control @error('transmission_type') is-invalid alert-danger @enderror">
            <option>{{ __('Manual transmission') }}</option>
            <option>{{ __('Automatic transmission') }}</option>
            <option>{{ __('Continuously variable transmission (CVT)') }}</option>
            <option>{{ __('Semi-automatic and dual-clutch transmissions') }}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="seats">{{__('seats Adults')}}</label>
        <select id="seats" class="form-control" name="seats" class="form-control @error('seats') is-invalid alert-danger @enderror">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
    </div>
    <div class="form-group">
        <label for="luggage">{{__('luggage')}}</label>
        <select id="luggage" class="form-control" name="luggage" class="form-control @error('luggage') is-invalid alert-danger @enderror">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fuel">{{__('fuel')}}</label>
        <select id="fuel" class="form-control" name="fuel" class="form-control @error('fuel') is-invalid alert-danger @enderror">
            <option>{{ __('Petrol') }}</option>
            <option>{{ __('Diesel') }}</option>
            <option>{{ __('Alternative Fuels') }}</option>
        </select>
    </div>
</div>
<br />
