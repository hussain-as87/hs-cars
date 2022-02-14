@extends('Admin.layout.app')
@section('title')
{{ __('rents') }}
@endsection
@section('title-page')
{{ __('rents') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('user') }}</th>
                        <th>{{ __('car') }}</th>
                        <th>{{ __('Pick-up location') }}</th>
                        <th>{{ __('Drop-off location') }}</th>
                        <th>{{ __('Pick-up date') }}</th>
                        <th>{{ __('Drop-off date') }}</th>
                        <th>{{ __('Pick-up time') }}</th>
                        <th>{{ __('created at') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($rents as $key => $rent)
                        <tr class="">
                            <td>{{ $rent->user->name }}</td>
                            <td>{{ $rent->car->name }}</td>
                            <td>{{ $rent->location }}</td>
                            <td>{{ $rent->drop_off_location }}</td>
                            <td>{{ $rent->pik_up_date }}</td>
                            <td>{{ $rent->drop_off_date }}</td>
                            <td>{{ $rent->pik_up_time }}</td>
                            <td>{{ $rent->created_at->diffForHumans() }}</td>
                            <td>
                                @can('rents-delete')
                                <a href="" class="btn btn-danger">
                                    <form action="{{ route('rent.destroy',$rent->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="nobu" onclick="return confirm({{ __('are you sure?') }})">{{ __('delete') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                </a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>{{ $rents->links() }}
        </div>
    </div>
</div>
@endsection
