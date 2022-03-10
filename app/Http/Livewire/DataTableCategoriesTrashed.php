<?php

namespace App\Http\Livewire;

use App\Models\Admin\Category;
use Livewire\Component;

class DataTableCategoriesTrashed extends Component
{
    public $perPage = 10;
    public $search = '';
    public $orderAsc = true;
    public $orderBy = 'id';

    public function render()
    {
        $data = Category::onlyTrashed()->search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.data-table-categories-trashed', compact('data'));
    }
}

