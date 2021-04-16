<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\clients;

class SystemNotices extends Component
{
    use WithPagination;

    public $systemCount;

    public function mount()
    {
        $countboard = clients::doesntHave('members')->where('user_id', auth()->user()->id)->count();
        $countestate = clients::doesntHave('EstateDetails')->where('user_id', auth()->user()->id)->count();
        $this->systemCount = $countboard + $countestate;
    }

    public function render()
    {
        return view('livewire.system-notices',
        ['clientboard' => clients::doesntHave('members')->where('user_id', auth()->user()->id)->get()],
        ['clientestate' =>clients::doesntHave('EstateDetails')->where('user_id', auth()->user()->id)->get()],
        );
    }
}
