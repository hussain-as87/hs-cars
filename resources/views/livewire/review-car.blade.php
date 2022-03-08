<div class="row" wire:polling>
    <div class="col-md-7">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#storeModel" data-placement="top" title="{{ __('edit') }}">
            {{ __('Create New Review') }} <i class="ion-ios-add"></i>
        </button>
        <hr>
        <h3 class="head">{{ $reviews_count }} {{ __('Reviews') }}</h3>

        @foreach($reviews as $key => $review)
        <div class="review d-flex">
            <img class="user-img" src="@if($review->user->profile->avatar){{asset('storage/users/avatar/'.$review->user->profile->avatar)}}
                                           @else https://ui-avatars.com/api/?name={{ $review->user->name }}@endif" />
            <div class="desc">
                <h4>
                    <span class="text-left">{{ $review->user->name }}</span>
                    <span class="text-right">{{ $review->created_at->format('d M Y') }}</span>
                </h4>
                <p class="star">
                    <span>
                        @for($i = 0; $i < $review->rating; $i++)
                            <i class="ion-ios-star text-primary"></i>
                            @endfor
                    </span>
                    <span class="text-right">{{-- <a href="#" class="reply"><i class="icon-reply"></i></a>  --}}
                        <button wire:click="destroyId({{ $review->id }})" data-toggle="modal" data-target="#deleteconfirm" type="button" class="nobu reply text-danger" data-toggle="tooltip" data-placement="top" title="{{ __('delete') }}" wire:click="destroy">
                            <i class="ion-ios-backspace"></i>
                        </button>
                        <!-- Button trigger modal -->
                       {{--   <button wire:click="updateId({{ $review->id }})" type="button" class="nobu reply text-primary" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="{{ __('edit') }}">
                            <i class="ion-ios-build"></i>
                        </button>  --}}
                    </span>
                </p>
                <p>{{ $review->review }}</p>
                </form>
            </div>
        </div>
        @endforeach
        @if($limit < $reviews_count)
        <button type="button" wire:click="loadMore()" class="btn btn-light">{{ __('more') }} <i class="ion-ios-arrow-down"></i></button>
        @elseif($limit > 3)
        <button type="button" wire:click="loadLess()" class="btn btn-light">{{ __('less') }} <i class="ion-ios-arrow-up"></i></button>
        @endif

        <!-- delete Modal -->
        <div wire:ignore.self class="modal fade" id="deleteconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('delete confirm') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('are you sure?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{ __('close') }}</button>
                        <button type="button" wire:click.prevent="destroy()" class="btn btn-danger close-modal" data-dismiss="modal">{{ __('yes') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- edit Modal -->
        {{--  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ ('ُEdit Review') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>@if($updateId != null)
                    <form wire.submit.prevent="update()">
                        <div class="modal-body">
                            @php
                            $re = App\Models\Review::find($updateId);
                            @endphp
                            <div class="form-group">
                                <label for="star1">
                                    <input hidden wire:model="rating" type="radio" id="star1" value="1" />
                                    <span class="@if($re->rating >= 1 ) text-primary @endif"><i class="ion-ios-star"></i></span>
                                </label>
                                <label for="star2">
                                    <input hidden wire:model="rating" type="radio" id="star2" value="2" />
                                    <span class="@if($re->rating >= 2 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                                <label for="star3">
                                    <input hidden wire:model="rating" type="radio" id="star3" value="3" />
                                    <span class="@if($re->rating >= 3 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                                <label for="star4">
                                    <input hidden wire:model="rating" type="radio" id="star4" value="4" />
                                    <span class="@if($re->rating >= 4 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                                <label for="star5">
                                    <input hidden wire:model="rating" type="radio" id="star5" value="5" />
                                    <span class="@if($re->rating >= 5 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                            </div>
                            <input type="hidden" wire:model="car_id" value="{{ $re->car_id }}">
                            <div class="form-group">
                                @error('comment')
                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                                <textarea wire:model="comment" class="form-control" placeholder="{{ __('Leave a comment') }}...">{{ $re->review }}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>  --}}
    </div>
    <div class="col-md-5">
        <div class="rating-wrap">
            <h3 class="head">{{ __('Give a Review') }}</h3>
            <div class="wrap">
                <p class="star">
                    <span>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        (98%)
                    </span>
                    <span>20 Reviews</span>
                </p>
                <p class="star">
                    <span>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        (85%)
                    </span>
                    <span>10 Reviews</span>
                </p>
                <p class="star">
                    <span>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        (70%)
                    </span>
                    <span>5 Reviews</span>
                </p>
                <p class="star">
                    <span>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        (10%)
                    </span>
                    <span>0 Reviews</span>
                </p>
                <p class="star">
                    <span>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        (0%)
                    </span>
                    <span>0 Reviews</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div wire:ignore.self class="modal fade" id="storeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Create New Review') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent="store()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="star1">
                                    <input hidden wire:model="rating" type="radio" id="star1" value="1" />
                                    <span class="@if($rating >= 1 ) text-primary @endif"><i class="ion-ios-star"></i></span>
                                </label>
                                <label for="star2">
                                    <input hidden wire:model="rating" type="radio" id="star2" value="2" />
                                    <span class=" @if($rating >= 2 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                                <label for="star3">
                                    <input hidden wire:model="rating" type="radio" id="star3" value="3" />
                                    <span class="@if($rating >= 3 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                                <label for="star4">
                                    <input hidden wire:model="rating" type="radio" id="star4" value="4" />
                                    <span class="@if($rating >= 4 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                                <label for="star5">
                                    <input hidden wire:model="rating" type="radio" id="star5" value="5" />
                                    <span class="@if($rating >= 5 ) text-primary @endif"><i class="ion-ios-star"></i>
                                    </span> </label>
                            </div>

                            <input type="hidden" wire:model="car_id" value="{{ $car->id }}">
                            <div class="form-group">
                                @error('review')
                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                                <textarea wire:model.lazy="comment" class="form-control" placeholder="{{ __('Leave a comment') }}..."></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
