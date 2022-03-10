<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class DataTableCarsTrashed extends Component
{
    public $perPage = 10;
    public $search = '';
    public $orderAsc = true;
    public $orderBy = 'id';

    public function render()
    {
        $data = Car::onlyTrashed()->search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.data-table-cars-trashed', compact('data'));
    }
}
