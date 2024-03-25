<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;


class AppServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

   
    public function boot()
    {
        // User::observe(UserObserver::class);

    }
}
