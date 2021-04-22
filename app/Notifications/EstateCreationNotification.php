<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstateCreationNotification extends Notification
{
    use Queueable;

    private $user;
    private $estateDetail;
    private $client;

    public function __construct($user, $estateDetail, $client)
    {
        $this->user = $user;
        $this->estate = $estateDetail;
        $this->client = $client;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('System generated notification')
                    ->line('Hi '.$this->user->name)
                    ->line('A new estate has been created on the system for '.$this->client->client_organisation)
                    ->action('View Estate', url('/estatedetails/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'notify' => ['A new estate has been created for '. $this->client->client_organisation],
            'url' => ['/estatedetails/']
        ];
    }
}
