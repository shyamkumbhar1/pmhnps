<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $userData;
    public function __construct($userData)
    {
        $this->userData = $userData;
    }


    public function build()
    {
        return $this->subject('Welcome to Our Application')
                    ->view('emails.welcome')
                    ->with('userData', $this->userData);
    }
   
    public function envelope()
    {
        return new Envelope(
            subject: 'Welcome Email',
        );
    }

  
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    public function attachments()
    {
        return [];
    }
}
