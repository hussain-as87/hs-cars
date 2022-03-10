<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DataTableUsersTrashed extends Component
{
    public $perPage = 10;
    public $search = '';
    public $orderAsc = true;
    public $orderBy = 'id';

    public function render()
    {
        $data = User::onlyTrashed()->search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')->where('email', '!=', auth()->user()->email)
            ->paginate($this->perPage);
        return view('livewire.data-table-users-trashed', compact('data'));
    }
}
