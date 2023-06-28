<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/migrate', function () {
    Artisan::call('migrate');

    return "Migration run successfully";
 });
Route::get('migrate:fresh', function() {

    Artisan::call('migrate:fresh');

    return "Migration Run Successfully";
 });


 Route::get('/clear-cache', function () {
     Artisan::call('cache:clear');
     Artisan::call('route:clear');

     return "Cache cleared successfully";
  });
