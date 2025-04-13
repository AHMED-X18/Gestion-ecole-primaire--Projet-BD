<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Dossier_discipline;

class Dossier_discipline_controller extends Controller
{
    // Affiche la liste des dossiers de discipline
    public function index()
    {
        $dossiers = Dossier_discipline::all(); // Changed variable name for clarity
        return view('dossiers.index', compact('dossiers'));
    }

    // Affiche le formulaire de création d'un nouveau dossier de discipline
    public function create()
    {
        return view('dossiers.create');
    }

    // Enregistre un nouveau dossier de discipline
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_discipline' => 'required|string|max:10',
            'convocation' => 'required|string|max:65000',
            'etat' => 'required|string|max:255',
            'sanction' => 'required|string|max:255',
            'matricule' => 'required|string|max:10',
            'id_admin' => 'required|string|max:10',
        ]);

        // Création du dossier de discipline
        Dossier_discipline::create($request->only([
            'id_discipline', 'convocation', 'etat', 'sanction', 'matricule', 'id_admin'
        ]));

        return redirect()->route('dossiers.index')->with('success', 'Dossier de discipline créé avec succès !');
    }

    // Affiche un dossier de discipline spécifique
    public function show($id)
    {
        $dossier = Dossier_discipline::findOrFail($id);
        return view('dossiers.show', compact('dossier'));
    }

    // Affiche le formulaire d'édition pour un dossier de discipline existant
    public function edit($id)
    {
        $dossier = Dossier_discipline::findOrFail($id);
        return view('dossiers.edit', compact('dossier'));
    }

    // Met à jour un dossier de discipline existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_discipline' => 'required|string|max:10',
            'convocation' => 'required|string|max:65000',
            'etat' => 'required|string|max:255',
            'sanction' => 'required|string|max:255',
            'matricule' => 'required|string|max:10',
            'id_admin' => 'required|string|max:10',
        ]);

        $dossier = Dossier_discipline::findOrFail($id);

        // Mise à jour des données
        $dossier->update($request->only([
            'id_discipline', 'convocation', 'etat', 'sanction', 'matricule', 'id_admin'
        ]));

        return redirect()->route('dossiers.index')->with('success', 'Dossier de discipline mis à jour avec succès !');
    }

    // Supprime un dossier de discipline
    public function destroy($id)
    {
        $dossier = Dossier_discipline::findOrFail($id);
        $dossier->delete();

        return redirect()->route('dossiers.index')->with('success', 'Dossier de discipline supprimé avec succès !');
    }
}
