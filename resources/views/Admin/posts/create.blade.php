<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('create new post') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="description" class="col-form-label">{{__('description')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid alert-danger @enderror" maxlength="500" rows="8" placeholder="{{__('This textarea has a limit of 500 chars.')}}"></textarea>
                            @error('description')<small class="text-danger-muted">{{$message}}</small>@enderror
                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="photo" class="col-form-label">{{__('photos')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="photo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info  @error('photo') is-invalid alert-danger @enderror" disabled="" placeholder="{{ __('Upload photo') }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">{{ __('upload') }}</button>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="video" class="col-form-label">{{__('VIDEO')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="video" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info  @error('video') is-invalid alert-danger @enderror" disabled="" placeholder="{{ __('Upload video') }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">{{ __('upload') }}</button>
                                </span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary"><i data-feather="plus" class="icon-sm mr-2"></i> {{__('create')}}</button>
            </div>
            </form>

        </div>
    </div>
</div>
