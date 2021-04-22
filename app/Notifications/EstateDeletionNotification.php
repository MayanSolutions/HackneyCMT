<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EstateDeletionNotification extends Notification
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
                    ->line('Oops, the estate registered against '.$this->client->client_organisation.' has been deleted from our system ')
                    ->line('As the system is reliant on the existance of an estate for each TMO, the system will generate a system alert which will be assigned to the liaison officer or a system admin')
                    ->line('The current assigned liasion for '.$this->client->client_organisation.' will now be prompted with an alert on the next login.')
                    ->action('View TMO Estates', url('/estatedetails/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'notify' => ['The estate registered against '. $this->client->client_organisation.' has been deleted'],
            'url' => ['/estatedetails/']
        ];
    }
}
