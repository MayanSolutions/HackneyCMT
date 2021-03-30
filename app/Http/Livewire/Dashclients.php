<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\clients;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Dashclients extends Component
{
    use WithPagination;

    public $clients;

    public function mount()
    {
        $loggedInUser = Auth::user()->id;
        $getclients = clients::where('user_id', $loggedInUser)->with('members')->get();
        $this->clients = $getclients;
    }

    public function render()
    {
        return view('livewire.dashclients');
    }
}
