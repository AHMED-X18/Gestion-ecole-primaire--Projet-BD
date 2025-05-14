<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Classe;
use App\Models\Eleve;

class Classe_Controller extends Controller
{
    // Affiche la liste des salles de classe
    public function index()
{
    $sections = [
        'franco' => Classe::with('eleve')->where('section', 'francophone')->get(),
        'anglo' => Classe::with('eleve')->where('section', 'anglophone')->get()
    ];

      // Créer une variable pour les élèves par classe
      $eleves = [];
      foreach ($sections as $section => $classes) {
          foreach ($classes as $classe) {
              $eleves[$section][$classe->id_classe] = Eleve::where('id_classe', $classe->id_classe)
              ->get(); 
          }
      }

    return view('ListeEleve', compact('sections','eleves'));
}

    // Affiche une classe spécifique
    public function show($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.show', compact('classe'));
    }

    // Affiche le formulaire d'édition pour une classe existante
    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.edit', compact('classe'));
    }

    // Met à jour une classe existante
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_classe' => 'required|string|max:10',
            'niveau' => 'required|string|max:255',
            'effectif' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);

        $classe = Classe::findOrFail($id);

        // Mise à jour des données
        $classe->update($request->only(['id_classe', 'niveau', 'effectif', 'section']));

        return redirect()->route('classes.index')->with('success', 'Classe mise à jour avec succès !');
    }
}
