<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model{
    protected $table = 'enseignant';
    protected $fillable = ['id_maitre', 'nom', 'prénom', 'date_naissance', 'sexe', 'nom_tuteur', 'tel1', 'tel2', 'statut', 'addresse', 'date_service', 'email','id_classe'];

    public function matiere(){
        return $this->belongsToMany(Matiere::class);
    }
    public function class(){
        return $this->belongsTo(Classe::class);
    }

}
