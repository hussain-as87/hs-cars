<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Admin\Profile;
use Livewire\WithFileUploads;

class ImageProfile extends Component
{
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.image-profile');
    }

}
