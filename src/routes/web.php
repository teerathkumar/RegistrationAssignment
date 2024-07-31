<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [\App\Http\Controllers\RegistrationController::class,'register']);
Route::post('/verify', [\App\Http\Controllers\RegistrationController::class,'registered'])->name('registered');
Route::post('/captcha', [\App\Http\Controllers\RegistrationController::class,'verify'])->name('verify');
Route::post('/complete', [\App\Http\Controllers\RegistrationController::class,'captcha'])->name('captcha');

Route::get('/send-otp', [\App\Http\Controllers\OtpController::class, 'sendOtp']);
