<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_Controller as AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Eleve_controller;
use App\Http\Controllers\Classe_controller;

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

Route::get("/student.create", [Eleve_controller::class, 'create']); // route pour afficher le formulaire de création d'un nouvel élève

Route::get("/student.index", [Classe_controller::class,"index"]); //route pour afficher la liste des eleves

Route::get("/student.info/{matricule}", [Eleve_controller::class,'show'])->name('student.info'); // route pour trouver un eleve spécifique par son id

Route::post("/student.store", [Eleve_controller::class,'store'])->name('student.store'); // route pour enregistrer un nouvel élève


