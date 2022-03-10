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
                            <option value="mileage">{{__('mileage')}}</option>
                            <option value="transmission_type">{{__('transmission_type')}}</option>
                            <option value="seats">{{__('seats')}}</option>
                            <option value="luggage">{{__('luggage')}}</option>
                            <option value="fuel">{{__('fuel')}}</option>
                            <option value="created_at">{{__('created at')}}</option>
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
                            <th></th>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('user') }}</th>
                            <th>{{ __('description') }}</th>
                            <th>{{ __('mileage') }}</th>
                            <th>{{ __('transmission_type') }}</th>
                            <th>{{ __('seats') }}</th>
                            <th>{{ __('luggage') }}</th>
                            <th>{{ __('fuel') }}</th>
                            <th width="280px">{{ __('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $car)
                        <tr class="">
                            <td><img src="{{ asset('storage/cars/'.$car->image)}}" /> </td>
                            <td>{{ $car->name }}</td>
                            <td>{{ $car->user->name }}</td>
                            <td>{{ Str::limit($car->description,20) }}</td>
                            <td>{{ $car->mileage }}</td>
                            <td>{{ Str::limit($car->transmission_type,10) }}</td>
                            <td>{{ $car->seats }}</td>
                            <td>{{ $car->luggage }}</td>
                            <td>{{ Str::limit($car->fuel,10) }}</td>
                            <td><a class="btn btn-info" href="{{ route('cars.show',$car->id) }}">{{ __('show') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg></a>
                                @can('car-edit')
                                <a class="btn btn-secondary" href="{{ route('cars.edit',$car->id) }}">{{ __('edit') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a>
                                @endcan
                                @can('car-delete')
                                <a href="" class="btn btn-danger">
                                    <form action="{{ route('cars.destroy',$car->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="nobu" onclick="return confirm({{ __('are you sure?') }})">{{ __('delete') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button>
                                    </form>
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
            <div class="col-sm-12 col-md-5">{!! $data->render() !!}</div>
        </div>
    </div>
</div>
