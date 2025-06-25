<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Étoiles de l'Avenir - Liste des élèves</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .classroom-item {
            transition: all 0.3s ease;
        }
        .student-item {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-800 shadow-lg">
        <div class="container mx-auto px-6 py-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <i class="fas fa-school text-white text-3xl"></i>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Les Étoiles de l'Avenir</h1>
                        <p class="text-indigo-100">Établissement d'excellence depuis 2010</p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="/images/logo.png" alt="Logo école" class="h-16 w-16 rounded-full border-2 border-white">
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Page Title -->
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-list-check mr-3 text-blue-600"></i> Liste des élèves
            </h2>
            <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                Année scolaire 2023-2024
            </span>
        </div>

        <!-- Search Bar -->
        <div class="mb-10 relative">
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Rechercher un élève..."
                       class="w-full px-5 py-4 pr-12 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500 search-input transition-all duration-300">
                <button id="searchBtn" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div id="searchResults" class="hidden absolute z-10 mt-1 w-full bg-white shadow-lg rounded-lg max-h-96 overflow-y-auto">
                <!-- Search results will appear here -->
            </div>
        </div>

        <!-- Classrooms List -->
        <div class="space-y-6">
            <!-- Section Francophone -->
            <div class="bg-white rounded-xl shadow-lg">
                <div class="section-header cursor-pointer p-6 bg-blue-50 flex justify-between items-center rounded-t-xl"
                     onclick="toggleSection('franco')">
                    <h2 class="text-xl font-bold text-blue-800">
                        <i class="fas fa-flag mr-2"></i>
                        Section Francophone
                    </h2>
                    <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300" id="franco-chevron"></i>
                </div>

                <div id="franco-content" class="hidden px-6 pb-4 space-y-4">
                    <!-- Niveau Maternelle -->
                    <div class="cursor-pointer p-4 bg-gray-50 rounded-lg flex justify-between items-center" onclick="toggleDropdown('maternelle')">
                        <h3 class="font-semibold text-lg">Niveau Maternelle</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="maternelle" class="hidden ml-4">
                        @foreach($sections['franco'] as $classe)
                            @if($classe->niveau == 'Maternelle')
                                <div class="class-group">
                                    <div class="class-header cursor-pointer p-4 bg-gray-100 rounded-lg flex justify-between items-center"
                                         onclick="toggleClassroom('classe-{{ $classe->id_classe }}')">
                                        <h4 class="font-semibold text-gray-700">
                                            {{ $classe->id_classe }}
                                        </h4>
                                        <i class="fas fa-chevron-down transition-transform duration-300" id="chevron-classe-{{ $classe->id_classe }}"></i>
                                    </div>
                                    <div id="classe-{{ $classe->id_classe }}" class="student-list hidden ml-4 space-y-2 py-2">
                                        @if($eleves['franco'][$classe->id_classe]->isEmpty())
                                            <p class="text-gray-500 text-sm">Aucun élève dans cette salle</p>
                                        @else
                                            @foreach($eleves['franco'][$classe->id_classe] as $eleve)
                                                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 rounded">
                                                    <p>{{ $eleve->nom }} {{ $eleve->prénom }}</p>
                                                    <button data-matricule="{{ $eleve->matricule }}"
                                                            class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        <i class="fas fa-info-circle"></i> Voir les informations
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Niveau Primaire -->
                    <div class="cursor-pointer p-4 bg-gray-50 rounded-lg flex justify-between items-center" onclick="toggleDropdown('primaire')">
                        <h3 class="font-semibold text-lg">Niveau Primaire</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="primaire" class="hidden ml-4">
                        @foreach($sections['franco'] as $classe)
                            @if($classe->niveau == 'Primaire')
                                <div class="class-group">
                                    <div class="class-header cursor-pointer p-4 bg-gray-100 rounded-lg flex justify-between items-center"
                                         onclick="toggleClassroom('classe-{{ $classe->id_classe }}')">
                                        <h4 class="font-semibold text-gray-700">
                                            {{ $classe->id_classe }}
                                        </h4>
                                        <i class="fas fa-chevron-down transition-transform duration-300" id="chevron-classe-{{ $classe->id_classe }}"></i>
                                    </div>
                                    <div id="classe-{{ $classe->id_classe }}" class="student-list hidden ml-4 space-y-2 py-2">
                                        @if($eleves['franco'][$classe->id_classe]->isEmpty())
                                            <p class="text-gray-500 text-sm">Aucun élève dans cette salle</p>
                                        @else
                                            @foreach($eleves['franco'][$classe->id_classe] as $eleve)
                                                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 rounded">
                                                    <p>{{ $eleve->nom }} {{ $eleve->prénom }}</p>
                                                    <button data-matricule="{{ $eleve->matricule }}"
                                                            class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        <i class="fas fa-info-circle"></i> Voir les informations
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Section Anglophone -->
            <div class="bg-white rounded-xl shadow-lg">
                <div class="section-header cursor-pointer p-6 bg-blue-50 flex justify-between items-center rounded-t-xl"
                     onclick="toggleSection('anglo')">
                    <h2 class="text-xl font-bold text-blue-800">
                        <i class="fas fa-flag mr-2"></i>
                        Section Anglophone
                    </h2>
                    <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300" id="anglo-chevron"></i>
                </div>

                <div id="anglo-content" class="hidden px-6 pb-4 space-y-4">
                    <!-- Niveau Nursery -->
                    <div class="cursor-pointer p-4 bg-gray-50 rounded-lg flex justify-between items-center" onclick="toggleDropdown('nursery')">
                        <h3 class="font-semibold text-lg">Niveau Nursery</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="nursery" class="hidden ml-4">
                        @foreach($sections['anglo'] as $classe)
                            @if($classe->niveau == 'Nursery')
                                <div class="class-group">
                                    <div class="class-header cursor-pointer p-4 bg-gray-100 rounded-lg flex justify-between items-center"
                                         onclick="toggleClassroom('classe-{{ $classe->id_classe }}')">
                                        <h4 class="font-semibold text-gray-700">
                                            {{ $classe->id_classe }}
                                        </h4>
                                        <i class="fas fa-chevron-down transition-transform duration-300" id="chevron-classe-{{ $classe->id_classe }}"></i>
                                    </div>
                                    <div id="classe-{{ $classe->id_classe }}" class="student-list hidden ml-4 space-y-2 py-2">
                                        @if($eleves['anglo'][$classe->id_classe]->isEmpty())
                                            <p class="text-gray-500 text-sm">Aucun élève dans cette salle</p>
                                        @else
                                            @foreach($eleves['anglo'][$classe->id_classe] as $eleve)
                                                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 rounded">
                                                    <p>{{ $eleve->nom }} {{ $eleve->prénom }}</p>
                                                    <button data-matricule="{{ $eleve->matricule }}"
                                                            class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        <i class="fas fa-info-circle"></i> Voir les informations
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Niveau Primary -->
                    <div class="cursor-pointer p-4 bg-gray-50 rounded-lg flex justify-between items-center" onclick="toggleDropdown('primary')">
                        <h3 class="font-semibold text-lg">Niveau Primary</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div id="primary" class="hidden ml-4">
                        @foreach($sections['anglo'] as $classe)
                            @if($classe->niveau == 'Primary')
                                <div class="class-group">
                                    <div class="class-header cursor-pointer p-4 bg-gray-100 rounded-lg flex justify-between items-center"
                                         onclick="toggleClassroom('classe-{{ $classe->id_classe }}')">
                                        <h4 class="font-semibold text-gray-700">
                                            {{ $classe->id_classe }}
                                        </h4>
                                        <i class="fas fa-chevron-down transition-transform duration-300" id="chevron-classe-{{ $classe->id_classe }}"></i>
                                    </div>
                                    <div id="classe-{{ $classe->id_classe }}" class="student-list hidden ml-4 space-y-2 py-2">
                                        @if($eleves['anglo'][$classe->id_classe]->isEmpty())
                                            <p class="text-gray-500 text-sm">Aucun élève dans cette salle</p>
                                        @else
                                            @foreach($eleves['anglo'][$classe->id_classe] as $eleve)
                                                <div class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 rounded">
                                                    <p>{{ $eleve->nom }} {{ $eleve->prénom }}</p>
                                                    <button data-matricule="{{ $eleve->matricule }}"
                                                            class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        <i class="fas fa-info-circle"></i> Voir les informations
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Définir la route Laravel dans une variable globale
        window.Laravel = {
            routes: {
                studentInfo: '{{ route("student.info", ["matricule" => ":matricule"]) }}'
            }
        };

        // Toggle section content
        function toggleSection(system) {
            const content = document.getElementById(`${system}-content`);
            const icon = document.getElementById(`${system}-chevron`);
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Toggle dropdown for class levels
        function toggleDropdown(levelId) {
            const levelContent = document.getElementById(levelId);
            levelContent.classList.toggle('hidden');
        }

        // Toggle classroom students
        function toggleClassroom(classId) {
            const classroom = document.getElementById(classId);
            classroom.classList.toggle('hidden');
            const chevron = document.getElementById(`chevron-${classId}`);
            chevron.classList.toggle('rotate-180');
        }

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', function() {
            if (this.value.length > 1) {
                performSearch(this.value);
            } else {
                searchResults.classList.add('hidden');
            }
        });

        searchBtn.addEventListener('click', function() {
            if (searchInput.value.length > 1) {
                performSearch(searchInput.value);
            }
        });

        function performSearch(query) {
            query = query.toLowerCase().trim();
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = ''; // Réinitialise les résultats

            // Parcourt tous les élèves dans le DOM
            document.querySelectorAll('.student-list > div').forEach(studentDiv => {
                const studentName = studentDiv.querySelector('p').textContent.toLowerCase();
                const studentId = studentDiv.querySelector('button').getAttribute('data-matricule'); // Récupère la chaîne exacte
                const classroom = studentDiv.closest('.class-group')
                                    .querySelector('.class-header h4').textContent
                                    .split(' (')[0];

                if (studentName.includes(query)) {
                    // Crée un élément de résultat
                    const resultItem = document.createElement('div');
                    resultItem.className = 'p-4 hover:bg-gray-100 border-b border-gray-200 last:border-b-0';
                    const studentInfoUrl = window.Laravel.routes.studentInfo.replace(':matricule', studentId);
                    resultItem.innerHTML = `
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium">${studentDiv.querySelector('p').textContent}</h4>
                                <p class="text-sm text-gray-500">${classroom}</p>
                            </div>
                            <button onclick="window.location.href='${studentInfoUrl}'"
                                    class="text-blue-600 hover:text-blue-800 transition-colors flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                Voir les informations
                            </button>
                        </div>
                    `;
                    resultsContainer.appendChild(resultItem);
                }
            });

            // Gère l'affichage des résultats ou du message vide
            if (resultsContainer.children.length === 0) {
                resultsContainer.innerHTML = '<div class="p-4 text-gray-500">Aucun élève trouvé</div>';
            }
            resultsContainer.classList.remove('hidden');
        }

        document.addEventListener('click', function(event) {
            if (!searchResults.contains(event.target) && event.target !== searchInput && event.target !== searchBtn) {
                searchResults.classList.add('hidden');
            }
        });
    </script>
</body>
</html>