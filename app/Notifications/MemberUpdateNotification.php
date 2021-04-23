<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberUpdateNotification extends Notification
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
        ->line($this->members->elected_name.' details have been changed on the system. The position registered on our system is currently '.$this->members->position.' for '.$this->client->client_organisation)
        ->line('You have recieved this email because you are the liaison officer assigned to this TMO organisation')
        ->action('View TMO', url('/members/show/'. $this->client->id))
        ->line('Thank you');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['The board member, '.$this->members->elected_name.', for '. $this->client->client_organisation.' has been updated'],
            'url' => ['/members/show/'. $this->client->id]
        ];
    }
}
