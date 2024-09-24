<?php

use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sign-up', [SignUpController::class, 'showSignUpForm'])->name('sign-up');
Route::post('/sign-up', [SignUpController::class, 'submitSignUpForm'])->name('sign-up.submit');
