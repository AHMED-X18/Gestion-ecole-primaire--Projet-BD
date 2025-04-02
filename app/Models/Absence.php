<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model{
    protected $table = 'absence';
    protected $fillable = ['id_absence', 'horaire', 'jour', 'matricule', 'id_discipline'];

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function dossier_discipline(){
        return $this->belongsTo(dossier_discipline::class);
    }

}
