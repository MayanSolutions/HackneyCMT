<?php

namespace App\Observers;

use App\Models\clients;
use App\Models\User;
use App\Notifications\ClientCreatedNotification;

class ClientObserver
{
    private $admins;

    public function __construct(clients $clients)
    {
        $this->admins = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();
    }

    public function created(clients $clients)
    {
        foreach($this->admins as $admin){
            $admin->notify(new ClientCreatedNotification);
        }

        $user = User::where('id', $clients->user_id)->first();
        $user->notify(new ClientCreatedNotification($clients));
    }

    /**
     * Handle the clients "updated" event.
     *
     * @param  \App\Models\clients  $clients
     * @return void
     */
    public function updated(clients $clients, $admins, $user)
    {

    }

    /**
     * Handle the clients "deleted" event.
     *
     * @param  \App\Models\clients  $clients
     * @return void
     */
    public function deleted(clients $clients)
    {
        //
    }

    /**
     * Handle the clients "restored" event.
     *
     * @param  \App\Models\clients  $clients
     * @return void
     */
    public function restored(clients $clients)
    {
        //
    }

    /**
     * Handle the clients "force deleted" event.
     *
     * @param  \App\Models\clients  $clients
     * @return void
     */
    public function forceDeleted(clients $clients)
    {
        //
    }
}
