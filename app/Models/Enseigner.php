<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Enseigner extends Model{
    protected $table = 'enseigner';
    protected $fillable = ['id_matiere', 'id_maitre', 'date_cours'];

    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }
    public function matiere(){
        return $this->belongsTo(Matiere::class) ;
    }

}
