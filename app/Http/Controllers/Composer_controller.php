<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Composer;

class Composer_Controller extends Controller
{
    public function index()
    {
        // Récupérer toutes les classes avec leur niveau et section
        $classes = Composer::table('classes')
            ->select('id_classe', 'niveau', 'section')
            ->orderBy('niveau')
            ->orderBy('section')
            ->get();

        // Récupérer tous les élèves groupés par classe
        $studentsData = [];
        foreach ($classes as $classe) {
            $students = Composer::table('eleves')
                ->where('id_classe', $classe->id_classe)
                ->select('matricule', 'nom', 'prénom', 'sexe', 'id_classe')
                ->orderBy('nom')
                ->orderBy('prénom')
                ->get();

            if ($students->count() > 0) {
                $studentsData[$classe->id_classe] = $students->toArray();
            }
        }

        // Récupérer toutes les matières (nous filtrerons côté client)
        $matieres = Composer::table('matieres')
            ->select('id_matiere', 'nom_matiere', 'coef', 'niveau', 'section')
            ->orderBy('nom_matiere')
            ->get();

        return view('notes.index', compact('classes', 'studentsData', 'matieres'));
    }

    // Nouvelle méthode pour récupérer les matières d'une classe spécifique
    public function getMatieresByClasse($classeId)
    {
        try {
            // Récupérer les informations de la classe
            $classe = Composer::table('classes')
                ->where('id_classe', $classeId)
                ->select('niveau', 'section')
                ->first();

            if (!$classe) {
                return response()->json([
                    'success' => false,
                    'message' => 'Classe non trouvée'
                ]);
            }

            // Récupérer les matières correspondant au niveau et à la section
            $matieres = Composer::table('matieres')
                ->where('niveau', $classe->niveau)
                ->where(function($query) use ($classe) {
                    $query->where('section', $classe->section)
                          ->orWhereNull('section'); // Matières communes à toutes les sections
                })
                ->select('id_matiere', 'nom_matiere', 'coef', 'niveau', 'section')
                ->orderBy('nom_matiere')
                ->get();

            return response()->json([
                'success' => true,
                'matieres' => $matieres,
                'classe_info' => $classe
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des matières: ' . $e->getMessage()
            ]);
        }
    }

    // Méthode pour sauvegarder les notes en lot
    public function saveNotesBulk(Request $request)
    {
        try {
            $notes = $request->input('notes');
            $classe = $request->input('classe');
            $sequence = $request->input('sequence');

            if (empty($notes)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Aucune note à sauvegarder'
                ]);
            }

            $savedCount = 0;
            $errors = [];

            foreach ($notes as $noteData) {
                try {
                    // Vérifier si une note existe déjà pour cet élève, cette matière et cette séquence
                    $existingNote = Composer::table('composer')
                        ->where('matricule', $noteData['matricule'])
                        ->where('id_matiere', $noteData['id_matiere'])
                        ->where('sequence', $noteData['sequence'])
                        ->first();

                    if ($existingNote) {
                        // Mettre à jour la note existante
                        Composer::table('composer')
                            ->where('matricule', $noteData['matricule'])
                            ->where('id_matiere', $noteData['id_matiere'])
                            ->where('sequence', $noteData['sequence'])
                            ->update([
                                'note' => $noteData['note'],
                                'note_finale' => $noteData['note_finale'],
                                'date_compo' => $noteData['date_saisie']
                            ]);
                    } else {
                        // Insérer une nouvelle note
                        Composer::table('composer')->insert([
                            'matricule' => $noteData['matricule'],
                            'id_matiere' => $noteData['id_matiere'],
                            'note' => $noteData['note'],
                            'note_finale' => $noteData['note_finale'],
                            'sequence' => $noteData['sequence'],
                            'date_compo' => $noteData['date_saisie']
                        ]);
                    }

                    $savedCount++;

                } catch (\Exception $e) {
                    $errors[] = "Erreur pour {$noteData['matricule']} - {$noteData['id_matiere']}: " . $e->getMessage();
                }
            }

            return response()->json([
                'success' => true,
                'saved_count' => $savedCount,
                'errors' => $errors,
                'message' => "$savedCount notes sauvegardées avec succès"
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la sauvegarde: ' . $e->getMessage()
            ]);
        }
    }

    // Méthode pour récupérer les notes existantes d'une classe pour une séquence donnée
    public function getNotesForClasseSequence($classeId, $sequence)
    {
        try {
            // Récupérer les élèves de la classe
            $students = Composer::table('eleves')
                ->where('id_classe', $classeId)
                ->pluck('matricule');

            // Récupérer les notes existantes
            $notes = Composer::table('composer')
                ->whereIn('matricule', $students)
                ->where('sequence', $sequence)
                ->select('matricule', 'id_matiere', 'note', 'note_finale', 'sequence')
                ->get();

            // Organiser les notes par clé matricule_matiere_sequence
            $organizedNotes = [];
            foreach ($notes as $note) {
                $key = $note->matricule . '_' . $note->id_matiere . '_' . $note->sequence;
                $organizedNotes[$key] = $note->note;
            }

            return response()->json([
                'success' => true,
                'notes' => $organizedNotes
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des notes: ' . $e->getMessage()
            ]);
        }
    }

    // Méthode pour supprimer une note
    public function deleteNote(Request $request)
    {
        try {
            $matricule = $request->input('matricule');
            $id_matiere = $request->input('id_matiere');
            $sequence = $request->input('sequence');

            $deleted = Composer::table('composer')
                ->where('matricule', $matricule)
                ->where('id_matiere', $id_matiere)
                ->where('sequence', $sequence)
                ->delete();

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Note supprimée avec succès'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Note non trouvée'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression: ' . $e->getMessage()
            ]);
        }
    }

    // Méthode pour obtenir l'historique des notes d'un élève pour une matière
    public function getStudentHistory($matricule, $id_matiere)
    {
        try {
            $history = Composer::table('composer')
                ->where('matricule', $matricule)
                ->where('id_matiere', $id_matiere)
                ->orderBy('sequence')
                ->orderBy('date_compo', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'history' => $history
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération de l\'historique: ' . $e->getMessage()
            ]);
        }
    }

    // Méthode pour obtenir les statistiques
    public function getStats()
    {
        try {
            $totalStudents = Composer::table('eleves')->count();
            $totalClasses = Composer::table('classes')->count();
            $notesEntered = Composer::table('composer')->count();

            // Obtenir la séquence courante (vous pouvez ajuster cette logique)
            $currentSequence = 1; // Ou récupérer depuis une table de configuration

            return response()->json([
                'success' => true,
                'stats' => [
                    'total_students' => $totalStudents,
                    'total_classes' => $totalClasses,
                    'notes_entered' => $notesEntered,
                    'current_sequence' => $currentSequence
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des statistiques: ' . $e->getMessage()
            ]);
        }
    }
}
