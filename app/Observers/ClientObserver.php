<?php

namespace App\Observers;

use App\Models\clients;
use App\Models\User;
use App\Notifications\ClientCreatedNotification;
use App\Notifications\ClientUpdateNotification;

class ClientObserver
{

    public function __construct()
    {

    }

    public function created(clients $clients)
    {
        $checkLiaison = User::where('id', $clients->user_id)->first();

        if($checkLiaison != Null)
        {
                $user = $checkLiaison;
                $user->notify(new ClientCreatedNotification($user, $clients));
        }
        else
        {
                $user = User::whereHas('roles', function ($query) {
                    $query->where('id', 1);
                })->get();

                foreach($user as $user)
                {
                    $user->notify(new ClientCreatedNotification($user, $clients));
                }
        }
    }


    public function updated(clients $clients)
    {
        $checkLiaison = User::where('id', $clients->user_id)->first();

        if($checkLiaison != Null)
        {
                $user = $checkLiaison;
                $user->notify(new ClientUpdateNotification($user, $clients));
        }
        else
        {
                $user = User::whereHas('roles', function ($query) {
                    $query->where('id', 1);
                })->get();

                foreach($user as $user)
                {
                    $user->notify(new ClientUpdateNotification($user, $clients));
                }
        }
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
