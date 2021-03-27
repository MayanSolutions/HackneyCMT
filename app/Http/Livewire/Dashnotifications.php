<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Http\Models\User;
use Illuminate\Support\Facades\Auth;

class Dashnotifications extends Component
{
    use WithPagination;

    public $notifications;
    public $countNotifications;

    protected $listener = ['read' => '$refresh'];

    public function read()
    {
        $notifications = auth()->user()->unreadNotifications;
        $notifications->markAsRead();
    }

    public function mount()
    {
        $userCountNotifications = auth()->user()->unreadNotifications->count();
        $this->countNotifications = $userCountNotifications;
        $userNotifications = auth()->user()->unreadNotifications;

        $this->notifications = $userNotifications;
    }

    public function render()
    {

        return view('livewire.dashnotifications');
    }
}
