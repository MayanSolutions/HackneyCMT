<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\clients;
use Illuminate\Support\Facades\Auth;

class Dashclients extends Component
{
    public $clients;

    public function mount()
    {
        $loggedInUser = Auth::user()->id;
        $getUserClients = clients::where('user_id', $loggedInUser)->get();
        $this->clients = $getUserClients;
    }

    public function render()
    {
        return view('livewire.dashclients');
    }
}
