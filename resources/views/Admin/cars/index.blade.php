@extends('Admin.layout.app')
@section('title')
{{ __('cars') }}
@endsection
@section('title-page')
{{ __('cars') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title"> @can('car-create')
            <a class="btn btn-secondary" href="{{ route('cars.create') }}">{{__('car-create')}} <i data-feather="plus" class="icon-sm mr-2"></i></a>
            @endcan</h4>
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('id') }}</th>
                        <th>{{ __('name') }}</th>
                        <th width="280px">{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr class="">
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td><a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">{{ __('show') }} <i data-feather="columns" class="icon-sm mr-2"></i></a>
                            @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">{{ __('edit') }} <i data-feather="edit" class="icon-sm mr-2"></i></a>
                            @endcan
                            @can('role-delete')
                            <a href="" class="btn btn-danger">
                                <form action="{{ route('roles.destroy',$role->id) }}" method="post">
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
            </table>{!! $roles->render() !!}
        </div>
    </div>
</div>


@endsection
