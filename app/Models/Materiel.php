<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model{
    protected $table = 'materiel';
    protected $fillable = ['id_materiel', 'nom', 'quantite', 'etat', 'id_entretien'];

    public function entretien(){
        return $this->belongsTo(Entretien::class);
    }

}
