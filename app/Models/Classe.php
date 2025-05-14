<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model{
    protected $table = 'classe';
    protected $fillable = ['id_classe', 'niveau', 'effectif', 'section'];

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }

}
