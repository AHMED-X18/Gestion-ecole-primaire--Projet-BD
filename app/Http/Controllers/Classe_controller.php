<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Classe;

class Classe_Controller extends Controller
{
    // Affiche la liste des salles de classe
    public function index()
    {
        $classes = Classe::all(); // Changed variable name for consistency
        return view('classes.index', compact('classes'));
    }

    // Affiche le formulaire de création d'une nouvelle classe
    public function create()
    {
        return view('classes.create');
    }

    // Enregistre une nouvelle classe
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_classe' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'effectif' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);

        // Création de la classe
        Classe::create($request->only(['id_classe', 'nom', 'niveau', 'effectif', 'section']));

        return redirect()->route('classes.index')->with('success', 'Classe créée avec succès !');
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
            'nom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'effectif' => 'required|integer',
            'section' => 'required|string|max:255',
        ]);

        $classe = Classe::findOrFail($id);

        // Mise à jour des données
        $classe->update($request->only(['id_classe', 'nom', 'niveau', 'effectif', 'section']));

        return redirect()->route('classes.index')->with('success', 'Classe mise à jour avec succès !');
    }

    // Supprime une classe
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect()->route('classes.index')->with('success', 'Classe supprimée avec succès !');
    }
}
