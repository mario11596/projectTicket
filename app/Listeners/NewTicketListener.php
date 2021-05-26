<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use App\Events\NewTicketEvent;

use App\Models\Ticket;

class NewTicketListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(NewTicketEvent $event)
    {
        Mail::cc($event->ticket->contact->email)
            ->send(new MyMail($event->ticket));
            
    }
}
