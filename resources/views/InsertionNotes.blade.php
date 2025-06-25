<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement des Notes | Les étoiles de l'avenir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .page {
            transition: all 0.3s ease-in-out;
        }

        .students-table th {
            background-color: #3b82f6;
            color: white;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        .card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-blue-600 mb-2">Les étoiles de l'avenir</h1>
            <h2 class="text-2xl text-gray-600">Enregistrement des notes scolaires</h2>
        </header>

        <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4">1. Sélectionnez la classe</h3>
                <select id="classSelect" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4" onchange="selectClass()">
                    <option value="">-- Sélectionnez une classe --</option>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id_classe }}">{{ $classe->id_classe }}</option>
                    @endforeach
                </select>
            </div>

            <div id="studentsSection" class="mb-8 hidden">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">2. Liste des élèves de <span id="currentClass" class="text-blue-600"></span></h3>
                    <button onclick="resetClassSelection()" class="btn-secondary px-3 py-1 rounded text-sm">
                        <i class="fas fa-undo mr-1"></i>Changer de classe
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full students-table border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border">Matricule</th>
                                <th class="py-2 px-4 border">Nom</th>
                                <th class="py-2 px-4 border">Prénom</th>
                                <th class="py-2 px-4 border">Matière</th>
                                <th class="py-2 px-4 border">Note (sur 20)</th>
                                <th class="py-2 px-4 border">Note Finale</th>
                                <th class="py-2 px-4 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="studentsList">
                            <!-- Rempli dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="notesFormSection" class="hidden">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">3. Saisie des notes pour <span id="currentStudent" class="text-blue-600"></span></h3>
                    <button onclick="resetStudentSelection()" class="btn-secondary px-3 py-1 rounded text-sm">
                        <i class="fas fa-undo mr-1"></i>Changer d'élève
                    </button>
                </div>

                <form id="noteForm" class="space-y-4" onsubmit="submitNoteForm(event)">
                    <input type="hidden" id="studentMatricule" name="matricule">
                    <div>
                        <label for="subject" class="block mb-2 font-medium">Matière:</label>
                        <select id="subject" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Sélectionnez une matière --</option>
                            @foreach($matieres as $subject)
                                <option value="{{ $subject->id_matiere }}" data-coef="{{ $subject->coef }}">{{ $subject->id_matiere }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="note" class="block mb-2 font-medium">Note (sur 20):</label>
                        <input type="number" min="0" max="20" step="0.5" id="note" required
                               class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" oninput="calculateFinalNote()">
                    </div>
                    <div>
                        <label for="finalNote" class="block mb-2 font-medium">Note Finale:</label>
                        <input type="text" id="finalNote" name="note_finale" readonly
                               class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200" disabled>
                    </div>
                    <div>
                        <label for="comment" class="block mb-2 font-medium">Commentaire:</label>
                        <textarea id="comment" name="comment" rows="3"
                                  class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div>
                        <label for="evaluationDate" class="block mb-2 font-medium">Date d'évaluation:</label>
                        <input type="date" id="evaluationDate" name="date_compo" required
                               class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="resetNoteForm()" class="btn-secondary px-4 py-2 rounded-lg">
                            <i class="fas fa-times mr-2"></i>Annuler
                        </button>
                        <button type="submit" class="btn-primary px-6 py-2 rounded-lg">
                            <i class="fas fa-save mr-2"></i>Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Notification -->
        <div id="notification" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg hidden">
            <i class="fas fa-check-circle mr-2"></i>
            <span id="notificationText"></span>
        </div>
    </div>

    <script>
        let studentsData = @json($studentsData); // Récupérer les élèves depuis le contrôleur
        let selectedClass = '';
        let selectedStudent = null;

        // Sélectionner une classe
        function selectClass() {
            const classSelect = document.getElementById('classSelect');
            selectedClass = classSelect.value;
            if (selectedClass) {
                document.getElementById('studentsSection').classList.remove('hidden');
                document.getElementById('currentClass').textContent = selectedClass;
                fillStudentsList(selectedClass);
            }
        }

        // Remplir la liste des élèves avec matières
        function fillStudentsList(classId) {
            const studentsList = document.getElementById('studentsList');
            studentsList.innerHTML = '';

            studentsData[classId].forEach(student => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="py-2 px-4 border">${student.matricule}</td>
                    <td class="py-2 px-4 border">${student.nom}</td>
                    <td class="py-2 px-4 border">${student.prénom}</td>
                    <td class="py-2 px-4 border">
                        <select class="w-full p-2 border border-gray-300 rounded-lg" onchange="updateNoteFields('${student.matricule}', '${student.nom} ${student.prénom}', this.value)">
                            <option value="">-- Sélectionnez une matière --</option>
                            @foreach($matieres as $subject)
                                <option value="{{ $subject->id_matiere }}" data-coef="{{ $subject->coef }}">{{ $subject->id_matiere }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="py-2 px-4 border">
                        <input type="number" min="0" max="20" step="0.5" class="w-full p-2 border border-gray-300 rounded-lg" onchange="calculateFinalNoteForRow(this, this.parentElement.parentElement.querySelector('td:nth-child(4) select'))">
                    </td>
                    <td class="py-2 px-4 border">
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-lg bg-gray-200" readonly>
                    </td>
                    <td class="py-2 px-4 border text-center">
                        <button onclick="selectStudent('${student.matricule}', '${student.nom} ${student.prénom}')" class="btn-primary px-3 py-1 rounded text-sm">
                            <i class="fas fa-edit mr-1"></i>Saisir notes
                        </button>
                    </td>
                `;
                studentsList.appendChild(row);
            });
        }

        // Mettre à jour les champs de note pour une ligne
        function updateNoteFields(matricule, name, subjectId) {
            const row = document.querySelector(`tr td button[onclick="selectStudent('${matricule}', '${name}')"]`).closest('tr');
            const noteInput = row.querySelector('td:nth-child(5) input');
            const finalNoteInput = row.querySelector('td:nth-child(6) input');
            const coef = row.querySelector('td:nth-child(4) select option[value="' + subjectId + '"]').dataset.coef || 1;

            noteInput.onchange = function() {
                calculateFinalNoteForRow(this, row.querySelector('td:nth-child(4) select'));
            };

            if (noteInput.value) {
                calculateFinalNoteForRow(noteInput, row.querySelector('td:nth-child(4) select'));
            }
        }

        // Calculer la note finale pour une ligne
        function calculateFinalNoteForRow(noteInput, subjectSelect) {
            const note = parseFloat(noteInput.value);
            const coef = parseFloat(subjectSelect.options[subjectSelect.selectedIndex].dataset.coef) || 1;
            const finalNoteInput = noteInput.parentElement.nextElementSibling.querySelector('input');

            if (!isNaN(note)) {
                const finalNote = note * coef;
                finalNoteInput.value = finalNote.toFixed(2);
            } else {
                finalNoteInput.value = '';
            }
        }

        // Sélectionner un élève
        function selectStudent(studentId, studentName) {
            selectedStudent = { id: studentId, name: studentName };
            document.getElementById('notesFormSection').classList.remove('hidden');
            document.getElementById('currentStudent').textContent = studentName;
            document.getElementById('studentMatricule').value = studentId;
            resetNoteForm();
        }

        // Calculer la note finale dans le formulaire
        function calculateFinalNote() {
            const noteInput = document.getElementById('note');
            const subjectSelect = document.getElementById('subject');
            const finalNoteInput = document.getElementById('finalNote');

            const note = parseFloat(noteInput.value);
            const coef = parseFloat(subjectSelect.options[subjectSelect.selectedIndex].dataset.coef) || 1;

            if (!isNaN(note)) {
                const finalNote = note * coef;
                finalNoteInput.value = finalNote.toFixed(2);
            } else {
                finalNoteInput.value = '';
            }
        }

        // Soumettre le formulaire de note
        function submitNoteForm(event) {
            event.preventDefault();

            const form = document.getElementById('noteForm');
            const formData = new FormData(form);

            fetch('/save-note', { // Ajustez l'URL selon votre route Laravel
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('Note enregistrée avec succès !');
                    resetNoteForm();
                    document.getElementById('notesFormSection').classList.add('hidden');
                } else {
                    showNotification('Erreur lors de l\'enregistrement.');
                }
            })
            .catch(error => {
                showNotification('Erreur serveur.');
                console.error(error);
            });
        }

        // Réinitialiser le formulaire de note
        function resetNoteForm() {
            document.getElementById('noteForm').reset();
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('evaluationDate').value = today;
            document.getElementById('finalNote').value = '';
        }

        // Réinitialiser la sélection de la classe
        function resetClassSelection() {
            document.getElementById('classSelect').value = '';
            document.getElementById('studentsSection').classList.add('hidden');
            document.getElementById('studentsList').innerHTML = '';
        }

        // Réinitialiser la sélection de l'élève
        function resetStudentSelection() {
            document.getElementById('notesFormSection').classList.add('hidden');
            selectedStudent = null;
        }

        // Afficher une notification
        function showNotification(message) {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notificationText');

            notificationText.textContent = message;
            notification.classList.remove('hidden');

            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        // Charger les données initiales si nécessaire
        window.onload = function() {
            // Ajouter un token CSRF si nécessaire (déjà inclus dans le header)
            if (!document.querySelector('meta[name="csrf-token"]')) {
                const meta = document.createElement('meta');
                meta.name = 'csrf-token';
                meta.content = '{{ csrf_token() }}';
                document.head.appendChild(meta);
            }
        };
    </script>
</body>
</html>