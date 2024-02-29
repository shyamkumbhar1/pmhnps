<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userData;

    public function __construct($userData)
    {
        $this->userData = $userData;
        // dd(config('mail.admin_email'));

    }

   
    public function handle()
    {
        return "test";
        //Logic to notify an admin about the new registration
        Mail::to(config('mail.admin_email'))->send(new NewRegistrationNotification($this->userData));
        // Mail::to($this->userData['email'])->send(new WelcomeEmail($this->userData));

  
    }
}
