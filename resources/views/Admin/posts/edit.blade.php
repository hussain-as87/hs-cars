<!-- Modal -->
<div class="modal fade" {{--  wire:ignore.self  --}} id="updateModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('edit post') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="description" class="col-form-label">{{__('description')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea id="description" name="description"
                                      class="form-control @error('description') is-invalid alert-danger @enderror"
                                      maxlength="500" rows="8">
                            {{ $post->description }} </textarea>
                            @error('description')
                            <small class="text-danger-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="photo" class="col-form-label">{{__('image')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="photo"
                                   class="file-upload-default @error('photo') is-invalid alert-danger @enderror">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info  " disabled=""
                                       placeholder="{{ __('Upload image') }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary"
                                            type="button">{{ __('upload') }}</button>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-lg-3">
                            <label for="video" class="col-form-label">{{__('VIDEO')}}</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="video"
                                   class="file-upload-default @error('video') is-invalid alert-danger @enderror">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled=""
                                       placeholder="{{ __('Upload video') }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary"
                                            type="button">{{ __('upload') }}</button>
                                </span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                {{-- <button wire:click="delete({{ $post->id }})" class="btn btn-danger" onclick="confirm({{ __("are you sure ?") }})">
                <i data-feather="trash" class="icon-sm mr-2"></i>{{ __('delete') }}
                </button> --}}
                <button class="btn btn-outline-primary">
                    <i data-feather="edit-2" class="icon-sm mr-2"></i>{{__('edit')}}
                </button>
            </div>
            </form>

        </div>
    </div>
</div>
