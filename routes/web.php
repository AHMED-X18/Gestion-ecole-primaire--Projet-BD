<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_Controller as AdminController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reveal', [AdminController::class, 'reveal'])->name('reveal');
Route::get('/login', [AdminController::class, 'connexion'])->name('login');
Route::get('/inscription', [AdminController::class, 'inscription'])->name('inscription');
Route::post('/store', [AdminController::class, 'store'])->name('store');

Route::post('/login',[LoginController::class, 'login'])->name('login.user');
