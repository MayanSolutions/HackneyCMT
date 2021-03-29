<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\clients;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Dashclients extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.dashclients',
    ['clients'=>clients::with('members')->with('EstateDetails')->where('user_id', auth()->user()->id )->paginate(3)]);
    }
}
