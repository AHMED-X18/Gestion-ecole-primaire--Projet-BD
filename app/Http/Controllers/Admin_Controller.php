<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Admin_Controller extends Controller
{
    // Affiche la liste des administrateurs
    public function index()
    {
        $administrateurs = Admin::all();
        return view('administrateurs.index', compact('administrateurs'));
    }

    // Affiche le formulaire de création d'un nouvel administrateur
    public function create()
    {
        return view('login');
    }

    // Enregistre un nouvel administrateur
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'id_admin' => 'required|string|max:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'tel1' => 'required|integer',
            'tel2' => 'required|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'date_service' => 'required|date',
            'email' => 'required|string|email|max:255|unique:administrateurs',
            'mot_de_passe' => 'required|string|min:8',
            'profil' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gestion du fichier profil
        $profilPath = $request->file('profil')->store('profil_images');

        // Création de l'administrateur
        Admin::create([
            'id_admin' => $request->id_admin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'statut' => $request->statut,
            'addresse' => $request->addresse,
            'date_service' => $request->date_service,
            'email' => $request->email,
            'mot_de_passe' => bcrypt($request->mot_de_passe), // Hash du mot de passe
            'profil' => $profilPath, // Enregistrement du chemin du profil
        ]);

        return redirect()->route('administrateurs.index')->with('success', 'Administrateur créé avec succès !');
    }

    // Affiche un administrateur spécifique
    public function show($id)
    {
        $administrateur = Admin::findOrFail($id);
        return view('administrateurs.show', compact('administrateur'));
    }

    // Affiche le formulaire d'édition pour un administrateur existant
    public function edit($id)
    {
        $administrateur = Admin::findOrFail($id);
        return view('administrateurs.edit', compact('administrateur'));
    }

    // Met à jour un administrateur existant
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
            'email' => 'required|string|email|max:255|unique:administrateurs,email,' . $id,
            'mot_de_passe' => 'nullable|string|min:8',
            'profil' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $administrateur = Admin::findOrFail($id);

        // Gestion du fichier profil
        if ($request->hasFile('profil')) {
            $profilPath = $request->file('profil')->store('profil_images');
            $administrateur->profil = $profilPath;
        }

        // Mise à jour des données
        $administrateur->nom = $request->nom;
        $administrateur->prenom = $request->prenom;
        $administrateur->date_naissance = $request->date_naissance;
        $administrateur->sexe = $request->sexe;
        $administrateur->tel1 = $request->tel1;
        $administrateur->tel2 = $request->tel2;
        $administrateur->statut = $request->statut;
        $administrateur->addresse = $request->addresse;
        $administrateur->date_service = $request->date_service;
        $administrateur->email = $request->email;

        if ($request->filled('mot_de_passe')) {
            $administrateur->mot_de_passe = bcrypt($request->mot_de_passe);
        }

        $administrateur->save();

        return redirect()->route('administrateurs.index')->with('success', 'Administrateur mis à jour avec succès !');
    }

    // Supprime un administrateur
    public function destroy($id)
    {
        $administrateur = Admin::findOrFail($id);
        $administrateur->delete();

        return redirect()->route('administrateurs.index')->with('success', 'Administrateur supprimé avec succès !');
    }
}
