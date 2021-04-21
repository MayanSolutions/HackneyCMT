<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServiceCreationNotification extends Notification
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
        ->line('Hi '. $this->user->name.'. A new service has been added to our system')
        ->line($this->matrixCategory->category.' has been added. If this applies to a TMO, please ensure the Liaison Officer or admin is aware.');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['A Service has been created, '. $this->matrixCategory->category.'. If this applies to your TMO, please ensure they are allocated the resposibility'],
            'url' => ['/matrixcategories/'. $this->matrixCategory->id]
        ];
    }
}
