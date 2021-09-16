<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerRequestDelete extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url('/invoice/');
        return (new MailMessage)
            ->subject('Seller request rejected')
            ->greeting($notifiable->name)
            ->line('Sorry your seller request much be rejected...')
            ->action('Please try again ', $url)
            ->line('Thank you for using our application!');
    }
}
