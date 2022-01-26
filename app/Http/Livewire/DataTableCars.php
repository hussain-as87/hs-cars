<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;
use Illuminate\Http\Request;

class DataTableCars extends Component
{
    public $perPage = 10;
    public $search = '';
    public $orderAsc = true;
    public $orderBy = 'id';

    public function render(Request $request)
    {
        $data = Car::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.data-table-cars', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
