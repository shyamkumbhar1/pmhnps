<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewRegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $userData;
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    public function build()
    {
        return $this->subject('New User Registration Notification')
                    ->view('emails.new_registration_notification')
                    ->with('userData', $this->userData);
    }
  
    public function envelope()
    {
        return new Envelope(
            subject: 'New Registration Notification',
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
