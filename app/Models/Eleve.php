<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model{

    protected $primaryKey = 'matricule'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 
    protected $table = 'eleve';
    protected $fillable = ['matricule', 'nom', 'prénom', 'date_naissance','lieu_naissance', 'sexe', 'nom_tuteur', 'tel1_tuteur', 'tel2_tuteur', 'statut', 'addresse', 'email_tuteur', 'id_classe','profil'];

    public function classe(){
        return $this->belongsTo(Classe::class);
    }
    public function dossier_discipline(){
        return $this->belongsTo(Dossier_discipline::class);
    }
    public function dossier_examen(){
        return $this->belongsTo(Dossier_examen::class);
    }
    public function dossier_inscription(){
        return $this->belongsTo(Dossier_inscription::class);
    }
    public function absence(){
        return $this->belongsTo(Absence::class);
    }
    public function matiere(){
        return $this->belongsToMany(Matiere::class);
    }

}
