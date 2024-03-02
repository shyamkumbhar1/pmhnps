<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\VerificationMailService;
use App\Services\VerificationMailServiceInterface;

class VerificationMailServiceProvider extends ServiceProvider
{

    public function register()
    {
         // Bind the VerificationMailServiceInterface to the VerificationMailService
         $this->app->bind(VerificationMailServiceInterface::class, VerificationMailService::class);

    }


    public function boot()
    {
        //
    }
}
