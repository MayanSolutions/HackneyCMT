<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FunctionDeletionNotification extends Notification
{
    use Queueable;

    private $user;
    private $matrixFunction;

    public function __construct($user, $matrixFunction)
    {
        $this->user = $user;
        $this->matrixFunction = $matrixFunction;
    }


    public function via($notifiable)
    {
        return ['mail', 'database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('System Notification')
                    ->line('The function '.$this->matrixFunction->function.' has been deleted from our system')
                    ->line('Any TMO organisations, which had been assigned this function will not longer be allocated to the service function.')
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            'notify' => ['A function has been deleted, '. $this->matrixFunction->function.' has been removed a housing service'],
            'url' => ['/matrixcategories/']
        ];
    }
}
