

<!-- Modal -->
<div class="modal fade" {{--  wire:ignore.self  --}} id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('edit post') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form enctype="multipart/form-data" method="POST" action="{{ route('posts.update',$post->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-0 row">
                          <div class="col-lg-3">
                              <label for="description" class="col-form-label">{{__('description')}}</label>
                          </div>
                          <div class="col-lg-8">
                              <textarea id="description" name="description" class="form-control" maxlength="500" rows="8">
                              {{ $post->description }} </textarea>
                              @error('description')
                              <small class="text-danger-muted">{{$message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group mb-0 row">
                          <div class="col-lg-3">
                              <label for="photo" class="col-form-label">{{__('photos')}}</label>
                          </div>
                          <div class="col-lg-8">
                              @if($post->photo != null)
                              <img wire:poll src="{{ asset('storage/posts/photos/'.$post->photo) }}" alt="" width="320">
                              @endif
                              <input name="photo" class="form-control" id="photo" type="file">
                              @error('photo')
                              <small class="text-danger-muted">{{$message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group mb-0 row">
                          <div class="col-lg-3">
                              <label for="video" class="col-form-label">{{__('VIDEO')}}</label>
                          </div>
                          <div class="col-lg-8">
                              @if($post->video != null)
                              <video wire:poll src="{{ asset('storage/posts/videos/'.$post->video) }}" width="320"></video>
                              @endif
                              <input name="video" class="form-control" id="video" type="file">
                              @error('video')<small class="text-danger-muted">{{$message}}</small>@enderror
                          </div>
                      </div>
      </div>
      <div class="modal-footer">
                         {{-- <button wire:click="delete({{ $post->id }})" class="btn btn-danger" onclick="confirm({{ __("are you sure ?") }})">
                      <i data-feather="trash" class="icon-sm mr-2"></i>{{ __('delete') }}
                      </button> --}}
                      <button class="btn btn-primary">
                          <i data-feather="edit-2" class="icon-sm mr-2"></i>{{__('edit')}}
                      </button>
      </div>
                      </form>

    </div>
  </div>
</div>

