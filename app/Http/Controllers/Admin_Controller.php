<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Admin_Controller extends Controller
{
    // Affiche la liste des administrateurs
    public function index()
    {
        // Récupérer le personnel groupé par poste
        $personnelParPoste = Admin::all()->groupBy('statut');

        // Calculer les statistiques
        $stats = [
            'total' => Admin::count(),
            'directeurs' => Admin::where('statut', 'directeur')->count(),
            'secretaires' => Admin::where('statut', 'secretaire')->count(),
            'tresoriers' => Admin::where('statut', 'tresorier')->count(),
            'autres' => Admin::where('statut', 'autre')->count(),
        ];

        return view('listepersonnel', compact('personnelParPoste', 'stats'));
    }

    // Affiche le formulaire de connexion d'un administrateur
    public function connexion()
    {
        return view('login');
    }

    // Affiche le formulaire de création d'un nouvel administrateur
    public function inscription()
    {
        return view('inscription');
    }

    //Afficher le tableau de bord
    public function reveal(){
        return view('tableau de bord');
    }

    // Enregistre un nouvel administrateur
    public function store(Request $request)
    {
        try{
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prénom' => 'nullable|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'sexe' => 'required|in:Homme,Femme',
            'tel1' => 'required|numeric',
            'tel2' => 'nullable|numeric',
            'statut' => 'required|string|max:255',
            'addresse' => 'required|string|max:255',
            'date_service' => 'required|date',
            'email' => 'required|email|unique:admin',
            'password' => 'required|string|min:8|confirmed',
            'profil' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Gestion du fichier
        $profilPath = $request->file('profil')->store('admin');
        $data['profil']=$profilPath;

        // Génération matricule
        $dateServiceYear = \Carbon\Carbon::parse($data['date_service'])->year;
        $matricule=($dateServiceYear - 2000) . 'A' . rand(100, 999);

        // Hachage mot de passe
        $data['password'] = bcrypt($data['password']);

        $data=array_merge(["id_admin"=>$matricule], $data);

            //dd($data);
           Admin::create($data);
           return redirect()->route('reveal')->with("admin",session('admin'));
        }
        catch (\Exception $e) {
            dd($e);
            return back()->withInput()->withErrors(['error' => 'Erreur de sauvegarde : ' . $e->getMessage()]);
        }
    }

    // Affiche un administrateur spécifique
    public function show(String $id)
    {
        $admin = Admin::find($id);
        return view('tableau de bord', compact('admin'));
    }

 /*   // Affiche le formulaire d'édition pour un administrateur existant
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
            'tel2' => 'nullable|integer',
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
*/

    public function archive(){
        return view('archives');
    }

    public function comptabilite(){
        return view('comptabilité');
    }

    public function local(){
        return view('Locaux');
    }

    public function communication(){
        return view('Communication_parents');
    }
}
