<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
public $user ;
   
    public function __construct($user)
    {
        $this->user = $user;
        // dd($user);
    }

    
    public function envelope()
    {
        return new Envelope(
            subject: 'Welcome Mail',
        );
    }

    
    public function content( )
    {
       
        return new Content(
            view: 'emails.wellcomeMail',
        );
    }

   
    public function attachments()
    {
        return [];
    }
}
