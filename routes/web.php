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

