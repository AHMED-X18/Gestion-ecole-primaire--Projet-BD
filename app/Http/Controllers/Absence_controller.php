<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Absence;

class Absence_Controller extends Controller
{
    // Affiche la liste des absences
    public function index()
    {
        $absences = Absence::all();
        return view('absence.index', compact('absences'));
    }

    // Affiche le formulaire de création d'une nouvelle absence
    public function create()
    {
        return view('absence.create');
    }

    // Enregistre une nouvelle absence
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_absence' => 'required|string|max:10',
            'horaire' => 'required|string|max:255',
            'jour' => 'required|date',
            'matricule' => 'required|string|max:10',
            'id_discipline' => 'required|string|max:10',
        ]);

        // Création de l'absence
        Absence::create($request->only(['id_absence', 'horaire', 'jour', 'matricule', 'id_discipline']));

        return redirect()->route('absences.index')->with('success', 'Absence créée avec succès !');
    }

    // Affiche une absence spécifique
    public function show($id)
    {
        $absence = Absence::findOrFail($id);
        return view('absence.show', compact('absence'));
    }

    // Affiche le formulaire d'édition pour une absence existante
    public function edit($id)
    {
        $absence = Absence::findOrFail($id);
        return view('absence.edit', compact('absence'));
    }

    // Met à jour une absence existante
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_absence' => 'required|string|max:10',
            'horaire' => 'required|string|max:255',
            'jour' => 'required|date',
            'matricule' => 'required|string|max:10',
            'id_discipline' => 'required|string|max:10',
        ]);

        $absence = Absence::findOrFail($id);

        // Mise à jour des données
        $absence->update($request->only(['id_absence', 'horaire', 'jour', 'matricule', 'id_discipline']));

        return redirect()->route('absences.index')->with('success', 'Absence mise à jour avec succès !');
    }

    // Supprime une absence
    public function destroy($id)
    {
        $absence = Absence::findOrFail($id);
        $absence->delete();

        return redirect()->route('absences.index')->with('success', 'Absence supprimée avec succès !');
    }
}
