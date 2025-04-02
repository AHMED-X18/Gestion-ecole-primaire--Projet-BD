<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Composer extends Model{
    protected $table = 'composer';
    protected $fillable = ['matricule', 'id_matiere', 'note', 'note_finale', 'sequence', 'date_compo'];

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }

}
