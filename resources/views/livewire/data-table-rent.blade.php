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
                            <th>{{ __('user') }}</th>
                            <th>{{ __('car') }}</th>
                            <th>{{ __('Pick-up location') }}</th>
                            <th>{{ __('Drop-off location') }}</th>
                            <th>{{ __('Pick-up date') }}</th>
                            <th>{{ __('Drop-off date') }}</th>
                            <th>{{ __('Pick-up time') }}</th>
                            <th>{{ __('created at') }}</th>
                            <th width="280px">{{ __('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $rent)
                        <tr class="">
                            <td>{{ $rent->user->name }}</td>
                            <td>{{ $rent->car->name }}</td>
                            <td>{{ $rent->location }}</td>
                            <td>{{ $rent->drop_off_location }}</td>
                            <td>{{ $rent->pik_up_date }}</td>
                            <td>{{ $rent->drop_off_date }}</td>
                            <td>{{ $rent->pik_up_time }}</td>
                            <td>{{ $rent->created_at->diffForHumans() }}</td>
                            <td>
                                @can('rents')
                                <a href="" class="btn btn-danger">
                                    <form action="{{ route('rent.destroy',$rent->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="nobu" onclick="return confirm({{ __('are you sure?') }})">{{ __('delete') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
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
                {!! $data->render() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">{!! $data->render() !!}</div>
        </div>
    </div>
</div>
