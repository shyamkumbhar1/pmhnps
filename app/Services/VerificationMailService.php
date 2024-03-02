<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
interface VerificationMailServiceInterface
{
    public function sendVerificationEmail(User $user, $verificationLink);
}

class VerificationMailService implements VerificationMailServiceInterface
{

    public function sendVerificationEmail(User $user ,$verificationLink)
    {

        // Logic to send the verification email
        Mail::to($user->email)->send(new VerificationMail($user ,$verificationLink));
    }
}
