<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Dossier_inscription extends Model{
    protected $table = 'dossier_inscription';
    protected $fillable = ['id_inscription', 'somme_initiale', 'somme_payee', 'reste', 'etat', 'matricule', 'id_admin'];

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}
