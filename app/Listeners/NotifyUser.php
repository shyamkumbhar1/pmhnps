<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


class NotifyUser
{
   
    public function __construct()
    {
        //
    }

  
    public function handle(PostCreated $event)
    {
     $data = $event->user;
       $email  = $event->user['email'];
        Mail::to($email )->send(new WelcomeMail($data));
                return "mail send sucessfullly";
    }
}
