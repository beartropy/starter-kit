<?php

use App\Livewire\CreateUser;
use App\Livewire\UsersTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/register', function () {
    return "Register page placeholder";
})->name('register');

Route::get('/password/reset', function () {
    return "Password reset placeholder";
})->name('password.request');

Route::get('/users', UsersTable::class)->name('users.table');
