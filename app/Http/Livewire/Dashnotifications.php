<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Http\Models\User;
use Illuminate\Support\Facades\Auth;

class Dashnotifications extends Component
{
    use WithPagination;

    protected $listener = ['read' => '$refresh'];

    public function read()
    {
        $notifications = auth()->user()->unreadNotifications;
        $notifications->markAsRead();
    }

    public function render()
    {
        return view('livewire.dashnotifications',
        ['notifications'=>auth()->user()->unreadNotifications()->paginate(3)],
        ['countNotifications'=>Auth::user()->unreadNotifications()->count()]);
    }
}
