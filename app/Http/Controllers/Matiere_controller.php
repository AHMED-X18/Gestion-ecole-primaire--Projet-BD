<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Matiere;
use App\Models\Classe;

class Matiere_controller extends Controller
{
    // Affiche la liste des matières
    public function index(Request $request)
    {
        // Récupère toutes les classes
        $classes = Classe::orderBy('niveau')->orderBy('id_classe')->get();

        $selectedClasse = null;
        $matieres = collect();
        $timetableData = session('timetableData', []);

        // Si une classe est sélectionnée
        if ($request->has('id_classe') && $request->id_classe) {
            $selectedClasse = Classe::where('id_classe', $request->id_classe)->first();

            if ($selectedClasse) {
                // Récupère les matières correspondantes
                $matieres = Matiere::where('niveau', $selectedClasse->niveau)
                    ->where('section', $selectedClasse->section)
                    ->get();
            }
        }

        return view('emploidetemps', [
            'classes' => $classes,
            'selectedClasse' => $selectedClasse,
            'matieres' => $matieres,
            'timetableData' => $timetableData
        ]);
    }

    public function saveTimetable(Request $request)
    {
        $request->session()->put('timetableData', $request->timetable);
        return response()->json(['status' => 'success']);
    }

    public function resetTimetable(Request $request)
    {
        $request->session()->forget('timetableData');
        return back();
    }

}
