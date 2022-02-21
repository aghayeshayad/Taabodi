<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerCreatedNotification extends Notification
{
    use Queueable;
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('جزئیات خرید شما')
            ->view('FrontEnd.Users.result-payment');
    }

    public function toArray($notifiable)
    {
        return [
            'id' => $this->user->id,
        ];
    }

}
