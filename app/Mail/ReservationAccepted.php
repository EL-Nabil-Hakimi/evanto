<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $fname;
    public $lname;

    /**
     * Create a new message instance.
     * 
     */
  
    
    
    public function __construct($fname , $lname)
    {
        //
        $this->fname = $fname;
        $this->lname = $lname;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reservation Accepted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
        {

            return new Content(
                view: 'user.mail.email',
                with : [
                    'fname' => $this->fname,
                    'lname' => $this->lname,
                ]
            );
        }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
