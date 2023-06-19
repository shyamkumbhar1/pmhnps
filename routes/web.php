<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\RemainingDetailsController;
use App\Http\Controllers\User\UserDashboardController;


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');

    return "Cache cleared successfully";
 });
Route::get('/migrate', function () {
    Artisan::call('migrate');


    return "Migration run successfully";
 });
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Artisan::routes();

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
Route::post('single-charge',[SubscriptionController::class,'singleCharge'])->name('single.charge');
Route::get('plans/create',[SubscriptionController::class,'showPlanForm'])->name('plans.create');
Route::post('plans/store',[SubscriptionController::class,'savePlan'])->name('plans.store');
Route::get('plans',[SubscriptionController::class,'allPlan'])->name('plans.all');
Route::get('plans/checkout/{planId}',[SubscriptionController::class,'checkout'])->name('plans.checkout');
Route::post('plans/process',[SubscriptionController::class,'processSubcription'])->name('plans.process');
Route::get('subscription/all',[SubscriptionController::class,'allSubcription'])->name('subscription.all');
Route::get('subscription/cancel',[SubscriptionController::class,'cancleSubcription'])->name('subscription.cancel');
Route::get('subscription/resume',[SubscriptionController::class,'resumeSubcription'])->name('subscription.resume');


// Remaining details save

Route::get('remaining-details',[RemainingDetailsController::class,'create'])->name('remaining.details');
Route::post('remaining-details',[RemainingDetailsController::class,'store'])->name('remaining.details.post');

// User main  Dashboard
Route::get('user-Dashboard',[UserDashboardController::class,'index'])->name('user.Dashboard');
Route::get('user-Dashboard-edit',[UserDashboardController::class,'edit'])->name('user.Dashboard.edit');
Route::put('user-Dashboard-update',[UserDashboardController::class,'update'])->name('user.Dashboard.update');
Route::get('my-subscription',[UserDashboardController::class,'mySubscription'])->name('user.my.subscription');

