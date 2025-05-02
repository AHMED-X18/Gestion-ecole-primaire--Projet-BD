<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends Model{
    protected $table = 'admin';
    protected $fillable = ['id_admin', 'nom', 'prénom', 'date_naissance', 'sexe', 'tel1', 'tel2', 'statut', 'addresse', 'date_service', 'email', 'password','profil'];

}
