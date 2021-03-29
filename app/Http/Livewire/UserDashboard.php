<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DashOrder;

class UserDashboard extends Component
{

    public $dashboard;

    public function mount()
    {
        $config = DashOrder::where('user_id', auth()->user()->id)->get();
        $this->dashboard = $config;
    }
    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
