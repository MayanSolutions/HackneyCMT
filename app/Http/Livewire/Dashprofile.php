<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Dashprofile extends Component
{
    public $user;

    public function mount()
    {
        $findUser = User::where('id', auth()->user()->id)->first();

        $this->user = $findUser;

    }

    public function render()
    {
        return view('livewire.dashprofile');
    }
}
