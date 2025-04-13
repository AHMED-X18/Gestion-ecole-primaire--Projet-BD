<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Matiere;

class Matiere_controller extends Controller
{
    // Affiche la liste des matières
    public function index()
    {
        $matieres = Matiere::all(); // Changed variable name for clarity
        return view('matieres.index', compact('matieres'));
    }

    // Affiche le formulaire de création d'une nouvelle matière
    public function create()
    {
        return view('matieres.create');
    }

    // Enregistre une nouvelle matière
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_matiere' => 'required|string|max:10',
            'coefficient' => 'required|integer',
            'nom' => 'required|string|max:255',
        ]);

        // Création de la matière
        Matiere::create([
            'id_matiere' => $request->id_matiere,
            'coefficient' => $request->coefficient,
            'nom' => $request->nom,
        ]);

        return redirect()->route('matieres.index')->with('success', 'Matière créée avec succès !');
    }

    // Affiche une matière spécifique
    public function show($id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matieres.show', compact('matiere'));
    }

    // Affiche le formulaire d'édition pour une matière existante
    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matieres.edit', compact('matiere'));
    }

    // Met à jour une matière existante
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_matiere' => 'required|string|max:10',
            'coefficient' => 'required|integer',
            'nom' => 'required|string|max:255',
        ]);

        $matiere = Matiere::findOrFail($id);

        // Mise à jour des données
        $matiere->id_matiere = $request->id_matiere;
        $matiere->coefficient = $request->coefficient;
        $matiere->nom = $request->nom;

        $matiere->save();

        return redirect()->route('matieres.index')->with('success', 'Matière mise à jour avec succès !');
    }

    // Supprime une matière
    public function destroy($id)
    {
        $matiere = Matiere::findOrFail($id);
        $matiere->delete();

        return redirect()->route('matieres.index')->with('success', 'Matière supprimée avec succès !');
    }
}
