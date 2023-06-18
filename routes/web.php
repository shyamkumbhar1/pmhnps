<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubcriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
Route::post('single-charge',[SubcriptionController::class,'singleCharge'])->name('single.charge');
Route::get('plans/create',[SubcriptionController::class,'showPlanForm'])->name('plans.create');
Route::post('plans/store',[SubcriptionController::class,'savePlan'])->name('plans.store');
Route::get('plans',[SubcriptionController::class,'allPlan'])->name('plans.all');
Route::get('plans/checkout/{planId}',[SubcriptionController::class,'checkout'])->name('plans.checkout');
Route::post('plans/process',[SubcriptionController::class,'processSubcription'])->name('plans.process');
Route::get('subcription/all',[SubcriptionController::class,'allSubcription'])->name('subcription.all');
Route::get('subcription/cancel',[SubcriptionController::class,'cancleSubcription'])->name('subcription.cancel');
Route::get('subcription/resume',[SubcriptionController::class,'resumeSubcription'])->name('subcription.resume');
