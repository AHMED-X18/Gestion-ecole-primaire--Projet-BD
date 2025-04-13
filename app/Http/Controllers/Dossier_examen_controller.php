<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Dossier_examen;

class Dossier_examen_controller extends Controller
{
    // Affiche la liste des dossiers d'examen
    public function index()
    {
        $dossiers = Dossier_examen::all(); // Changed variable name for clarity
        return view('dossiers.index', compact('dossiers'));
    }

    // Affiche le formulaire de création d'un nouveau dossier d'examen
    public function create()
    {
        return view('dossiers.create');
    }

    // Enregistre un nouveau dossier d'examen
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_examen' => 'required|string|max:10',
            'nom_exam' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'date_depot' => 'required|date',
            'matricule' => 'required|string|max:10',
            'id_admin' => 'required|string|max:10',
        ]);

        // Création du dossier d'examen
        Dossier_examen::create($request->only([
            'id_examen', 'nom_exam', 'etat', 'date_depot', 'matricule', 'id_admin'
        ]));

        return redirect()->route('dossiers.index')->with('success', 'Dossier d\'examen créé avec succès !');
    }

    // Affiche un dossier d'examen spécifique
    public function show($id)
    {
        $dossier_examen = Dossier_examen::findOrFail($id);
        return view('dossiers.show', compact('dossier_examen'));
    }

    // Affiche le formulaire d'édition pour un dossier d'examen existant
    public function edit($id)
    {
        $dossier_examen = Dossier_examen::findOrFail($id);
        return view('dossiers.edit', compact('dossier_examen'));
    }

    // Met à jour un dossier d'examen existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_examen' => 'required|string|max:10',
            'nom_exam' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'date_depot' => 'required|date',
            'matricule' => 'required|string|max:10',
            'id_admin' => 'required|string|max:10',
        ]);

        $dossier_examen = Dossier_examen::findOrFail($id);

        // Mise à jour des données
        $dossier_examen->update($request->only([
            'id_examen', 'nom_exam', 'etat', 'date_depot', 'matricule', 'id_admin'
        ]));

        return redirect()->route('dossiers.index')->with('success', 'Dossier d\'examen mis à jour avec succès !');
    }

    // Supprime un dossier d'examen
    public function destroy($id)
    {
        $dossier_examen = Dossier_examen::findOrFail($id);
        $dossier_examen->delete();

        return redirect()->route('dossiers.index')->with('success', 'Dossier d\'examen supprimé avec succès !');
    }
}
