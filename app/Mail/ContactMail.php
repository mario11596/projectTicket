<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ContactMail extends Mailable
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

        return $this->subject('Uspješno obrađen zahtjev')
                    ->from($user_email)
                    ->markdown('email.contactMail')
                    ->with('ticket', $this->ticket);
    }
}
