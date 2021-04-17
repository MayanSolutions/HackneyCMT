<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\clients;
use App\Models\User;

class SystemNotices extends Component
{
    use WithPagination;

    public $systemCount;

    public function mount()
    {
        $countboard = clients::doesntHave('members')->where('user_id', auth()->user()->id)->count();
        $countliaison = clients::where('user_id', Null)->count();
        $countestate = clients::doesntHave('EstateDetails')->where('user_id', auth()->user()->id)->count();
        $expiringboard = clients::where('user_id', auth()->user()->id)->whereHas('members', function ($query)
        {
            $query->whereBetween('position_exp_date', [now()->subDays(7), now()]);
        })->count();
        $countfunctions = clients::doesntHave('functions')->where('user_id', auth()->user()->id)->count();

        $this->systemCount = $countboard + $countestate + $countliaison + $expiringboard + $countfunctions;
    }

    public function render()
    {
        return view('livewire.system-notices',
        [
            'clientboard' => clients::doesntHave('members')->where('user_id', auth()->user()->id)->get(),
            'clientestate' => clients::doesntHave('EstateDetails')->where('user_id', auth()->user()->id)->get(),
            'liaison' => clients::where('user_id', Null)->get(),
            'expiringboard' => clients::where('user_id', auth()->user()->id)->whereHas('members', function ($query)
            {
                $query->whereBetween('position_exp_date', [now()->subDays(7), now()]);
            })->get(),
            'clientfunctions' => clients::doesntHave('functions')->where('user_id', auth()->user()->id)->get(),
        ]
    );
    }
}
