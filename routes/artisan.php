<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('migration', function() {
    Artisan::call('migrate:fresh');

    return "Migration Run Successfully";
 });

 Route::get('/clear-cache', function () {
     Artisan::call('cache:clear');
     Artisan::call('route:clear');

     return "Cache cleared successfully";
  });
