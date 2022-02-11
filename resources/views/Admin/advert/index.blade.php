@extends('Admin.layout.app')
@section('title')
{{ __('advert') }}
@endsection
@section('title-page')
{{ __('advert') }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{-- @can('advert-edit')  --}}
            <a class="btn btn-secondary" href="{{ route('advert.edit') }}">{{ __('edit') }} <i data-feather="edit-3" class="icon-sm mr-2"></i></a>
            {{-- @endcan  --}}</h4>
        <div class="table-responsive pt-3">
            <div class="row col-12">
                <div class="col-7">{{ $advert->description }}</div>
                <div class="col-5"><img style="width:400px" src="{{ asset('storage/advert/'.$advert->image) }}" /></div>
            </div>
            <br />
            <div class="row col-12">
                <div class="embed-responsive embed-responsive-16by9">
                    {!! $advert->video_html !!}
                </div>
            </div>
        </div>
    </div>
</div> <br />
@endsection
