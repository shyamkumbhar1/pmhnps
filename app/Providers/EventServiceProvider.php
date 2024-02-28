<?php

namespace App\Providers;

use App\Events\SendMail;
use App\Events\ContactUsMail;
use App\Listeners\SendMailFired;
use App\Listeners\ContactUsMailFired;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\PostCreated;
use App\Listeners\NotifyUser;


class EventServiceProvider extends ServiceProvider
{
  
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendMail::class => [
            SendMailFired::class,
        ],
        ContactUsMail::class => [
            ContactUsMailFired::class,
        ], 
        
        PostCreated::class => [
            NotifyUser::class,
        ],

       
    ];

  
    public function boot()
    {
        //
    }

  
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
