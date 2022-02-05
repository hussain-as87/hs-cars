<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class DataTableCategories extends Component
{
    public $perPage = 10;
    public $search = '';
    public $orderAsc = true;
    public $orderBy = 'id';

    public function render(Request $request)
    {
        $data = Category::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view(
            'livewire.data-table-categories', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
