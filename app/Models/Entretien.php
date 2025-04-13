<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model{
    protected $table = 'entretien';
    protected $fillable = ['id_entretien', 'nom', 'prénom', 'date_naissance', 'sexe','tel1', 'tel2', 'statut', 'addresse', 'date_service', 'lieu_service', 'email','profil'];

    public function Materiel(){
        return $this->belongsTo(Materiel::class);
    }
}
