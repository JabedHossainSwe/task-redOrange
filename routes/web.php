<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Enable email verification
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

// Sign-up routes
Route::get('/sign-up', [SignUpController::class, 'showSignUpForm'])->name('sign-up');
Route::post('/sign-up', [SignUpController::class, 'submitSignUpForm'])->name('sign-up.submit');

// Email verification routes
Route::get('/email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
Route::post('/email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Profile route
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
