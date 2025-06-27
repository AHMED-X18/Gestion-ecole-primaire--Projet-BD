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
        $enseignants = Enseignant::all();
        return view('listeenseignant', compact('enseignants'));
    }

    // Affiche le formulaire de création d'un nouvel enseignant
    public function create()
    {
        return view('ajouterenseignant');
    }

    // Enregistre un nouvel enseignant
    public function store(Request $request)
    {
        try{
        // validation des données
        $data=$request->validate([
            'nom' => 'required|string|max:255',
            'prénom' => 'nullable|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|string|max:10',
            'tel1' => 'required|integer',
            'tel2' => 'nullable|integer',
            'addresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:enseignant',
            'id_classe' => 'required|string|max:10',
            'profil' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

         // Gestion du fichier
         $profilPath = $request->file('profil')->store('enseignant');
         $data['profil'] = $profilPath;

         // Génération matricule
         $currentYear = \Carbon\Carbon::now()->year;
         $matricule=($currentYear - 2000) . 'T' . rand(100, 1000);

         $data=array_merge(["id_maitre"=>$matricule], $data);

         // Création de l'élève
         Enseignant::create($data);

         return redirect()->back()->with('success', 'Élève créé avec succès !');
     } catch (\Exception $e){
        dd($e);
     }
    }



    // Affiche un enseignant spécifique
    public function show($id)
    {
        $enseignant = Enseignant::where('id_maitre', $id)->firstOrFail();
        return view('InformationEnseignant', compact('enseignant'));
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
        $enseignant = Enseignant::where('id_maitre', $id)->firstOrFail();
        $enseignant->delete();

        return redirect()->route('enseignants.index')->with('success', 'Enseignant supprimé avec succès !');
    }
}
