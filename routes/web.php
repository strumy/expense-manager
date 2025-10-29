<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/user', [UserController::class, 'index']);

Route::get('/home', function () {
    // Only authenticated users may access this route...
    return view('auth.home');
})->middleware('auth');

Route::resource('transactions', TransactionController::class)->middleware('auth');
