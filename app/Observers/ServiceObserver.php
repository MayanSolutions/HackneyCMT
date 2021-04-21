<?php

namespace App\Observers;

use App\Models\MatrixCategory;
use App\Models\User;
use App\Notifications\ServiceCreationNotification;
use App\Notifications\ServiceChangeNotification;
use App\Notifications\ServiceDeletionNotification;

class ServiceObserver
{

    public function created(MatrixCategory $matrixCategory)
    {
        $users = User::get();

        foreach($users as $user)
        {
            $user->notify(new ServiceCreationNotification($user, $matrixCategory));
        }
    }


    public function updated(MatrixCategory $matrixCategory)
    {
        $users = User::get();

        foreach($users as $user)
        {
            $user->notify(new ServiceChangeNotification($user, $matrixCategory));
        }
    }


    public function deleted(MatrixCategory $matrixCategory)
    {
        $users = User::get();

        foreach($users as $user)
        {
            $user->notify(new ServiceDeletionNotification($user, $matrixCategory));
        }
    }


    public function restored(MatrixCategory $matrixCategory)
    {
        //
    }


    public function forceDeleted(MatrixCategory $matrixCategory)
    {
        //
    }
}
