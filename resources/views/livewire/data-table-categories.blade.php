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
                            <th>{{ __('description') }}</th>
                            <th>{{ __('created at') }}</th>
                            <th width="280px">{{ __('actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $category)
                        <tr class="">
                            <td><img src="{{ asset('storage/categories/'.$category->logo)}}" /> </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>{{ Str::limit($category->description,20) }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td><a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">{{ __('show') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg></a>
                                @can('category-edit')
                                <a class="btn btn-secondary" href="{{ route('categories.edit',$category->id) }}">{{ __('edit') }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a>
                                @endcan
                                @can('category-delete')
                                <a href="" class="btn btn-danger">
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="post">
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
