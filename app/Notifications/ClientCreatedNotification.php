<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientCreatedNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new TMO Profile has been created')
                    ->line('To view this TMO registration, please click on the link below to access the TMO Profile')
                    ->action('Notification Action', url('/clients'));
                    }

    public function toArray($notifiable)
    {
        return [
            'notify' => ['A new TMO has been added to the system']
        ];
    }
}
