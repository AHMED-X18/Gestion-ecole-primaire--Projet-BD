<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement des Notes | Les étoiles de l'avenir</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .page {
            transition: all 0.3s ease-in-out;
        }

        .students-table th {
            background-color: #16a34a;
            color: white;
        }

        .btn-primary {
            background-color: #16a34a;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #15803d;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        .btn-danger {
            background-color: #dc2626;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #b91c1c;
        }

        .card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .sequence-tab {
            transition: all 0.3s ease;
        }

        .sequence-tab.active {
            background-color: #16a34a;
            color: white;
            transform: translateY(-2px);
        }

        .note-input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }

        .stats-card {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
        }

        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #16a34a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .note-history {
            max-height: 200px;
            overflow-y: auto;
        }

        .grade-indicator {
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .grade-excellent { background-color: #16a34a; color: white; }
        .grade-good { background-color: #059669; color: white; }
        .grade-average { background-color: #d97706; color: white; }
        .grade-poor { background-color: #dc2626; color: white; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-green-600 mb-2">Les étoiles de l'avenir</h1>
            <h2 class="text-2xl text-gray-600">Système de gestion des notes par séquence</h2>
        </header>

        <!-- Statistiques rapides -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="stats-card">
                <div class="text-2xl font-bold mb-2" id="totalStudents">0</div>
                <div class="text-sm opacity-90">Élèves inscrits</div>
            </div>
            <div class="stats-card">
                <div class="text-2xl font-bold mb-2" id="totalClasses">0</div>
                <div class="text-sm opacity-90">Classes actives</div>
            </div>
            <div class="stats-card">
                <div class="text-2xl font-bold mb-2" id="notesEntered">0</div>
                <div class="text-sm opacity-90">Notes saisies</div>
            </div>
            <div class="stats-card">
                <div class="text-2xl font-bold mb-2" id="currentSequence">1</div>
                <div class="text-sm opacity-90">Séquence actuelle</div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 max-w-6xl mx-auto">
            <!-- Sélection de la séquence -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4">1. Sélectionnez la séquence</h3>
                <div class="flex flex-wrap gap-2 mb-4">
                    <button class="sequence-tab active px-4 py-2 rounded-lg border" onclick="selectSequence(1)" data-sequence="1">
                        Séquence 1
                    </button>
                    <button class="sequence-tab px-4 py-2 rounded-lg border" onclick="selectSequence(2)" data-sequence="2">
                        Séquence 2
                    </button>
                    <button class="sequence-tab px-4 py-2 rounded-lg border" onclick="selectSequence(3)" data-sequence="3">
                        Séquence 3
                    </button>
                    <button class="sequence-tab px-4 py-2 rounded-lg border" onclick="selectSequence(4)" data-sequence="4">
                        Séquence 4
                    </button>
                    <button class="sequence-tab px-4 py-2 rounded-lg border" onclick="selectSequence(5)" data-sequence="5">
                        Séquence 5
                    </button>
                    <button class="sequence-tab px-4 py-2 rounded-lg border" onclick="selectSequence(6)" data-sequence="6">
                        Séquence 6
                    </button>
                </div>
            </div>

            <!-- Sélection de la classe -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4">2. Sélectionnez la classe</h3>
                <div class="flex gap-4 items-center">
                    <select id="classSelect" class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" onchange="selectClass()">
                        <option value="">-- Sélectionnez une classe --</option>
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id_classe }}">{{ $classe->id_classe }}</option>
                        @endforeach
                    </select>
                    <button onclick="refreshClasses()" class="btn-secondary px-4 py-3 rounded-lg">
                        <i class="fas fa-sync-alt mr-2"></i>Actualiser
                    </button>
                </div>
            </div>

            <!-- Section des élèves -->
            <div id="studentsSection" class="mb-8 hidden">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">3. Élèves de la classe <span id="currentClass" class="text-green-600"></span> - Séquence <span id="displaySequence" class="text-green-600">1</span></h3>
                    <div class="flex gap-2">
                        <button onclick="saveAllNotes()" class="btn-primary px-4 py-2 rounded-lg">
                            <i class="fas fa-save mr-2"></i>Sauvegarder tout
                        </button>
                        <button onclick="resetClassSelection()" class="btn-secondary px-3 py-2 rounded text-sm">
                            <i class="fas fa-undo mr-1"></i>Changer de classe
                        </button>
                    </div>
                </div>

                <!-- Filtres et recherche -->
                <div class="mb-4 flex gap-4 items-center">
                    <div class="flex-1">
                        <input type="text" id="searchStudent" placeholder="Rechercher un élève..."
                               class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                               oninput="filterStudents()">
                    </div>
                    <select id="subjectFilter" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" onchange="filterBySubject()">
                        <option value="">Toutes les matières</option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id_matiere }}">{{ $matiere->id_matiere }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full students-table border border-gray-200 rounded-lg overflow-hidden">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 border text-left">Matricule</th>
                                <th class="py-3 px-4 border text-left">Nom complet</th>
                                <th class="py-3 px-4 border text-left">Matière</th>
                                <th class="py-3 px-4 border text-center">Note (/20)</th>
                                <th class="py-3 px-4 border text-center">Coefficient</th>
                                <th class="py-3 px-4 border text-center">Note finale</th>
                                <th class="py-3 px-4 border text-center">Appréciation</th>
                                <th class="py-3 px-4 border text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="studentsList">
                            <!-- Rempli dynamiquement -->
                        </tbody>
                    </table>
                </div>

                <!-- Résumé des notes -->
                <div id="noteSummary" class="mt-6 p-4 bg-gray-50 rounded-lg hidden">
                    <h4 class="font-semibold mb-2">Résumé des notes saisies</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>Notes excellentes (16-20): <span id="excellentCount" class="font-bold text-green-600">0</span></div>
                        <div>Notes bonnes (12-15): <span id="goodCount" class="font-bold text-blue-600">0</span></div>
                        <div>Notes moyennes (10-11): <span id="averageCount" class="font-bold text-yellow-600">0</span></div>
                        <div>Notes faibles (0-9): <span id="poorCount" class="font-bold text-red-600">0</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour l'historique des notes -->
        <div id="historyModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-screen overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Historique des notes</h3>
                        <button onclick="closeHistoryModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div id="historyContent" class="space-y-3">
                        <!-- Historique sera injecté ici -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification -->
        <div id="notification" class="fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg hidden transition-all duration-300">
            <i class="fas fa-check-circle mr-2"></i>
            <span id="notificationText"></span>
        </div>

        <!-- Loading overlay -->
        <div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-xl text-center">
                <div class="loading mb-4"></div>
                <p>Sauvegarde en cours...</p>
            </div>
        </div>
    </div>

    <script>
        let studentsData = @json($studentsData);
        let matieresData = @json($matieres);
        let selectedClass = '';
        let selectedSequence = 1;
        let currentNotes = {};
        let notesHistory = {};

        // Initialiser l'application
        window.onload = function() {
            updateStats();
            loadNotesHistory();
        };

        // Sélectionner une séquence
        function selectSequence(sequence) {
            selectedSequence = sequence;

            // Mettre à jour l'interface
            document.querySelectorAll('.sequence-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector(`[data-sequence="${sequence}"]`).classList.add('active');
            document.getElementById('displaySequence').textContent = sequence;
            document.getElementById('currentSequence').textContent = sequence;

            // Si une classe est sélectionnée, recharger les données
            if (selectedClass) {
                fillStudentsList(selectedClass);
            }
        }

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

        // Remplir la liste des élèves
        function fillStudentsList(classId) {
            const studentsList = document.getElementById('studentsList');
            studentsList.innerHTML = '';

            if (!studentsData[classId] || studentsData[classId].length === 0) {
                studentsList.innerHTML = `
                    <tr>
                        <td colspan="8" class="py-8 px-4 text-center text-gray-500">
                            <i class="fas fa-user-slash text-4xl mb-4 block"></i>
                            Aucun élève trouvé dans cette classe.
                            <br><small>Vérifiez que des élèves sont bien inscrits dans cette classe.</small>
                        </td>
                    </tr>
                `;
                return;
            }

            studentsData[classId].forEach((student, index) => {
                matieresData.forEach(matiere => {
                    const noteKey = `${student.matricule}_${matiere.id_matiere}_${selectedSequence}`;
                    const existingNote = currentNotes[noteKey] || '';
                    const finalNote = existingNote ? (parseFloat(existingNote) * parseFloat(matiere.coef)).toFixed(2) : '';

                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50 transition-colors duration-200';
                    row.innerHTML = `
                        <td class="py-3 px-4 border font-medium">${student.matricule}</td>
                        <td class="py-3 px-4 border">
                            <div class="font-medium">${student.nom} ${student.prénom}</div>
                            <div class="text-sm text-gray-500">${student.sexe}</div>
                        </td>
                        <td class="py-3 px-4 border">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                ${matiere.id_matiere}
                            </span>
                        </td>
                        <td class="py-3 px-4 border text-center">
                            <input type="number"
                                   min="0" max="20" step="0.25"
                                   value="${existingNote}"
                                   class="note-input w-20 p-2 border border-gray-300 rounded-lg text-center focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                   onchange="updateNote('${noteKey}', this.value, '${matiere.coef}', this)"
                                   data-student="${student.matricule}"
                                   data-matiere="${matiere.id_matiere}"
                                   data-sequence="${selectedSequence}">
                        </td>
                        <td class="py-3 px-4 border text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-bold">
                                ${matiere.coef}
                            </span>
                        </td>
                        <td class="py-3 px-4 border text-center">
                            <input type="text"
                                   value="${finalNote}"
                                   class="w-20 p-2 border border-gray-300 rounded-lg bg-gray-100 text-center font-bold"
                                   readonly>
                        </td>
                        <td class="py-3 px-4 border text-center">
                            <span class="grade-indicator ${getGradeClass(existingNote)}" id="grade_${noteKey}">
                                ${getGradeText(existingNote)}
                            </span>
                        </td>
                        <td class="py-3 px-4 border text-center">
                            <div class="flex gap-1 justify-center">
                                <button onclick="showHistory('${student.matricule}', '${matiere.id_matiere}')"
                                        class="btn-secondary px-2 py-1 rounded text-xs" title="Voir l'historique">
                                    <i class="fas fa-history"></i>
                                </button>
                                <button onclick="deleteNote('${noteKey}', this)"
                                        class="btn-danger px-2 py-1 rounded text-xs" title="Supprimer la note">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    studentsList.appendChild(row);
                });
            });

            updateNoteSummary();
        }

        // Mettre à jour une note
        function updateNote(noteKey, value, coefficient, inputElement) {
            currentNotes[noteKey] = value;

            // Calculer la note finale
            const finalNote = value ? (parseFloat(value) * parseFloat(coefficient)).toFixed(2) : '';
            const finalNoteInput = inputElement.parentElement.nextElementSibling.nextElementSibling.querySelector('input');
            finalNoteInput.value = finalNote;

            // Mettre à jour l'appréciation
            const gradeElement = inputElement.parentElement.parentElement.querySelector(`#grade_${noteKey}`);
            gradeElement.textContent = getGradeText(value);
            gradeElement.className = `grade-indicator ${getGradeClass(value)}`;

            // Changer la couleur de l'input temporairement pour indiquer le changement
            inputElement.style.backgroundColor = '#fef3c7';
            setTimeout(() => {
                inputElement.style.backgroundColor = '';
            }, 1000);

            updateNoteSummary();
        }

        // Obtenir la classe CSS pour la note
        function getGradeClass(note) {
            if (!note) return '';
            const n = parseFloat(note);
            if (n >= 16) return 'grade-excellent';
            if (n >= 12) return 'grade-good';
            if (n >= 10) return 'grade-average';
            return 'grade-poor';
        }

        // Obtenir le texte d'appréciation
        function getGradeText(note) {
            if (!note) return 'Non noté';
            const n = parseFloat(note);
            if (n >= 16) return 'Excellent';
            if (n >= 14) return 'Très bien';
            if (n >= 12) return 'Bien';
            if (n >= 10) return 'Assez bien';
            if (n >= 8) return 'Passable';
            return 'Insuffisant';
        }

        // Sauvegarder toutes les notes
        function saveAllNotes() {
            if (Object.keys(currentNotes).length === 0) {
                showNotification('Aucune note à sauvegarder.', 'warning');
                return;
            }

            document.getElementById('loadingOverlay').classList.remove('hidden');

            const notesToSave = [];
            Object.keys(currentNotes).forEach(key => {
                if (currentNotes[key] && currentNotes[key] !== '') {
                    const [matricule, matiere, sequence] = key.split('_');
                    const matiereData = matieresData.find(m => m.id_matiere === matiere);
                    const note = parseFloat(currentNotes[key]);
                    const noteFinal = note * parseFloat(matiereData.coef);

                    notesToSave.push({
                        matricule: matricule,
                        id_matiere: matiere,
                        sequence: parseInt(sequence),
                        note: note,
                        note_finale: noteFinal,
                        date_saisie: new Date().toISOString().split('T')[0]
                    });
                }
            });

            fetch('/notes/save-bulk', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    notes: notesToSave,
                    classe: selectedClass,
                    sequence: selectedSequence
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('loadingOverlay').classList.add('hidden');

                if (data.success) {
                    showNotification(`Notes sauvegardées avec succès !`, 'success');
                    updateStats();

                    // Réinitialiser les notes courantes
                    currentNotes = {};

                    // Optionnel: recharger les données pour afficher les notes sauvegardées
                    // fillStudentsList(selectedClass);
                } else {
                    showNotification('Erreur lors de la sauvegarde: ' + (data.message || 'Erreur inconnue'), 'error');
                }
            })
            .catch(error => {
                document.getElementById('loadingOverlay').classList.add('hidden');
                showNotification('Erreur de connexion au serveur.', 'error');
                console.error('Erreur:', error);
            });
        }

        // Supprimer une note
        function deleteNote(noteKey, buttonElement) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette note ?')) {
                delete currentNotes[noteKey];

                const row = buttonElement.closest('tr');
                const noteInput = row.querySelector('.note-input');
                const finalNoteInput = row.querySelector('input[readonly]');
                const gradeElement = row.querySelector('.grade-indicator');

                noteInput.value = '';
                finalNoteInput.value = '';
                gradeElement.textContent = 'Non noté';
                gradeElement.className = 'grade-indicator';

                updateNoteSummary();
                showNotification('Note supprimée.', 'info');
            }
        }

        // Filtrer les élèves
        function filterStudents() {
            const searchTerm = document.getElementById('searchStudent').value.toLowerCase();
            const rows = document.querySelectorAll('#studentsList tr');

            rows.forEach(row => {
                const studentName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const matricule = row.querySelector('td:nth-child(1)').textContent.toLowerCase();

                if (studentName.includes(searchTerm) || matricule.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Filtrer par matière
        function filterBySubject() {
            const selectedSubject = document.getElementById('subjectFilter').value;
            const rows = document.querySelectorAll('#studentsList tr');

            rows.forEach(row => {
                if (!selectedSubject) {
                    row.style.display = '';
                } else {
                    const matiere = row.querySelector('td:nth-child(3) span').textContent;
                    const matiereData = matieresData.find(m => m.nom_matiere === matiere);

                    if (matiereData && matiereData.id_matiere === selectedSubject) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        }

        // Mettre à jour le résumé des notes
        function updateNoteSummary() {
            const summary = document.getElementById('noteSummary');
            let excellent = 0, good = 0, average = 0, poor = 0;

            Object.values(currentNotes).forEach(note => {
                if (note && note !== '') {
                    const n = parseFloat(note);
                    if (n >= 16) excellent++;
                    else if (n >= 12) good++;
                    else if (n >= 10) average++;
                    else poor++;
                }
            });

            document.getElementById('excellentCount').textContent = excellent;
            document.getElementById('goodCount').textContent = good;
            document.getElementById('averageCount').textContent = average;
            document.getElementById('poorCount').textContent = poor;

            if (excellent + good + average + poor > 0) {
                summary.classList.remove('hidden');
            }
        }

        // Afficher l'historique des notes
        function showHistory(matricule, matiereId) {
            // Cette fonction nécessiterait un appel AJAX pour récupérer l'historique
            document.getElementById('historyModal').classList.remove('hidden');
            document.getElementById('historyContent').innerHTML = '<p>Chargement de l\'historique...</p>';

            // Simuler le chargement de l'historique
            setTimeout(() => {
                document.getElementById('historyContent').innerHTML = `
                    <div class="text-center text-gray-500">
                        <i class="fas fa-clock text-2xl mb-2"></i>
                        <p>Historique des notes pour ${matricule}</p>
                        <small>Fonctionnalité à implémenter avec l'API</small>
                    </div>
                `;
            }, 1000);
        }

        // Fermer le modal d'historique
        function closeHistoryModal() {
            document.getElementById('historyModal').classList.add('hidden');
        }

        // Actualiser les classes
        function refreshClasses() {
            location.reload();
        }

        // Réinitialiser la sélection de classe
        function resetClassSelection() {
            document.getElementById('classSelect').value = '';
            document.getElementById('studentsSection').classList.add('hidden');
            document.getElementById('studentsList').innerHTML = '';
            document.getElementById('noteSummary').classList.add('hidden');
            currentNotes = {};
        }

        // Mettre à jour les statistiques
        function updateStats() {
            // Ces valeurs devraient être récupérées du serveur
            document.getElementById('totalStudents').textContent = Object.values(studentsData).reduce((total, students) => total + students.length, 0);
            document.getElementById('totalClasses').textContent = Object.keys(studentsData).length;
            document.getElementById('notesEntered').textContent = Object.keys(currentNotes).length;
        }

        // Charger l'historique des notes
        function loadNotesHistory() {
            // Cette fonction chargerait l'historique depuis le serveur
            // Pour l'instant, on utilise localStorage comme démonstration
            const saved = localStorage.getItem('notesHistory');
            if (saved) {
                notesHistory = JSON.parse(saved);
            }
        }

        // Afficher une notification
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notificationText');

            // Définir les couleurs selon le type
            notification.className = 'fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg transition-all duration-300';

            switch(type) {
                case 'success':
                    notification.classList.add('bg-green-500', 'text-white');
                    break;
                case 'error':
                    notification.classList.add('bg-red-500', 'text-white');
                    break;
                case 'warning':
                    notification.classList.add('bg-yellow-500', 'text-white');
                    break;
                case 'info':
                    notification.classList.add('bg-blue-500', 'text-white');
                    break;
                default:
                    notification.classList.add('bg-gray-500', 'text-white');
            }

            notificationText.textContent = message;
            notification.classList.remove('hidden');

            // Masquer après 3 secondes
            setTimeout(() => {
                notification.classList.add('hidden');
                // Nettoyer les classes de couleur
                notification.classList.remove('bg-green-500', 'bg-red-500', 'bg-yellow-500', 'bg-blue-500', 'bg-gray-500', 'text-white');
            }, 3000);
        }

        // Fonction utilitaire pour sauvegarder dans localStorage (si nécessaire)
        function saveToLocalStorage(key, data) {
            try {
                localStorage.setItem(key, JSON.stringify(data));
            } catch(e) {
                console.warn('Impossible de sauvegarder dans localStorage:', e);
            }
        }

        // Fonction utilitaire pour charger depuis localStorage
        function loadFromLocalStorage(key, defaultValue = null) {
            try {
                const item = localStorage.getItem(key);
                return item ? JSON.parse(item) : defaultValue;
            } catch(e) {
                console.warn('Impossible de charger depuis localStorage:', e);
                return defaultValue;
            }
        }

        // Gestionnaire d'événements pour la fermeture du modal avec Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('historyModal');
                if (!modal.classList.contains('hidden')) {
                    closeHistoryModal();
                }
            }
        });

        // Gestionnaire pour fermer le modal en cliquant à l'extérieur
        document.getElementById('historyModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeHistoryModal();
            }
        });

        // Fonction pour exporter les notes (optionnelle)
        function exportNotes() {
            if (Object.keys(currentNotes).length === 0) {
                showNotification('Aucune note à exporter.', 'warning');
                return;
            }

            const csvContent = "data:text/csv;charset=utf-8," +
                "Matricule,Matière,Séquence,Note,Note Finale\n" +
                Object.keys(currentNotes).map(key => {
                    const [matricule, matiere, sequence] = key.split('_');
                    const matiereData = matieresData.find(m => m.id_matiere === matiere);
                    const note = currentNotes[key];
                    const noteFinal = note ? (parseFloat(note) * parseFloat(matiereData.coef)).toFixed(2) : '';
                    return `${matricule},${matiereData.nom_matiere},${sequence},${note},${noteFinal}`;
                }).join("\n");

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `notes_${selectedClass}_sequence_${selectedSequence}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            showNotification('Notes exportées avec succès !', 'success');
        }

        // Auto-sauvegarde périodique (optionnelle)
        setInterval(() => {
            if (Object.keys(currentNotes).length > 0) {
                saveToLocalStorage('currentNotes', currentNotes);
                saveToLocalStorage('autoSaveTimestamp', new Date().toISOString());
            }
        }, 30000); // Sauvegarde automatique toutes les 30 secondes

        // Restaurer les notes depuis la sauvegarde automatique au chargement
        window.addEventListener('load', function() {
            const savedNotes = loadFromLocalStorage('currentNotes', {});
            const timestamp = loadFromLocalStorage('autoSaveTimestamp');

            if (Object.keys(savedNotes).length > 0 && timestamp) {
                const timeDiff = new Date() - new Date(timestamp);
                const hoursDiff = timeDiff / (1000 * 60 * 60);

                if (hoursDiff < 24) { // Restaurer seulement si moins de 24h
                    if (confirm('Des notes non sauvegardées ont été trouvées. Voulez-vous les restaurer ?')) {
                        currentNotes = savedNotes;
                        showNotification('Notes restaurées depuis la sauvegarde automatique.', 'info');
                    }
                }
            }
        });

    </script>
</body>
</html>
