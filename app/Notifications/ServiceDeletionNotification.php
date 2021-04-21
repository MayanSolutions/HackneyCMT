<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServiceDeletionNotification extends Notification
{
    use Queueable;

    private $user;
    private $matrixCategory;

    public function __construct($user, $matrixCategory)
    {
        $this->user = $user;
        $this->matrixCategory = $matrixCategory;

    }


    public function via($notifiable)
    {
        return ['mail', 'database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->line('System generated notification')
        ->line('Hi '. $this->user->name.'. The service'.$this->matrixCategory->category.' has been deleted to our system')
        ->line('If this service was allocated to a TMO it will be removed from their responsibility list.');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['The Service'.$this->matrixCategory->category.' has been deleted from our system. If this service had been applied to your TMO, it will be removed from the responsibilities list'],
            'url' => ['/matrixcategories/']
        ];
    }
}
