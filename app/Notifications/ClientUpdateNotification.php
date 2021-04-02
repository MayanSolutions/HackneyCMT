<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientUpdateNotification extends Notification
{
    use Queueable;

    private $user;
    private $clients;

    public function __construct($user, $clients)
    {
        $this->user = $user;
        $this->clients = $clients;

    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->user->name)
                    ->line('The TMO profile for '. $this->clients->client_organisation .' has been updated')
                    ->line('You have recieved this notification because your are either an adminstrator or you have been assigned as the liaision officer responsible for this TMO')
                    ->action('View TMO', url('/clients/'. $this->clients->id));
    }

    public function toArray($notifiable)
    {
        return [
            'notify' => ['Your assigned TMO, '. $this->clients->client_organisation.' has been updated.'],
            'url' => ['/clients/'. $this->clients->id]
        ];
    }
}
