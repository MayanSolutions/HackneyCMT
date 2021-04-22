<?php

namespace App\Observers;

use App\Models\EstateDetail;
use App\Models\clients;
use App\Models\User;
use App\Notifications\EstateCreationNotification;
use App\Notifications\EstateUpdateNotification;
use App\Notifications\EstateDeletionNotification;

class EstateObserver
{

    public function created(EstateDetail $estateDetail)
    {
        $users = User::get();
        $client = clients::where('id', $estateDetail->client_id)->first();

        foreach($users as $user)
        {
            $user->notify(new EstateCreationNotification($user, $estateDetail, $client));
        }
    }


    public function updated(EstateDetail $estateDetail)
    {
        $users = User::get();
        $client = clients::where('id', $estateDetail->client_id)->first();

        foreach($users as $user)
        {
            $user->notify(new EstateUpdateNotification($user, $estateDetail, $client));
        }
    }


    public function deleted(EstateDetail $estateDetail)
    {
        $users = User::get();
        $client = clients::where('id', $estateDetail->client_id)->first();

        foreach($users as $user)
        {
            $user->notify(new EstateDeletionNotification($user, $estateDetail, $client));
        }
    }


    public function restored(EstateDetail $estateDetail)
    {
        //
    }


    public function forceDeleted(EstateDetail $estateDetail)
    {
        //
    }
}
