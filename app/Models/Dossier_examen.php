<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Dossier_examen extends Model{
    protected $table = 'dossier_examen';
    protected $fillable = ['id_examen', 'nom_exam', 'etat', 'date_depot', 'matricule', 'id_admin'];

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}
