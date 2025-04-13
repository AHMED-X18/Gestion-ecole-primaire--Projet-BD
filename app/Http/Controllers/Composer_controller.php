<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Composer;

class Composer_Controller extends Controller
{
    // Affiche la liste des compositions
    public function index()
    {
        $composers = Composer::all(); // Changed variable name for consistency
        return view('compositions.index', compact('composers'));
    }

    // Affiche le formulaire de création d'une nouvelle composition
    public function create()
    {
        return view('compositions.create');
    }

    // Enregistre une nouvelle composition
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'matricule' => 'required|string|max:10',
            'id_matiere' => 'required|string|max:10',
            'note' => 'required|float',
            'note_finale' => 'required|float',
            'sequence' => 'required|integer',
            'date_compo' => 'required|date',
        ]);

        // Création de la composition
        Composer::create($request->only(['matricule', 'id_matiere', 'note', 'note_finale', 'sequence', 'date_compo']));

        return redirect()->route('compositions.index')->with('success', 'Composition créée avec succès !');
    }

    // Affiche une composition spécifique
    public function show($id)
    {
        $composer = Composer::findOrFail($id);
        return view('compositions.show', compact('composer'));
    }

    // Affiche le formulaire d'édition pour une composition existante
    public function edit($id)
    {
        $composer = Composer::findOrFail($id);
        return view('compositions.edit', compact('composer'));
    }

    // Met à jour une composition existante
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'matricule' => 'required|string|max:10',
            'id_matiere' => 'required|string|max:10',
            'note' => 'required|float',
            'note_finale' => 'required|float',
            'sequence' => 'required|integer',
            'date_compo' => 'required|date',
        ]);

        $composer = Composer::findOrFail($id);

        // Mise à jour des données
        $composer->update($request->only(['matricule', 'id_matiere', 'note', 'note_finale', 'sequence', 'date_compo']));

        return redirect()->route('compositions.index')->with('success', 'Composition mise à jour avec succès !');
    }

    // Supprime une composition
    public function destroy($id)
    {
        $composer = Composer::findOrFail($id);
        $composer->delete();

        return redirect()->route('compositions.index')->with('success', 'Composition supprimée avec succès !');
    }
}
