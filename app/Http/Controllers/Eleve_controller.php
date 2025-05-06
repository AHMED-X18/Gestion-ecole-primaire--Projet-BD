<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Eleve;

class Eleve_controller extends Controller
{
    // Affiche la liste des élèves
    public function index()
    {
        $eleves = Eleve::all(); // Changed variable name for clarity
        return view('eleves.index', compact('eleves'));
    }

    // Affiche le formulaire de création d'un nouvel élève
    public function create()
    {
        return view('eleves.create');
    }

    // Enregistre un nouvel élève
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'matricule' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'nom_tuteur' => 'required|string',
            'tel1_tuteur' => 'required|integer',
            'tel2_tuteur' => 'required|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'email_tuteur' => 'required|string|email|max:255|unique:eleves',
            'id_classe' => 'required|string|max:10',
            'profil' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gestion du fichier profil
        $profilPath = $request->file('profil')->store('profil_images');

        // Création de l'élève
        Eleve::create([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'nom_tuteur' => $request->nom_tuteur,
            'tel1_tuteur' => $request->tel1_tuteur,
            'tel2_tuteur' => $request->tel2_tuteur,
            'statut' => $request->statut,
            'addresse' => $request->addresse,
            'email_tuteur' => $request->email_tuteur,
            'id_classe' => $request->id_classe,
            'profil' => $profilPath, // Enregistrement du chemin du profil
        ]);

        return redirect()->route('eleves.index')->with('success', 'Élève créé avec succès !');
    }

    // Affiche un élève spécifique
    public function show($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.show', compact('eleve'));
    }

    // Affiche le formulaire d'édition pour un élève existant
    public function edit($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.edit', compact('eleve'));
    }

    // Met à jour un élève existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'matricule' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'nom_tuteur' => 'required|string',
            'tel1_tuteur' => 'required|integer',
            'tel2_tuteur' => 'required|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'email_tuteur' => 'required|string|email|max:255|unique:eleves,email,' . $id,
            'id_classe' => 'required|string|max:10',
            'profil' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $eleve = Eleve::findOrFail($id);

        // Gestion du fichier profil
        if ($request->hasFile('profil')) {
            $profilPath = $request->file('profil')->store('profil_images');
            $eleve->profil = $profilPath;
        }

        // Mise à jour des données
        $eleve->update($request->only([
            'matricule', 'nom', 'prenom', 'date_naissance', 'sexe',
            'nom_tuteur', 'tel1_tuteur', 'tel2_tuteur', 'statut',
            'addresse', 'email_tuteur', 'id_classe'
        ]));

        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès !');
    }

    // Supprime un élève
    public function destroy($id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();

        return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès !');
    }
}
