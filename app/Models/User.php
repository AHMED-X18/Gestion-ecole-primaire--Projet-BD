<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'email', 'password',
    ];

    // Les attributs qui devraient être cachés pour les tableaux
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Optionnel : méthode pour vérifier si l'utilisateur est administrateur
    public function isAdmin()
    {
        return $this->role === 'admin'; // Supposez que vous avez un champ 'role'
    }
}
