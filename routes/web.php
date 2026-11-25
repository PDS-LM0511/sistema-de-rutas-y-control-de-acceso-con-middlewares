<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::middleware('check.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/panel', [AuthController::class, 'panel'])->name('panel');

    Route::get('/casino', [AuthController::class, 'casino'])
        ->middleware('check.age')
        ->name('casino');

    Route::get('/admin', [AuthController::class, 'admin'])
        ->middleware('check.admin')
        ->name('admin');
});
