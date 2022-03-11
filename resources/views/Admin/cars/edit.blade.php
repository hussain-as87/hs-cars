@extends('Admin.layout.app')
@section('title')
{{ __('car-edit') }}
@endsection
@section('title-page')
{{ __('car-edit') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('car-edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-outline-info" href="{{ route('cars.index') }}"> {{ __('Go Back') }} <i data-feather="arrow-left" class="icon-sm mr-2"></i></a>
                </div>
            </div>
        </div>
        <br />
        <form method="post" action="{{ route('cars.update',$car->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-3">
                    @if($car->image != null)
                    <img class="w-100" src="{{ asset('storage/cars/'.$car->image)}}" />
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
                        <input type="text" name="name[{{$key}}]" class="form-control @error('name.'.$key) is-invalid alert-danger @enderror" id="name" value="{!! old('name.'.$key,$car->getTranslation('name',$key)) ?? $car->name !!}" aria-describedby="emailHelp" placeholder="@error('name.'.$key){{$message}} @enderror">
                    </div>

                    <div class="form-group">
                        <label>{{ __('description') }}({{ __($val['name']) }})</label>
                        <textarea placeholder="@error('description.' . $key){{ $message }} @enderror" name="description[{{ $key }}]" class="form-control @error('description.'.$key) is-invalid alert-danger @enderror" rows="5">
                 {!! old('description.' . $key, $car->getTranslation('description', $key)) ?? $car->description !!}</textarea>
                    </div>
                </div>
                @endforeach
                {{--tab end--}}

                <div class="form-group">
                    <label>{{__('image')}}</label>
                    <input type="file" name="image" class="file-upload-default @error('image') is-invalid alert-danger @enderror">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="{{ __('Upload image') }}">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">{{ __('upload') }}</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mileage">{{__('mileage')}}</label>
                    <select id="mileage" name="mileage" class="form-control @error('mileage') is-invalid alert-danger @enderror">
                        <option value="10.000" {{ $car->mileage == '10.000' ? 'selected' : '' }}>10.000</option>
                        <option value="20.000" {{ $car->mileage == '20.000' ? 'selected' : '' }}>20.000</option>
                        <option value="30.000" {{ $car->mileage == '30.000' ? 'selected' : '' }}>30.000</option>
                        <option value="40.000" {{ $car->mileage == '40.000' ? 'selected' : '' }}>40.000</option>
                        <option value="50.000" {{ $car->mileage == '50.000' ? 'selected' : '' }}>50.000</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transmission_type">{{__('transmission_type')}}</label>
                    <select id="transmission_type" name="transmission_type" class="form-control @error('transmission_type') is-invalid alert-danger @enderror">
                        <option value="Manual transmission" {{ $car->transmission_type == 'Manual transmission' ? 'selected' : ''}}>{{ __('Manual transmission') }}</option>
                        <option value="Automatic transmission" {{ $car->transmission_type == 'Automatic transmission' ? 'selected' : ''}}>{{ __('Automatic transmission') }}</option>
                        <option value="Continuously variable transmission(CVT)" {{ $car->transmission_type == 'Continuously variable transmission (CVT)' ? 'selected' : ''}}>{{ __('Continuously variable transmission (CVT)') }}</option>
                        <option value="Semi-automatic and dual-clutch transmissions" {{ $car->transmission_type == 'Semi-automatic and dual-clutch transmissions' ? 'selected' : ''}}>{{ __('Semi-automatic and dual-clutch transmissions') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="seats">{{__('seats')}}</label>
                    <select id="seats" name="seats" class="form-control @error('seats') is-invalid alert-danger @enderror">
                        <option value="1" {{ $car->seats == '1'? 'selected' : '' }}>1</option>
                        <option value="2" {{ $car->seats == '2'? 'selected' : '' }}>2</option>
                        <option value="3" {{ $car->seats == '3'? 'selected' : '' }}>3</option>
                        <option value="4" {{ $car->seats == '4'? 'selected' : '' }}>4</option>
                        <option value="5" {{ $car->seats == '5'? 'selected' : '' }}>5</option>
                        <option value="6" {{ $car->seats == '6'? 'selected' : '' }}>6</option>
                        <option value="7" {{ $car->seats == '7'? 'selected' : '' }}>7</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="luggage">{{__('luggage')}}</label>
                    <select id="luggage" name="luggage" class="form-control @error('luggage') is-invalid alert-danger @enderror">
                        <option value="1" {{ $car->luggage == '1' ? 'selectd' : '' }}>1</option>
                        <option value="2" {{ $car->luggage == '2' ? 'selectd' : '' }}>2</option>
                        <option value="3" {{ $car->luggage == '3' ? 'selectd' : '' }}>3</option>
                        <option value="4" {{ $car->luggage == '4' ? 'selectd' : '' }}>4</option>
                        <option value="5" {{ $car->luggage == '5' ? 'selectd' : '' }}>5</option>
                        <option value="6" {{ $car->luggage == '6' ? 'selectd' : '' }}>6</option>
                        <option value="7" {{ $car->luggage == '7' ? 'selectd' : '' }}>7</option>
                        <option value="8" {{ $car->luggage == '8' ? 'selectd' : '' }}>8</option>
                        <option value="9" {{ $car->luggage == '9' ? 'selectd' : '' }}>9</option>
                        <option value="10" {{ $car->luggage == '10' ? 'selectd' : '' }}>10</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fuel">{{__('fuel')}}</label>
                    <select id="fuel" name="fuel" class="form-control @error('fuel') is-invalid alert-danger @enderror">
                        <option value="Petrol" {{ $car->fuel == 'Petrol' ? 'selectd' : '' }}>{{ __('Petrol') }}</option>
                        <option value="Diesel" {{ $car->fuel == 'Diesel' ? 'selectd' : '' }}>{{ __('Diesel') }}</option>
                        <option value="Alternative Fuels" {{ $car->fuel == 'Alternative Fuels' ? 'selectd' : '' }}>{{ __('Alternative Fuels') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_id">{{__('category')}}</label>
                    <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid alert-danger @enderror">
                        @foreach($categories as $key => $category)
                        <option value="{{ $category->id }}" {{ $category->id == $car->category_id ? 'selected' : '' }}>{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <h6>{{ __('price')}}</h6><br />

                <div class="row">
                    <div class="form-group col-4">
                        <label for="in_houre">{{__('in the houre')}}</label>
                        <input type="text" name="in_houre" value="{{ old('in_houre') ?? $car_pricing->in_houre }}" id="in_houre" class="form-control @error('in_houre') is-invalid alert-danger @enderror" /> </div>
                    <div class="form-group col-4">
                        <label for="in_day">{{__('in the day')}}</label>
                        <input type="text" name="in_day" value="{{ old('in_day') ?? $car_pricing->in_day }}" id="in_day" class="form-control @error('in_day') is-invalid alert-danger @enderror" /> </div>
                    <div class="form-group col-4">
                        <label for="in_month">{{__('in the month')}}</label>
                        <input type="text" name="in_month" value="{{ old('in_month') ?? $car_pricing->in_month }}" id="in_month" class="form-control @error('in_month') is-invalid alert-danger @enderror" /> </div>
                </div>
            </div>
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    {{ __('car details') }} <i data-feather="corner-right-down" class="icon-sm mr-2"></i>
                </button></div>
            <br />
            <div class="collapse" id="collapseExample">
                <div class="row">
                    <div class="form-group col-3">
                        <label for="air_conditions">{{__('air_conditions')}}</label>
                        <select id="air_conditions" name="air_conditions" class="form-control @error('air_conditions') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->air_conditions == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="child_seat">{{__('child_seat')}}</label>
                        <select id="child_seat" name="child_seat" class="form-control @error('child_seat') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->child_seat == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="gps">{{__('gps')}}</label>
                        <select id="gps" name="gps" class="form-control @error('gps') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->gps == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="luggage">{{__('luggage')}}</label>
                        <select id="luggage" name="luggage" class="form-control @error('luggage') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->luggage == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="music">{{__('music')}}</label>
                        <select id="music" name="music" class="form-control @error('music') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->music == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="seat_beit">{{__('seat_beit')}}</label>
                        <select id="seat_beit" name="seat_beit" class="form-control @error('seat_beit') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->seat_beit == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="sleeping_bed">{{__('sleeping_bed')}}</label>
                        <select id="sleeping_bed" name="sleeping_bed" class="form-control @error('sleeping_bed') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->sleeping_bed == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="water">{{__('water')}}</label>
                        <select id="water" name="water" class="form-control @error('water') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->water == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="bluetooth">{{__('bluetooth')}}</label>
                        <select id="bluetooth" name="bluetooth" class="form-control @error('bluetooth') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->bluetooth == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="onboard_computer">{{__('onboard_computer')}}</label>
                        <select id="onboard_computer" name="onboard_computer" class="form-control @error('onboard_computer') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->onboard_computer == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="audio_input">{{__('audio_input')}}</label>
                        <select id="audio_input" name="audio_input" class="form-control @error('audio_input') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->audio_input == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="long_term_trips">{{__('long_term_trips')}}</label>
                        <select id="long_term_trips" name="long_term_trips" class="form-control @error('long_term_trips') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->long_term_trips == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="car_kit">{{__('car_kit')}}</label>
                        <select id="car_kit" name="car_kit" class="form-control @error('car_kit') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->car_kit == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="remote_central_locking">{{__('remote_central_locking')}}</label>
                        <select id="remote_central_locking" name="remote_central_locking" class="form-control @error('remote_central_locking') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->remote_central_locking == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="climate_control">{{__('climate_control')}}</label>
                        <select id="climate_control" name="climate_control" class="form-control @error('climate_control') is-invalid alert-danger @enderror">
                            <option value="0">{{ __('false') }}</option>
                            <option value="1" {{ $car_features->climate_control == '1'  ? 'selected':'' }}>{{ __('true') }}</option>
                        </select>
                    </div>
                    <br />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-outline-primary">{{ __('Submit') }} <i data-feather="save" class="icon-sm mr-2"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
