<?php

namespace App\Observers;


use App\Models\MatrixFunction;
use App\Models\User;
use App\Notifications\FunctionCreationNotification;
use App\Notifications\FunctionDeletionNotification;

class FunctionObserver
{

    public function created(MatrixFunction $matrixFunction)
    {
        $users = User::get();

        foreach($users as $user)
        {
            $user->notify(new FunctionCreationNotification($user, $matrixFunction));
        }
    }


    public function updated(MatrixFunction $matrixFunction)
    {

    }

    public function deleted(MatrixFunction $matrixFunction)
    {
        $users = User::get();

        foreach($users as $user)
        {
            $user->notify(new FunctionDeletionNotification($user, $matrixFunction));
        }
    }


    public function restored(MatrixFunction $matrixFunction)
    {
        //
    }


    public function forceDeleted(MatrixFunction $matrixFunction)
    {
        //
    }
}
