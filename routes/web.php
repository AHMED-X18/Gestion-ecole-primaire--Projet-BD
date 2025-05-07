<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_Controller as AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Eleve_controller;

$admin=session('admin') ? session('admin') : null;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/reveal', [AdminController::class, 'reveal'])->name('reveal'); // route pour afficher le tableau de bord

Route::get('/login', [AdminController::class, 'connexion'])->name('login'); // route pour afficher le formulaire de connexion
Route::get('/inscription', [AdminController::class, 'inscription'])->name('inscription'); // route pour afficher le formulaire d'inscription
Route::post('/store', [AdminController::class, 'store'])->name('store'); // route pour enregistrer un nouvel administrateur

Route::post('/login',[LoginController::class, 'login'])->name('login.user'); // route pour traiter la connexion de l'utilisateur


Route::get('/logout',[LoginController::class, 'logout'])->name('logout.user'); // route pour traiter la déconnexion de l'utilisateur

Route::get('/show/{id}', [AdminController::class,'show']);

Route::get("/create", [Eleve_controller::class, 'create'])->name('student.create'); // route pour afficher le formulaire de création d'un nouvel élève


