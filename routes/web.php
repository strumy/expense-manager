<?php

use App\Http\Middleware\CheckIsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/user', [UserController::class, 'index']);

//Route::resource('transactions', TransactionController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')
        ->name('admin.')
        ->middleware(CheckIsAdmin::class) 
        ->group(function () {
            Route::resource('transactions', AdminTransactionController::class);
        });
 
    Route::prefix('user')
        ->name('user.')
        ->group(function () {
            Route::resource('transactions', UserTransactionController::class);
        });
    
    Route::get('/home', function () {
        return view('auth.home');
    });
});
