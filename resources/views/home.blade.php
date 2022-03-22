@extends('Admin.layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-down" id="app">
                    {{-- {{ dd(ini_get('post_max_size')) }} --}}
                    {{-- {{ dd(config('settings.timezone')) }}
                    --}}
                    <example-app/>
                </div>
            </div>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
@endsection
