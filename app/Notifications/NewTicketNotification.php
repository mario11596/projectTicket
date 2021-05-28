<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class NewTicketNotification extends Notification
{
    use Queueable;
    public $ticket;
    
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    
    public function via($notifiable)
    {
        return ['database'];
    }

    
    public function toArray($notifiable)
    {
        return [
            'title' => $this->ticket->title,
            'priority' => $this->ticket->priority
        ];
    }
}
