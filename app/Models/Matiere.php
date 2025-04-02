<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model{
    protected $table = 'matiere';
    protected $fillable = ['id_matiere', 'nom', 'coef'];

    public function eleve(){
        return $this->belongsTo(Eleve::class) ;
    }

    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }

}
