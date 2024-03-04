<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{
    
    public function __construct()
    {
        //
    }

   
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        \Mail::to($user->email)->send(new \App\Mail\WelcomeEmail($user));


    }
}
