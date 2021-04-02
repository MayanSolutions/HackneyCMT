<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\clients;

class ClientCreatedNotification extends Notification
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
                    ->line('A new TMO '. $this->clients->client_organisation .' has been created on the system')
                    ->line('You have recieved this notification because you are either an adminstrator or you have been assigned as the liaision officer responsible for this TMO')
                    ->action('View TMO', url('/clients/'. $this->clients->id));
    }

    public function toArray($notifiable)
    {
        return [
            'notify' => ['The organisation, '. $this->clients->client_organisation.' has been created on the system and assigned to you'],
            'url' => ['/clients/'. $this->clients->id]
        ];
    }
}
