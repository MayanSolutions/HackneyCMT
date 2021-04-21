<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\MatrixFunction;

class FunctionCreationNotification extends Notification
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
                    ->line('System generated notification')
                    ->line('Hi '. $this->user->name.'. A new management function has been added to our system')
                    ->line($this->matrixFunction->function.' has been added. If this applies to a TMO, please ensure the Liaison Officer or admin is aware.');
    }

    public function toArray($notifiable)
    {
            return [
                'notify' => ['A function has been created, '. $this->matrixFunction->function.' has been added to a housing service'],
                'url' => ['/clients/'. $this->matrixFunction->id]
            ];
    }
}
