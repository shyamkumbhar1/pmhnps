<?php

use App\Models\TempRegister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempRegisterController;
use App\Http\Controllers\RegistrationStepsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


// Registration Steps


Route::get('/create-step-one', [RegistrationStepsController::class,'createStepOne'])->name('create.step.one');
Route::post('/create-step-one', [RegistrationStepsController::class,'postCreateStepOne'])->name('create.step.one.post');

Route::get('/create-step-two', [RegistrationStepsController::class,'createStepTwo'])->name('create.step.two');
Route::post('/create-step-two', [RegistrationStepsController::class,'postCreateStepTwo'])->name('create.step.two.post');

Route::get('/create-step-three', [RegistrationStepsController::class,'createStepThree'])->name('create.step.three');
Route::post('/create-step-three', [RegistrationStepsController::class,'postCreateStepThree'])->name('create.step.three.post');


// User Register Temporary

Route::get('/register-step-one', [TempRegisterController::class,'registerStepOne'])->name('register.step.one');
Route::post('/register-step-one', [TempRegisterController::class,'postRegisterStepOne'])->name('register.step.one.post');
Route::get('/register-step-two', [TempRegisterController::class,'registerStepTwo'])->name('register.step.two');



// Subscription Plan

Route::get('/subscription-plan', [TempRegisterController::class,'subscriptionPlan'])->name('subscription.plan');

Route::view('thank_you','register.thank_you')->name('thank_you');
// Step 4
Route::get('/login', [TempRegisterController::class,'loginCreate'])->name('login');
Route::post('/login', [TempRegisterController::class,'loginStore'])->name('loginStore');

// Step 5 Profile Page

Route::get('/profile-page', [TempRegisterController::class,'profilePage'])->name('profile.page');
Route::get('/remaining-detail', [TempRegisterController::class,'remainingDetailsCreate'])->name('remaining.details');
Route::post('/remaining-detail', [TempRegisterController::class,'remainingDetailsStore'])->name('remaining.details.store');

//Step 6  Remaining Details And Dashboard

Route::get('/user-dashboard', [TempRegisterController::class,'userDashboard'])->name('user.dashboard');








