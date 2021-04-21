<?php

namespace App\Observers;

use App\Models\Members;
use App\Models\clients;
use App\Models\User;
use App\Notifications\MemberCreatedNotification;
use App\Notifications\MemberUpdateNotification;

class MembersObserver
{

    public function created(Members $members)
    {
        $client = Members::where('id', $members->id)->first();
        $client = clients::where('id', $client->client_id)->first();
        $user = User::where('id', $client->user_id)->first();
        $user->notify(new MemberCreatedNotification($user, $members, $client));
    }


    public function updated(Members $members)
    {
        $client = Members::where('id', $members->id)->first();
        $client = clients::where('id', $client->client_id)->first();
        $user = User::where('id', $client->user_id)->first();
        $user->notify(new MemberUpdateNotification($user, $members, $client));
    }


    public function deleted(Members $members)
    {
        //
    }


    public function restored(Members $members)
    {
        //
    }


    public function forceDeleted(Members $members)
    {
        //
    }
}
