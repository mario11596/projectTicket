<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Ticket;
use App\Listeners\NewTicketListener;
use App\Models\User;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
       $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::findOrFail($this->ticket->user_id);
        $user_email = $user->email;

        return $this->subject('Uspješno je primljen novi zahtjev')
                    ->from('tvrtka@gmail.com')
                    ->to($user_email)
                    ->view('email.myMail')
                    ->with('ticket', $this->ticket);
    }
}
