@extends('Admin.layout.app')
@section('title')
    {{ __('settings') }}
@endsection
@section('title-page')
    {{ __('settings') }}
@endsection
@section('content')

    <div class="card ">
        <div class="card-body">
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('value') }}</th>
                        <th width="280px">{{ __('actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($settings as $key => $setting)
                        <tr class="">
                            <td>{{ $setting->name }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>
                                <a class="btn btn-outline-warning"
                                   href="{{ route('settings.edit',$setting->id) }}">{{ __('edit') }} <i
                                        data-feather="edit-3" class="icon-sm mr-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
