<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Emploi du Temps - École Primaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <header class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-blue-800">École Primaire Les Petits Génies</h1>
                    <h2 class="text-xl text-gray-600">Gestion des emplois du temps</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <select class="block appearance-none bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                            <option value="1">Pre maternelle</option>
                                    <option value="2">Petite section</option>
                                    <option value="3">Moyenne section</option>
                                    <option value="4">Grande section </option>
                                    <option value="5">SIl</option>
                                    <option value="6">Cp</option>
                                    <option value="7">CE1</option>
                                    <option value="8">CE2</option>
                                    <option value="9">CM1</option>
                                    <option value="10">CM2</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center">
                        <i class="fas fa-print mr-2"></i> Imprimer
                    </button>
                </div>
            </div>
        </header>

        <!-- Contenu principal -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Panneau des matières -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2">Matières disponibles</h3>
                <div class="space-y-2" id="subjects-panel">
                    <div class="draggable subject-color-1 p-3 rounded cursor-move flex justify-between items-center" draggable="true" data-subject="Mathématiques">
                        <span>Mathématiques</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    </div>
                    <div class="draggable subject-color-2 p-3 rounded cursor-move flex justify-between items-center" draggable="true" data-subject="Français">
                        <span>Français</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    </div>
                    <div class="draggable subject-color-3 p-3 rounded cursor-move flex justify-between items-center" draggable="true" data-subject="Sciences">
                        <span>Sciences</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    </div>
                    <div class="draggable subject-color-4 p-3 rounded cursor-move flex justify-between items-center" draggable="true" data-subject="Histoire-Géo">
                        <span>Histoire-Géo</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    </div>
                    <div class="draggable subject-color-5 p-3 rounded cursor-move flex justify-between items-center" draggable="true" data-subject="EPS">
                        <span>EPS</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    </div>
                    <div class="draggable subject-color-6 p-3 rounded cursor-move flex justify-between items-center" draggable="true" data-subject="Arts">
                        <span>Arts</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    </div>
                    <div class="draggable subject-color-7 p-3 rounded cursor-move flex justify-between items-center" draggable="true" data-subject="Musique">
                        <span>Musique</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="font-medium mb-2 text-gray-700">Ajouter une matière</h4>
                    <div class="flex">
                        <input type="text" id="new-subject" class="flex-1 border border-gray-300 rounded-l px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nouvelle matière">
                        <button id="add-subject" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Emploi du temps -->
            <div class="lg:col-span-3 bg-white p-4 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Emploi du temps - CM2 A</h3>
                    <div class="flex space-x-2">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded flex items-center">
                            <i class="fas fa-save mr-1"></i> Sauvegarder
                        </button>
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded flex items-center">
                            <i class="fas fa-redo mr-1"></i> Réinitialiser
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-200 p-2 w-24">Heures</th>
                                <th class="border border-gray-200 p-2">Lundi</th>
                                <th class="border border-gray-200 p-2">Mardi</th>
                                <th class="border border-gray-200 p-2">Mercredi</th>
                                <th class="border border-gray-200 p-2">Jeudi</th>
                                <th class="border border-gray-200 p-2">Vendredi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Matin -->
                            <tr>
                                <td class="border border-gray-200 p-2 bg-gray-50 font-medium">8h30 - 9h30</td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="lundi" data-time="8h30-9h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mardi" data-time="8h30-9h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mercredi" data-time="8h30-9h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="jeudi" data-time="8h30-9h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="vendredi" data-time="8h30-9h30"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-200 p-2 bg-gray-50 font-medium">9h30 - 10h30</td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="lundi" data-time="9h30-10h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mardi" data-time="9h30-10h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mercredi" data-time="9h30-10h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="jeudi" data-time="9h30-10h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="vendredi" data-time="9h30-10h30"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-200 p-2 bg-gray-50 font-medium">10h45 - 11h45</td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="lundi" data-time="10h45-11h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mardi" data-time="10h45-11h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mercredi" data-time="10h45-11h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="jeudi" data-time="10h45-11h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="vendredi" data-time="10h45-11h45"></td>
                            </tr>

                            <!-- Pause déjeuner -->
                            <tr>
                                <td class="border border-gray-200 p-2 bg-gray-50 font-medium">12h00 - 13h30</td>
                                <td colspan="5" class="border border-gray-200 p-2 bg-yellow-50 text-center italic text-gray-500">Pause déjeuner</td>
                            </tr>

                            <!-- Après-midi -->
                            <tr>
                                <td class="border border-gray-200 p-2 bg-gray-50 font-medium">13h30 - 14h30</td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="lundi" data-time="13h30-14h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mardi" data-time="13h30-14h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mercredi" data-time="13h30-14h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="jeudi" data-time="13h30-14h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="vendredi" data-time="13h30-14h30"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-200 p-2 bg-gray-50 font-medium">14h30 - 15h30</td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="lundi" data-time="14h30-15h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mardi" data-time="14h30-15h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mercredi" data-time="14h30-15h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="jeudi" data-time="14h30-15h30"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="vendredi" data-time="14h30-15h30"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-200 p-2 bg-gray-50 font-medium">15h45 - 16h45</td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="lundi" data-time="15h45-16h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mardi" data-time="15h45-16h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="mercredi" data-time="15h45-16h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="jeudi" data-time="15h45-16h45"></td>
                                <td class="border border-gray-200 p-0 dropzone" data-day="vendredi" data-time="15h45-16h45"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                    <h4 class="font-medium mb-2 text-blue-800">Légende</h4>
                    <div class="flex flex-wrap gap-2">
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-blue-500 mr-1"></div>
                            <span class="text-sm">Mathématiques</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-green-500 mr-1"></div>
                            <span class="text-sm">Français</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-yellow-500 mr-1"></div>
                            <span class="text-sm">Sciences</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-red-500 mr-1"></div>
                            <span class="text-sm">Histoire-Géo</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-purple-500 mr-1"></div>
                            <span class="text-sm">EPS</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-pink-500 mr-1"></div>
                            <span class="text-sm">Arts</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-indigo-500 mr-1"></div>
                            <span class="text-sm">Musique</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion du drag and drop
            const draggables = document.querySelectorAll('.draggable');
            const dropzones = document.querySelectorAll('.dropzone');
            let draggedItem = null;

            // Événements pour les éléments draggable
            draggables.forEach(draggable => {
                draggable.addEventListener('dragstart', function() {
                    draggedItem = this;
                    setTimeout(() => {
                        this.style.opacity = '0.4';
                    }, 0);
                });

                draggable.addEventListener('dragend', function() {
                    this.style.opacity = '1';
                });
            });

            // Événements pour les zones de drop
            dropzones.forEach(dropzone => {
                dropzone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    this.classList.add('highlight');
                });

                dropzone.addEventListener('dragleave', function() {
                    this.classList.remove('highlight');
                });

                dropzone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    this.classList.remove('highlight');

                    // Vider la cellule avant d'ajouter le nouveau contenu
                    this.innerHTML = '';

                    // Créer un clone de l'élément déplacé
                    const clone = draggedItem.cloneNode(true);
                    clone.classList.add('time-slot', 'p-2', 'rounded', 'shadow-sm');

                    // Ajouter un bouton de suppression
                    const deleteBtn = document.createElement('button');
                    deleteBtn.innerHTML = '<i class="fas fa-times text-red-500"></i>';
                    deleteBtn.className = 'absolute top-1 right-1';
                    deleteBtn.addEventListener('click', function() {
                        this.parentElement.remove();
                    });

                    clone.appendChild(deleteBtn);
                    this.appendChild(clone);

                    // Position relative pour le bouton de suppression
                    this.style.position = 'relative';
                });
            });

            // Ajout d'une nouvelle matière
            const addSubjectBtn = document.getElementById('add-subject');
            const newSubjectInput = document.getElementById('new-subject');

            addSubjectBtn.addEventListener('click', function() {
                const subjectName = newSubjectInput.value.trim();
                if (subjectName) {
                    const colors = ['subject-color-1', 'subject-color-2', 'subject-color-3',
                                  'subject-color-4', 'subject-color-5', 'subject-color-6', 'subject-color-7'];
                    const randomColor = colors[Math.floor(Math.random() * colors.length)];

                    const newSubject = document.createElement('div');
                    newSubject.className = `draggable ${randomColor} p-3 rounded cursor-move flex justify-between items-center`;
                    newSubject.setAttribute('draggable', 'true');
                    newSubject.setAttribute('data-subject', subjectName);
                    newSubject.innerHTML = `
                        <span>${subjectName}</span>
                        <i class="fas fa-grip-lines text-gray-500"></i>
                    `;

                    // Ajouter les événements drag au nouvel élément
                    newSubject.addEventListener('dragstart', function() {
                        draggedItem = this;
                        setTimeout(() => {
                            this.style.opacity = '0.4';
                        }, 0);
                    });

                    newSubject.addEventListener('dragend', function() {
                        this.style.opacity = '1';
                    });

                    document.getElementById('subjects-panel').appendChild(newSubject);
                    newSubjectInput.value = '';
                }
            });

            // Permettre aussi l'ajout avec la touche Entrée
            newSubjectInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    addSubjectBtn.click();
                }
            });
        });
    </script>
</body>
</html>
