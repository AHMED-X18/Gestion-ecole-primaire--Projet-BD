<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Dossier_inscription;

class Dossier_inscription_controller extends Controller
{
    // Affiche la liste des dossiers d'inscription
    public function index()
    {
        $dossiers = Dossier_inscription::all(); // Changed variable name for clarity
        return view('dossiers.index', compact('dossiers'));
    }

    // Affiche le formulaire de création d'un nouveau dossier d'inscription
    public function create()
    {
        return view('dossiers.create');
    }

    // Enregistre un nouveau dossier d'inscription
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_inscription' => 'required|string|max:10',
            'somme_initiale' => 'required|integer',
            'somme_payee' => 'required|integer',
            'reste' => 'required|integer',
            'etat' => 'required|string|max:255',
            'matricule' => 'required|string|max:10',
            'id_admin' => 'required|string|max:10',
        ]);

        // Création du dossier d'inscription
        Dossier_inscription::create([
            'id_inscription' => $request->id_inscription,
            'somme_initiale' => $request->somme_initiale,
            'somme_payee' => $request->somme_payee,
            'reste' => $request->reste, // Corrected variable name
            'etat' => $request->etat,
            'id_admin' => $request->id_admin,
            'matricule' => $request->matricule,
        ]);

        return redirect()->route('dossiers.index')->with('success', 'Dossier d\'inscription créé avec succès !');
    }

    // Affiche un dossier d'inscription spécifique
    public function show($id)
    {
        $dossier_inscription = Dossier_inscription::findOrFail($id);
        return view('dossiers.show', compact('dossier_inscription'));
    }

    // Affiche le formulaire d'édition pour un dossier d'inscription existant
    public function edit($id)
    {
        $dossier_inscription = Dossier_inscription::findOrFail($id);
        return view('dossiers.edit', compact('dossier_inscription'));
    }

    // Met à jour un dossier d'inscription existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_inscription' => 'required|string|max:10',
            'somme_initiale' => 'required|integer',
            'somme_payee' => 'required|integer',
            'reste' => 'required|integer',
            'etat' => 'required|string|max:255',
            'matricule' => 'required|string|max:10',
            'id_admin' => 'required|string|max:10',
        ]);

        $dossier_inscription = Dossier_inscription::findOrFail($id);

        // Mise à jour des données
        $dossier_inscription->update($request->only([
            'id_inscription', 'somme_initiale', 'somme_payee', 'reste', 'etat', 'matricule', 'id_admin'
        ]));

        return redirect()->route('dossiers.index')->with('success', 'Dossier d\'inscription mis à jour avec succès !');
    }

    // Supprime un dossier d'inscription
    public function destroy($id)
    {
        $dossier_inscription = Dossier_inscription::findOrFail($id);
        $dossier_inscription->delete();

        return redirect()->route('dossiers.index')->with('success', 'Dossier d\'inscription supprimé avec succès !');
    }
}
