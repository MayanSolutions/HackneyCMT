<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\UsersChangeNotification;
use App\Notifications\WelcomeEmailNotification;

class UserObserver
{

    public function created(User $user)
    {
        $user->notify(new WelcomeEmailNotification($user));
    }


    public function updated(User $user)
    {
        $user->notify(new UsersChangeNotification($user));
    }


    public function deleted(User $user)
    {
        //
    }


    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
