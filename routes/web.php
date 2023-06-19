<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SubcriptionController;
use App\Http\Controllers\RemainingDetailsController;


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');

    return "Cache cleared successfully";
 });
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Artisan::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Subcription
// Route::view('single-charge','strip.single-charge');
Route::get('single-charge', function () {
    $user = auth()->user();
    return view('strip.single-charge',[

    'intent' => $user->createSetupIntent(),
    ]
);
});

Route::view('thankyou','strip.thankyou')->name('thankyou');
Route::view('dashboard1','dashboard1')->name('dashboard1');
Route::post('single-charge',[SubcriptionController::class,'singleCharge'])->name('single.charge');
Route::get('plans/create',[SubcriptionController::class,'showPlanForm'])->name('plans.create');
Route::post('plans/store',[SubcriptionController::class,'savePlan'])->name('plans.store');
Route::get('plans',[SubcriptionController::class,'allPlan'])->name('plans.all');
Route::get('plans/checkout/{planId}',[SubcriptionController::class,'checkout'])->name('plans.checkout');
Route::post('plans/process',[SubcriptionController::class,'processSubcription'])->name('plans.process');
Route::get('subcription/all',[SubcriptionController::class,'allSubcription'])->name('subcription.all');
Route::get('subcription/cancel',[SubcriptionController::class,'cancleSubcription'])->name('subcription.cancel');
Route::get('subcription/resume',[SubcriptionController::class,'resumeSubcription'])->name('subcription.resume');


// Remaining deatails save

Route::get('remaining-details',[RemainingDetailsController::class,'create'])->name('remaining.details');
Route::post('remaining-details',[RemainingDetailsController::class,'store'])->name('remaining.details.post');

// Main Dashboard
Route::get('main-Dashboard', function (){
    return view('user.main-Dashboard');
})->name('main.Dashboard');
