<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Dossier_discipline extends Model{
    protected $table = 'dossier_discipline';
    protected $fillable = ['id_discipline', 'convocation', 'etat', 'sanction', 'matricule', 'id_admin'];

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function absence(){
        return $this->belongsTo(Absence::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}
