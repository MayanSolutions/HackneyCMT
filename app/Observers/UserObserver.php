<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\UsersChangeNotification;
use App\Notifications\WelcomeEmailNotification;
use App\Notifications\UserDeletionNotification;

class UserObserver
{

    public function created(User $user)
    {
        $user->notify(new WelcomeEmailNotification($user));
    }


    public function updated(User $user)
    {
        if($user->isDirty(['last_login', 'last_login_ip'])){
            return
            [
                'last_login' == false,
                'last_login_ip' == false
            ];
        }

        $user->notify(new UsersChangeNotification($user));
    }


    public function deleted(User $user)

    
    {
        $user->notify(new UserDeletionNotification($user));

        $useradmins = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();

        foreach($useradmins as $useradmin)
        {
            $useradmin->notify(new UserDeletionNotification($user));
        }


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
