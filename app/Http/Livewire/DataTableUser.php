<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class DataTableUser extends Component
{
    public $perPage = 10;
    public $search = '';
    public $orderAsc = true;
    public $orderBy = 'id';

    public function render(Request $request)
    {
        $data = User::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')->where('email', '!=', auth()->user()->email)
            ->paginate($this->perPage);
        return view('livewire.data-table-user', compact('data'));
    }
}
