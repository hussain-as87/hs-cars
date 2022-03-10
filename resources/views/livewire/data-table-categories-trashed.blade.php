<div class="table-responsive">
    <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="dataTableExample_length"><label>{{__('show')}}
                        <select name="dataTableExample_length" aria-controls="dataTableExample" wire:model="perPage" class="custom-select custom-select-sm form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select></label></div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="dataTables_length" id="sort_by">
                    <p>{{__('order by')}}
                        <select wire:model="orderBy" name="perPage" id="sort_by" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="id">{{__('id')}}</option>
                            <option value="name">{{__('name')}}</option>
                            <option value="created_at">{{__('created at')}}</option>
                            <option value="updated_at">{{__('updated at')}}</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="dataTables_filter" id="sort">
                    <p>{{__('sort type')}}
                        <select id="sort" wire:model="orderAsc" name="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="1">{{__('Ascending')}}</option>
                            <option value="0">{{__('Descending')}}</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="dataTableExample_filter" class="dataTables_filter"><label><input wire:model.debounce.300ms="search" type="search" class="form-control" placeholder="{{__('Search Here')}}" aria-controls="dataTableExample"></label></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="dataTableExample" class="table dataTable no-footer" role="grid" aria-describedby="dataTableExample_info">
                    <thead>
                    <tr>
                        <th>{{ __('logo') }}</th>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('user') }}</th>
                        <th>{{ __('cars') }}</th>
                        <th>{{ __('description') }}</th>
                        <th>{{ __('created at') }}</th>
                        <th width="280px">{{ __('actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $key => $category)
                        @php
                            $car_count = App\Models\Car::whereBelongsTo($category)->count();
                        @endphp
                        <tr class="">
                            <td><img src="{{ asset('storage/categories/'.$category->logo)}}" /> </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>{{ $car_count == 0 ? __('not yet!'): $car_count }}</td>
                            <td>{{ Str::limit($category->description,20) }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>@can('category-trash')
                                    <a class="btn btn-info"
                                       href="{{ route('categories.restore',$category->id) }}">{{ __('restore') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path
                                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd"
                                                  d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                        </svg>
                                    </a>

                                    <a class="btn btn-danger"
                                       href="{{ route('categories.forceDelete',$category->id) }}">{{ __('final delete') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">{{$data->links()}}</div>
        </div>
    </div>
</div>
