@extends('Admin.layout.app')
@section('title')
{{ __('services') }}
@endsection
@section('title-page')
{{ __('services') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title"> @can('service-create')
            <a class="btn btn-secondary" href="{{ route('services.create') }}">{{__('service-create')}} <i data-feather="plus" class="icon-sm mr-2"></i></a>
            @endcan</h4>
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('description') }}</th>
                        <th>{{ __('logo') }}</th>
                        <th width="280px">{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $key => $service)
                    <tr class="">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ Str::limit($service->description , 100) }}</td>
                        <td><span class="{{ $service->logo }}"></span></td>

                        <td>
                            @can('service-edit')
                            <a class="btn btn-secondary" href="{{ route('services.edit',$service->id) }}">{{ __('edit') }} <i data-feather="edit-3" class="icon-sm mr-2"></i></a>
                            @endcan
                            @can('service-delete')
                            <a href="" class="btn btn-danger">
                                <form action="{{ route('services.destroy',$service->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nobu" onclick="return confirm({{ __('are you sure?') }})">{{ __('delete') }} <i data-feather="trash" class="icon-sm mr-2"></i>
                                    </button>
                                </form>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <br />
<div class="d-flex flex-row-reverse">
    {{ $services->links() }}
</div>
@endsection
