<?php

namespace App\Listeners;

use App\Events\CloseTicketEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Ticket;

class CloseTicketListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CloseTicketEvent  $event
     * @return void
     */
    public function handle(CloseTicketEvent $event)
    {
        Mail::to($event->ticket->contact->email)
                ->cc('tvrtka@gmail.com')
                ->send(new ContactMail($event->ticket));
    }
}
