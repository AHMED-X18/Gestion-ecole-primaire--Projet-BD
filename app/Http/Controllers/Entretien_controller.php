<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Entretien;

class Entretien_controller extends Controller
{
    // Affiche la liste des entretiens
    public function index()
    {
        $entretiens = Entretien::all(); // Changed variable name for clarity
        return view('entretiens.index', compact('entretiens'));
    }

    // Affiche le formulaire de création d'un nouvel entretien
    public function create()
    {
        return view('entretiens.create');
    }

    // Enregistre un nouvel entretien
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_entretien' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'tel1' => 'required|integer',
            'tel2' => 'required|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'date_service' => 'required|date',
            'lieu_service' => 'required|string',
            'email' => 'required|string|email|max:255|unique:entretiens',
            'profil' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gestion du fichier profil
        $profilPath = $request->file('profil')->store('profil_images');

        // Création de l'entretien
        Entretien::create([
            'id_entretien' => $request->id_entretien,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'statut' => $request->statut,
            'addresse' => $request->addresse,
            'date_service' => $request->date_service,
            'lieu_service' => $request->lieu_service,
            'email' => $request->email,
            'profil' => $profilPath, // Enregistrement du chemin du profil
        ]);

        return redirect()->route('entretiens.index')->with('success', 'Entretien créé avec succès !');
    }

    // Affiche un entretien spécifique
    public function show($id)
    {
        $entretien = Entretien::findOrFail($id);
        return view('entretiens.show', compact('entretien'));
    }

    // Affiche le formulaire d'édition pour un entretien existant
    public function edit($id)
    {
        $entretien = Entretien::findOrFail($id);
        return view('entretiens.edit', compact('entretien'));
    }

    // Met à jour un entretien existant
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'tel1' => 'required|integer',
            'tel2' => 'required|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'date_service' => 'required|date',
            'lieu_service' => 'required|string',
            'email' => 'required|string|email|max:255|unique:entretiens,email,' . $id,
            'profil' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $entretien = Entretien::findOrFail($id);

        // Gestion du fichier profil
        if ($request->hasFile('profil')) {
            $profilPath = $request->file('profil')->store('profil_images');
            $entretien->profil = $profilPath;
        }

        // Mise à jour des données
        $entretien->update($request->only([
            'nom', 'prenom', 'date_naissance', 'sexe',
            'tel1', 'tel2', 'statut', 'addresse',
            'date_service', 'lieu_service', 'email'
        ]));

        if ($request->filled('mot_de_passe')) {
            $entretien->mot_de_passe = bcrypt($request->mot_de_passe);
        }

        $entretien->save();

        return redirect()->route('entretiens.index')->with('success', 'Entretien mis à jour avec succès !');
    }

    // Supprime un entretien
    public function destroy($id)
    {
        $entretien = Entretien::findOrFail($id);
        $entretien->delete();

        return redirect()->route('entretiens.index')->with('success', 'Entretien supprimé avec succès !');
    }
}
