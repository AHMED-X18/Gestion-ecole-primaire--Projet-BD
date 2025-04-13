<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Enseigner;

class Enseigner_controller extends Controller
{
    // Affiche la liste des enseignements
    public function index()
    {
        $enseignements = Enseigner::all(); // Changed variable name for clarity
        return view('enseignements.index', compact('enseignements'));
    }

    // Affiche le formulaire de création d'un nouvel enseignement
    public function create()
    {
        return view('enseignements.create');
    }

    // Enregistre un nouvel enseignement
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_maitre' => 'required|string|max:10',
            'id_matiere' => 'required|string|max:10',
            'date_cours' => 'required|date',
        ]);

        // Création de l'enseignement
        Enseigner::create([
            'id_maitre' => $request->id_maitre,
            'id_matiere' => $request->id_matiere,
            'date_cours' => $request->date_cours,
        ]);

        return redirect()->route('enseignements.index')->with('success', 'Enseignement créé avec succès !');
    }

    // Affiche un enseignement spécifique
    public function show($id)
    {
        $enseignement = Enseigner::findOrFail($id);
        return view('enseignements.show', compact('enseignement'));
    }

    // Affiche le formulaire d'édition pour un enseignement existant
    public function edit($id)
    {
        $enseignement = Enseigner::findOrFail($id);
        return view('enseignements.edit', compact('enseignement'));
    }

    // Met à jour un enseignement existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_maitre' => 'required|string|max:10',
            'id_matiere' => 'required|string|max:10',
            'date_cours' => 'required|date',
        ]);

        $enseignement = Enseigner::findOrFail($id);

        // Mise à jour des données
        $enseignement->update([
            'id_maitre' => $request->id_maitre,
            'id_matiere' => $request->id_matiere,
            'date_cours' => $request->date_cours,
        ]);

        return redirect()->route('enseignements.index')->with('success', 'Enseignement mis à jour avec succès !');
    }

    // Supprime un enseignement
    public function destroy($id)
    {
        $enseignement = Enseigner::findOrFail($id);
        $enseignement->delete();

        return redirect()->route('enseignements.index')->with('success', 'Enseignement supprimé avec succès !');
    }
}
