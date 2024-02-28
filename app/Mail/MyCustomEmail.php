<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyCustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public function build()
    {
        return $this->view('emails.my_custom_email')
                    ->subject('Subject of the Email');

                    
                    
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'My Custom Email',
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
