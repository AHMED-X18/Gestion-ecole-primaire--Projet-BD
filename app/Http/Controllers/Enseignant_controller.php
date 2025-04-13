<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Enseignant;

class Enseignant_controller extends Controller
{
    // Affiche la liste des enseignants
    public function index()
    {
        $enseignants = Enseignant::all(); // Changed variable name for clarity
        return view('enseignants.index', compact('enseignants'));
    }

    // Affiche le formulaire de création d'un nouvel enseignant
    public function create()
    {
        return view('enseignants.create');
    }

    // Enregistre un nouvel enseignant
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_maitre' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'tel1' => 'required|integer',
            'tel2' => 'required|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:enseignants',
            'id_classe' => 'required|string|max:10',
            'profil' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gestion du fichier profil
        $profilPath = $request->file('profil')->store('profil_images');

        // Création de l'enseignant
        Enseignant::create([
            'id_maitre' => $request->id_maitre,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'statut' => $request->statut,
            'addresse' => $request->addresse,
            'email' => $request->email,
            'id_classe' => $request->id_classe,
            'profil' => $profilPath, // Enregistrement du chemin du profil
        ]);

        return redirect()->route('enseignants.index')->with('success', 'Enseignant créé avec succès !');
    }

    // Affiche un enseignant spécifique
    public function show($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        return view('enseignants.show', compact('enseignant'));
    }

    // Affiche le formulaire d'édition pour un enseignant existant
    public function edit($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        return view('enseignants.edit', compact('enseignant'));
    }

    // Met à jour un enseignant existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'id_maitre' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'tel1' => 'required|integer',
            'tel2' => 'required|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:enseignants,email,' . $id,
            'id_classe' => 'required|string|max:10',
            'profil' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $enseignant = Enseignant::findOrFail($id);

        // Gestion du fichier profil
        if ($request->hasFile('profil')) {
            $profilPath = $request->file('profil')->store('profil_images');
            $enseignant->profil = $profilPath;
        }

        // Mise à jour des données
        $enseignant->update($request->only([
            'id_maitre', 'nom', 'prenom', 'date_naissance', 'sexe',
            'tel1', 'tel2', 'statut', 'addresse', 'email', 'id_classe'
        ]));

        return redirect()->route('enseignants.index')->with('success', 'Enseignant mis à jour avec succès !');
    }

    // Supprime un enseignant
    public function destroy($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();

        return redirect()->route('enseignants.index')->with('success', 'Enseignant supprimé avec succès !');
    }
}
