@extends('Admin.layout.app')
@section('title')
{{ __('contacts') }}
@endsection
@section('title-page')
{{ __('contacts') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('id') }}</th>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('email') }}</th>
                        <th>{{ __('subject') }}</th>
                        <th>{{ __('message') }}</th>
                        <th>{{ __('created at') }}</th>
                        <th>{{ __('actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $key => $contact)
                    <tr class="">
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ Str::limit($contact->message , 250) }}</td>
                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                        <td>
                            @can('contact-delete')
                            <a href="" class="btn btn-danger">
                                <form action="{{ route('contacts.destroy',$contact->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nobu" noclick="return confirm({{ __('are you sure?') }})">{{ __('delete') }} <i data-feather="trash" class="icon-sm mr-2"></i>
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
