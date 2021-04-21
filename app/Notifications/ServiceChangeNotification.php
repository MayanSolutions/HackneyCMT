<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServiceChangeNotification extends Notification
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
        ->line('Hi '. $this->user->name.'. A housing service has been updated to our system')
        ->line($this->matrixCategory->category.' has been added. If this applies to a TMO, please ensure the Liaison Officer or admin is aware.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'notify' => ['The service '. $this->matrixCategory->category. 'has been updated. If this affects to your TMO, please ensure the responsible officer is notified'],
            'url' => ['/matrixcategories/'. $this->matrixCategory->id]
        ];
    }
}
