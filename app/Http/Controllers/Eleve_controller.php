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
        $eleve = Eleve::all();
        return view('ListeEleve', compact('eleve'));
    }

    // Affiche le formulaire de création d'un nouvel élève
    public function create()
    {
        return view('InscriptionEleve');
    }

    // Enregistre un nouvel élève
    public function store(Request $request)
    {
        // Validation des données
        try{
        $data=$request->validate([
            'nom' => 'required|string|max:255',
            'prénom' => 'nullable|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'sexe' => 'required|string|max:10',
            'nom_tuteur' => 'required|string',
            'tel1_tuteur' => 'required|integer',
            'tel2_tuteur' => 'nullable|integer',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'email_tuteur' => 'required|string|email|max:255',
            'id_classe' => 'required|string|max:10',
            'profil' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gestion du fichier
        $profilPath = $request->file('profil')->store(asset('storage/images/eleve'));
        $data['profil'] = $profilPath;

        // Génération matricule
        $currentYear = \Carbon\Carbon::now()->year;
        $matricule=($currentYear - 2000) . 'S' . rand(100, 1000);

        $data=array_merge(["matricule"=>$matricule], $data);


        // Création de l'élève
        Eleve::create($data);

        return redirect()->back()->with('success', 'Élève créé avec succès !');
    }catch(\Exception $e){
            dd($e);
            return back()->withInput()->withErrors(['error' => 'Erreur de sauvegarde : ' . $e->getMessage()]);
    }
    }

    // Affiche un élève spécifique
    public function show($id)
    {
        $eleve = Eleve::where('matricule', $id)->firstOrFail();
        return view('InformationEleve', compact('eleve'));
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
