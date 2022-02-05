<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Car;

class DataTableSingleCategory extends Component
{
    public $category;
    public $perPage = 10;
    public $search = '';
    public $orderAsc = true;
    public $orderBy = 'id';

    public function mount(Category $category)
    {
        $this->category = $category;
    }
    public function render(Request $request)
    {
        $data = Car::where('category_id',$this->category->id)->search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.data-table-single-category', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
