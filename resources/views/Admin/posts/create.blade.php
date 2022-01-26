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
         <form enctype="multipart/form-data" method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="description" class="col-form-label">{{__('description')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea id="description" name="description" class="form-control" maxlength="500" rows="8" placeholder="{{__('This textarea has a limit of 500 chars.')}}"></textarea>
                            @error('description')<small class="text-danger-muted">{{$message}}</small>@enderror
                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="photo" class="col-form-label">{{__('photos')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="photo" class="form-control" id="photo" type="file">
                            @error('photo')<small class="text-danger-muted">{{$message}}</small>@enderror

                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="video" class="col-form-label">{{__('VIDEO')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <input name="video" class="form-control" id="video" type="file">
                            @error('video')<small class="text-danger-muted">{{$message}}</small>@enderror

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

