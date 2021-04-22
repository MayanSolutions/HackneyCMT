<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstateUpdateNotification extends Notification
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
                    ->line('The estate registered against '.$this->client->client_organisation.' has been updated on our system ')
                    ->action('View Estate', url('/estatedetails/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'notify' => ['The estate registered against '. $this->client->client_organisation.' has been updated'],
            'url' => ['/estatedetails/']
        ];
    }
}
