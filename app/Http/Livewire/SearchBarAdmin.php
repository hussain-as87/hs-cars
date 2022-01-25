<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchBarAdmin extends Component
{
    public $query;
    public $users;
    public $highlightIndex;

    public function mount()
    {
        $this->reset();
    }

    public function resetQuery()
    {
        $this->query = '';
        $this->users = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->users) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->users) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $user = $this->users[$this->highlightIndex] ?? null;
        if ($user) {
            $this->redirect(route('users.show', $user['id']));
        }
    }

    public function updatedQuery()
    {
        $this->users = User::search($this->query)
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.search-bar-admin');
    }
}
