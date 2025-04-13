<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Materiel;

class Materiel_controller extends Controller
{
    // Affiche la liste des matériels
    public function index()
    {
        $materiels = Materiel::all(); // Changed variable name for clarity
        return view('materiels.index', compact('materiels'));
    }

    // Affiche le formulaire de création d'un nouveau matériel
    public function create()
    {
        return view('materiels.create');
    }

    // Enregistre un nouveau matériel
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_materiel' => 'required|string|max:10',
            'nom' => 'required|string',
            'quantite' => 'required|integer',
            'etat' => 'required|string|max:255',
            'id_entretien' => 'required|string|max:10',
        ]);

        // Création du matériel
        Materiel::create([
            'id_materiel' => $request->id_materiel,
            'nom' => $request->nom,
            'quantite' => $request->quantite,
            'etat' => $request->etat,
            'id_entretien' => $request->id_entretien,
        ]);

        return redirect()->route('materiels.index')->with('success', 'Matériel créé avec succès !');
    }

    // Affiche un matériel spécifique
    public function show($id)
    {
        $materiel = Materiel::findOrFail($id);
        return view('materiels.show', compact('materiel'));
    }

    // Affiche le formulaire d'édition pour un matériel existant
    public function edit($id)
    {
        $materiel = Materiel::findOrFail($id);
        return view('materiels.edit', compact('materiel'));
    }

    // Met à jour un matériel existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_materiel' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'etat' => 'required|string|max:255',
            'id_entretien' => 'required|string|max:10',
        ]);

        $materiel = Materiel::findOrFail($id);

        // Mise à jour des données
        $materiel->nom = $request->nom;
        $materiel->quantite = $request->quantite; // Fixed typo here
        $materiel->etat = $request->etat;
        $materiel->id_entretien = $request->id_entretien;

        $materiel->save();

        return redirect()->route('materiels.index')->with('success', 'Matériel mis à jour avec succès !');
    }

    // Supprime un matériel
    public function destroy($id)
    {
        $materiel = Materiel::findOrFail($id);
        $materiel->delete();

        return redirect()->route('materiels.index')->with('success', 'Matériel supprimé avec succès !');
    }
}
