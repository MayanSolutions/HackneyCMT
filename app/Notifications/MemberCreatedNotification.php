<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberCreatedNotification extends Notification
{
    use Queueable;

    private $user;
    private $members;
    private $client;

    public function __construct($user, $members, $client)
    {
        $this->user = $user;
        $this->members = $members;
        $this->client = $client;
    }


    public function via($notifiable)
    {
        return ['mail', 'database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Hello ' .$this->user->name)
                    ->line($this->members->elected_name.' has been added as a ' .$this->members->position.' for '.$this->client->client_organisation)
                    ->line('You have recieved this email because you are the liaison officer assigned to this TMO organisation')
                    ->action('View', url('/members/show/'. $this->client->id))
                    ->line('Thank you');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['A new board member, '.$this->members->elected_name.' has been registered for '. $this->client->client_organisation.' '],
            'url' => ['/members/show/'. $this->client->id]
        ];
    }
}
