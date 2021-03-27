<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsersChangeNotification extends Notification
{
    use Queueable;


    public function __construct()
    {

    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->line('There has been changes made to your user account')
                ->line('This may have been done by you, or by the system administrator, however please check to make sure that all updated information is correct')
                ->line('If you are unable to login. please contact your system administrator')
                ->action('My Account', url('/login'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return
        [
            'notify' => ['Information linked to your account has been changed']
        ];
    }
}
