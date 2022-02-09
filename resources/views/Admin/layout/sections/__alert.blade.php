@if (count($errors) > 0 || $message = Session::get('error'))
<div class="alert alert-fill-danger">
    <i data-feather="alert-circle"></i>
    <strong>{{ __('Whoops') }}!</strong> {{ __('There were some problems with your input') }}.<br><br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@elseif($message = Session::get('success'))
<div class="alert alert-fill-success col-12" role="alert">
    <i data-feather="check-circle"></i>
    <strong>{{ __('Successfully') }}!</strong> {{ __($message) }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif($message = Session::get('delete'))
<div class="alert alert-fill-danger col-12" role="alert">
    <i data-feather="x-circle"></i>
    <strong>{{ __('Successfully') }}!</strong> {{ __($message) }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
