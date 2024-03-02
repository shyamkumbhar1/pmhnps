<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verificationLink;


    public function __construct(User $user, $verificationLink)
    {
        $this->user = $user;
        $this->verificationLink = $verificationLink;
    }


    public function build()
    {
        return $this->subject('Verify Your Email Address')
                    ->view('emails.verification')
                    ->with([
                        'user', $this->user,
                        'verificationLink', $this->verificationLink,
                    ]);
    }
}
