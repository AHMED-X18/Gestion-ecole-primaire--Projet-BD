<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Emploi du Temps</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .subject-color-1 { background-color: #BFDBFE; color: #1E3A8A; }
        .subject-color-2 { background-color: #BBF7D0; color: #166534; }
        .subject-color-3 { background-color: #FDE68A; color: #854D0E; }
        .subject-color-4 { background-color: #FECACA; color: #991B1B; }
        .subject-color-5 { background-color: #DDD6FE; color: #5B21B6; }
        .subject-color-6 { background-color: #FBCFE8; color: #9D174D; }
        .subject-color-7 { background-color: #BAE6FD; color: #0C4A6E; }
        .subject-color-8 { background-color: #86EFAC; color: #14532D; }
        .subject-color-9 { background-color: #FCD34D; color: #92400E; }
        .subject-color-10 { background-color: #FCA5A5; color: #7F1D1D; }

        .highlight {
            background-color: #F3F4F6;
            border: 2px dashed #3B82F6;
        }

        .time-slot {
            min-height: 60px;
            position: relative;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-blue-800">École Primaire Les Etoiles de L'Avenir</h1>
                    <h2 class="text-xl text-gray-600">Gestion des emplois du temps</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <form method="GET" action="{{ route('emploidetemps') }}">
                        <div class="relative">
                            <select name="id_classe" onchange="this.form.submit()"
                                    class="block appearance-none bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                                <option value="">Sélectionnez une classe</option>
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id_classe }}"
                                       >
                                        {{ $classe->id_classe }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </form>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center">
                        <i class="fas fa-print mr-2"></i> Imprimer
                    </button>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Panneau des matières -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2">
                    @if($selectedClasse)
                        Matières {{ $selectedClasse->id_classe }}
                    @else
                        Matières disponibles
                    @endif
                </h3>

                <div class="space-y-2" id="subjects-panel">
                    @foreach($matieres as $index => $matiere)
                        @php
                            $colorIndex = ($index % 10) + 1;
                        @endphp
                        <div class="draggable subject-color-{{ $colorIndex }} p-3 rounded cursor-move flex justify-between items-center"
                             draggable="true"
                             data-subject-id="{{ $matiere->id_matiere }}"
                             data-subject-name="{{ $matiere->nom }}"
                             data-color-index="{{ $colorIndex }}">
                            <span>{{ $matiere->id_matiere }}</span>
                            <div class="flex items-center gap-2">
                                <span class="text-sm">Coef. {{ $matiere->coef }}</span>
                                <i class="fas fa-grip-lines text-gray-500"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Emploi du temps -->
            <div class="lg:col-span-3 bg-white p-4 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Emploi du temps -
                        @if($selectedClasse)
                            {{ $selectedClasse->id_classe }}
                        @endif
                    </h3>
                    <div class="flex space-x-2">
                        <button onclick="resetTimetable()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded flex items-center">
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

                <!-- Légende -->
                @if($selectedClasse && $matieres->count() > 0)
                <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                    <h4 class="font-medium mb-2 text-blue-800">Légende</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($matieres as $index => $matiere)
                            @php
                                $colorIndex = ($index % 10) + 1;
                            @endphp
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full subject-color-{{ $colorIndex }} mr-1"></div>
                                <span class="text-sm">{{ $matiere->nom }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    let draggedItem = null;
    const timetableData = @json($timetableData);

    // Remplir l'emploi du temps avec les données sauvegardées
    timetableData.forEach(item => {
        const cell = document.querySelector(`.dropzone[data-day="${item.day}"][data-time="${item.time}"]`);
        if (cell) {
            cell.innerHTML = `
                <div class="time-slot p-2 rounded shadow-sm subject-color-${item.colorIndex}" data-subject-id="${item.id_matiere}">
                    ${item.id_matiere}
                    <button class="absolute top-1 right-1">
                        <i class="fas fa-times text-red-500"></i>
                    </button>
                </div>
            `;

            cell.querySelector('button').addEventListener('click', function() {
                this.parentElement.remove();
                saveTimetable();
            });
        }
    });

    // Événements drag and drop
    document.querySelectorAll('.draggable').forEach(draggable => {
        draggable.addEventListener('dragstart', function() {
            draggedItem = this;
            setTimeout(() => this.style.opacity = '0.4', 0);
        });

        draggable.addEventListener('dragend', function() {
            this.style.opacity = '1';
        });
    });

    document.querySelectorAll('.dropzone').forEach(zone => {
        zone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('highlight');
        });

        zone.addEventListener('dragleave', function() {
            this.classList.remove('highlight');
        });

        zone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('highlight');
            this.innerHTML = ''; // Efface le contenu de la cellule.

            const subjectDiv = document.createElement('div');
            subjectDiv.className = `time-slot p-2 rounded shadow-sm subject-color-${draggedItem.dataset.colorIndex}`;
            subjectDiv.dataset.subjectId = draggedItem.dataset.id_matiere; // Utilisation de id_matiere
            subjectDiv.innerHTML = `
                ${draggedItem.dataset.id_matiere} <!-- Nom de la matière -->
                <button class="absolute top-1 right-1">
                    <i class="fas fa-times text-red-500"></i>
                </button>
            `;

            subjectDiv.querySelector('button').addEventListener('click', function() {
                this.parentElement.remove();
                saveTimetable();
            });

            this.appendChild(subjectDiv);
            saveTimetable();
        });
    });

    function saveTimetable() {
        const data = [];
        document.querySelectorAll('.dropzone').forEach(zone => {
            const subject = zone.querySelector('[data-subject-id]');
            if (subject) {
                const colorClass = Array.from(subject.classList).find(c => c.startsWith('subject-color-'));
                const colorIndex = colorClass ? parseInt(colorClass.split('-')[2]) : 1;

                data.push({
                    day: zone.dataset.day,
                    time: zone.dataset.time,
                    subjectId: subject.dataset.id_matiere, // Utilisation de id_matiere
                    subjectName: subject.dataset.id_matiere.trim(), // Nom de la matière
                    colorIndex: colorIndex
                });
            }
        });

        fetch("{{ route('timetable.save') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ timetable: data })
        });
    }

    window.resetTimetable = function() {
        if (confirm('Voulez-vous vraiment réinitialiser l\'emploi du temps ?')) {
            fetch("{{ route('timetable.reset') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => window.location.reload());
        }
    };

    // Gestion du changement de classe
    const classSelect = document.querySelector('select[name="id_classe"]');
    classSelect.addEventListener('change', function() {
        const selectedClassId = this.value;
        // Recharger les données de l'emploi du temps pour la classe sélectionnée
        window.location.href = `{{ route('emploidetemps') }}?id_classe=${selectedClassId}`;
    });
});
    </script>
</body>
</html>
