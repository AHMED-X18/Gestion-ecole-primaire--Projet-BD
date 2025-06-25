<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Gestion scolaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/tableau de bord.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendrier.css') }}"> <!-- Inclure le CSS du calendrier -->
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-green-700 text-white w-64 flex-shrink-0 flex flex-col">
            <div class="p-4 flex items-center justify-between border-b border-green-800">
                <div class="flex items-center">
                    <i class="fas fa-school text-2xl mr-3"></i>
                    <span class="sidebar-text text-xl font-bold">Les Etoiles de l'Avenir</span>
                </div>
                <button id="toggleSidebar" class="text-gray-300 hover:text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="flex-grow p-4 overflow-y-auto">
                <div class="mb-8">
                    <div class="flex items-center mb-4 p-2 bg-green-800 rounded-lg">
                        @if (session('admin'))
                        <img src="{{ asset('images/'.session('admin')->profil) }}"
                             class="w-10 h-10 rounded-full mr-3">
                        @else
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=7e22ce&color=fff"
                             class="w-10 h-10 rounded-full mr-3">
                        @endif
                        <div class="sidebar-text">
                            @if (session('admin'))
                            <div class="font-medium">{{session('admin')->nom}}</div>
                            <div class="text-xs text-green-300">Administrateur</div>
                            @else
                            <div class="font-medium">New user</div>
                            <div class="text-xs text-green-300">Administrateur</div>
                            @endif
                        </div>
                    </div>
                </div>
                <nav>
                    <a href="#" class="flex items-center p-3 rounded-lg bg-green-800 text-white mb-2" onclick="showDashboard()">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span class="sidebar-text">Tableau de bord</span>
                    </a>
                    <a href="#" class="flex items-center p-3 rounded-lg text-green-300 hover:bg-green-800 hover:text-white mb-2" onclick="showCalendar()">
                        <i class="fas fa-calendar-alt mr-3"></i>
                        <span class="sidebar-text">Calendrier</span>
                    </a>
                    <a href="#" class="flex items-center p-3 rounded-lg text-green-300 hover:bg-green-800 hover:text-white mb-2">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span class="sidebar-text">Statistiques</span>
                    </a>
                    <a href="#" class="flex items-center p-3 rounded-lg text-green-300 hover:bg-green-800 hover:text-white mb-2">
                        <i class="fas fa-cog mr-3"></i>
                        <span class="sidebar-text">Paramètres</span>
                    </a>
                </nav>
            </div>
            <div class="p-4 border-t border-green-800">
                <a href="{{ route('logout.user') }}" class="flex items-center text-green-300 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span class="sidebar-text">Déconnexion</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-1 overflow-auto transition-all">
            <header class="bg-white shadow-sm p-4">
                <div class="flex justify-between items-center">
                    <h1 id="mainTitle" class="text-2xl font-bold text-gray-800">Tableau de bord</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                            </button>
                        </div>
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-blue-500"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-xl p-6 mb-8 text-white shadow-lg">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div>
                        @if (session('admin'))
                            <h2 class="text-2xl font-bold mb-2">Bienvenue, {{session('admin')->nom}}!</h2>
                        @else
                            <h2 class="text-2xl font-bold mb-2">Bienvenue, Nouvel utilisateur!</h2>
                        @endif
                            <p class="opacity-90">Gérez efficacement tous les aspects de votre établissement scolaire.</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <button class="bg-white text-blue-700 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition">
                                <i class="fas fa-question-circle mr-2"></i> Centre d'aide
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8" id="dashboardCards">
                    <!-- Student Card -->
                    <div class="card-float bg-white rounded-2xl overflow-hidden shadow-xl transform transition hover:shadow-2xl hover:-translate-y-1 cursor-pointer"
                         onclick="showOptions('students')">
                        <div class="relative">
                            <div class="h-40 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                                <i class="fas fa-user-graduate text-white text-6xl opacity-70"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Gestion des Élèves</h3>
                            <p class="text-gray-600">Inscription, suivi scolaire, bulletins et gestion des classes.</p>
                            <div class="mt-4 flex justify-end">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-chevron-right text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Teacher Card -->
                    <div class="card-float bg-white rounded-2xl overflow-hidden shadow-xl transform transition hover:shadow-2xl hover:-translate-y-1 cursor-pointer"
                         onclick="showOptions('teachers')">
                        <div class="relative">
                            <div class="h-40 bg-gradient-to-r from-purple-400 to-purple-600 flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-white text-6xl opacity-70"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Gestion des Enseignants</h3>
                            <p class="text-gray-600">Planning, évaluation, affectation aux classes et gestion des cours.</p>
                            <div class="mt-4 flex justify-end">
                                <button class="text-purple-600 hover:text-purple-800">
                                    <i class="fas fa-chevron-right text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Staff Card -->
                    <div class="card-float bg-white rounded-2xl overflow-hidden shadow-xl transform transition hover:shadow-2xl hover:-translate-y-1 cursor-pointer"
                         onclick="showOptions('admin')">
                        <div class="relative">
                            <div class="h-40 bg-gradient-to-r from-red-400 to-red-600 flex items-center justify-center">
                                <i class="fas fa-user-tie text-white text-6xl opacity-70"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Personnel Administratif</h3>
                            <p class="text-gray-600">Gestion des secrétaires, comptables et autres membres administratifs.</p>
                            <div class="mt-4 flex justify-end">
                                <button class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-chevron-right text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Maintenance Card -->
                    <div class="card-float bg-white rounded-2xl overflow-hidden shadow-xl transform transition hover:shadow-2xl hover:-translate-y-1 cursor-pointer"
                         onclick="showOptions('maintenance')">
                        <div class="relative">
                            <div class="h-40 bg-gradient-to-r from-yellow-400 to-yellow-600 flex items-center justify-center">
                                <i class="fas fa-broom text-white text-6xl opacity-70"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Personnel d'Entretien</h3>
                            <p class="text-gray-600">Planning des équipes, gestion des tâches et des locaux.</p>
                            <div class="mt-4 flex justify-end">
                                <button class="text-yellow-600 hover:text-yellow-800">
                                    <i class="fas fa-chevron-right text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendar Container -->
                <div id="calendarContainer" class="hidden">
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden w-full max-w-2xl fade-in">
                        <!-- Header -->
                        <div class="bg-blue-600 text-white p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h1 class="text-2xl font-bold">Mon Calendrier</h1>
                                <button id="today-btn" class="bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-lg text-sm font-medium transition">
                                    Aujourd'hui
                                </button>
                            </div>

                            <!-- Month Navigation -->
                            <div class="flex justify-between items-center">
                                <button id="prev-month" class="p-2 rounded-full hover:bg-blue-700 transition">
                                    <i class="fas fa-chevron-left"></i>
                                </button>

                                <h2 id="month-year" class="text-xl font-semibold mx-4">Janvier 2023</h2>

                                <button id="next-month" class="p-2 rounded-full hover:bg-blue-700 transition">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Weekdays -->
                        <div class="grid calendar-grid bg-blue-50 py-2 px-1">
                            <div class="text-center font-medium text-blue-600 py-1">Dim</div>
                            <div class="text-center font-medium text-blue-600 py-1">Lun</div>
                            <div class="text-center font-medium text-blue-600 py-1">Mar</div>
                            <div class="text-center font-medium text-blue-600 py-1">Mer</div>
                            <div class="text-center font-medium text-blue-600 py-1">Jeu</div>
                            <div class="text-center font-medium text-blue-600 py-1">Ven</div>
                            <div class="text-center font-medium text-blue-600 py-1">Sam</div>
                        </div>

                        <!-- Calendar Grid -->
                        <div id="calendar-days" class="grid calendar-grid gap-1 p-2">
                            <!-- Les jours seront générés dynamiquement par calendrier.js -->
                        </div>

                        <!-- Selected Date Info -->
                        <div id="selected-info" class="border-t border-gray-200 p-4 bg-gray-50 hidden">
                            <h3 class="font-semibold text-lg mb-2">Date sélectionnée</h3>
                            <p id="selected-date-text" class="text-gray-700"></p>
                            <div class="mt-3 flex space-x-2">
                                <button id="add-event" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                    <i class="fas fa-plus mr-1"></i> Ajouter un événement
                                </button>
                                <button id="clear-selection" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded text-sm">
                                    Effacer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Modal -->
                    <div id="event-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                        <div class="bg-white rounded-lg p-6 w-full max-w-md">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-bold">Ajouter un événement</h3>
                                <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                    <input id="event-date" type="text" class="w-full border border-gray-300 rounded px-3 py-2" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                                    <input id="event-title" type="text" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Nom de l'événement">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea id="event-description" class="w-full border border-gray-300 rounded px-3 py-2" rows="3" placeholder="Détails..."></textarea>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3">
                                <button id="cancel-event" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Annuler
                                </button>
                                <button id="save-event" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Options Modal (Hidden by default) -->
                <div id="optionsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full max-h-screen overflow-y-auto scale-in">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 id="modalTitle" class="text-xl font-bold text-gray-800"></h3>
                                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div id="modalContent" class="space-y-3">
                                <!-- Options will be injected here -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('js/list.js') }}"></script>
    <script src="{{ asset('js/tableau de bord.js') }}"></script>
    <script src="{{ asset('js/calendrier.js') }}"></script> <!-- Inclure le JS du calendrier -->
    <script>
        // Toggle sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');

            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Show options modal based on category
        function showOptions(category) {
            const modal = document.getElementById('optionsModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalContent = document.getElementById('modalContent');

            let title = '';
            let options = [];

            switch(category) {
                case 'students':
                    title = 'Options pour les Élèves';
                    options = [
                        {icon: 'user-plus', text: 'Inscrire un nouvel élève', routeKey:'create', color: 'bg-blue-100 text-blue-600'},
                        {icon: 'users', text: 'Liste des élèves', routeKey:'list', color: 'bg-blue-100 text-blue-600'},
                        {icon: 'file-alt', text: 'Gestion des notes', routeKey:'bulletins', color: 'bg-blue-100 text-blue-600'},
                        {icon: 'calendar-alt', text: 'Emploi du temps', routeKey:'schedule', color: 'bg-blue-100 text-blue-600'}
                    ];
                    break;
                case 'teachers':
                    title = 'Options pour les Enseignants';
                    options = [
                        {icon: 'user-plus', text: 'Ajouter un enseignant', color: 'bg-purple-100 text-purple-600'},
                        {icon: 'users', text: 'Liste des enseignants', color: 'bg-purple-100 text-purple-600'},
                        {icon: 'calendar-alt', text: 'Planning des cours', color: 'bg-purple-100 text-purple-600'},
                    ];
                    break;
                case 'admin':
                    title = 'Options pour le Personnel Administratif';
                    options = [
                        {icon: 'user-plus', text: 'Ajouter un membre', routeKey: 'create', color: 'bg-red-100 text-red-600'},
                        {icon: 'users', text: 'Liste du personnel', color: 'bg-red-100 text-red-600'},
                        {icon: 'file-invoice-dollar', text: 'Gestion de la comptabilité', color: 'bg-red-100 text-red-600'},
                        {icon: 'envelope', text: 'Communication avec les parents', color: 'bg-red-100 text-red-600'},
                        {icon: 'archive', text: 'Gestion des archives', color: 'bg-red-100 text-red-600'},
                        {icon: 'building', text: 'Gestion des locaux', color: 'bg-red-100 text-red-600'}
                    ];
                    break;
                case 'maintenance':
                    title = 'Options pour le Personnel d\'Entretien';
                    options = [
                        {icon: 'user-plus', text: 'Ajouter un membre', color: 'bg-yellow-100 text-yellow-600'},
                        {icon: 'users', text: 'Liste du personnel', color: 'bg-yellow-100 text-yellow-600'},
                        {icon: 'calendar-alt', text: 'Planning des équipes', color: 'bg-yellow-100 text-yellow-600'},
                        {icon: 'wrench', text: 'Gestion du matériel', color: 'bg-yellow-100 text-yellow-600'}
                    ];
                    break;
            }

            modalTitle.textContent = title;
            modalContent.innerHTML = '';

            options.forEach(option => {
                const optionEl = document.createElement('a');
                optionEl.className = `flex items-center p-3 rounded-lg ${option.color} hover:bg-opacity-80 cursor-pointer transition`;
                optionEl.href = appRoutes[category][option.routeKey]; // Utilisation de appRoutes
                optionEl.innerHTML = `
                    <i class="fas fa-${option.icon} mr-3"></i>
                    <span>${option.text}</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
                `;
                modalContent.appendChild(optionEl);
            });

            modal.classList.remove('hidden');
        }

        // Close modal
        function closeModal() {
            document.getElementById('optionsModal').classList.add('hidden');
        }

        // Show dashboard
        function showDashboard() {
            document.getElementById('dashboardCards').classList.remove('hidden');
            document.getElementById('calendarContainer').classList.add('hidden');
            document.getElementById('mainTitle').textContent = 'Tableau de bord';
        }

        // Show calendar
        function showCalendar() {
            document.getElementById('dashboardCards').classList.add('hidden');
            document.getElementById('calendarContainer').classList.remove('hidden');
            document.getElementById('mainTitle').textContent = 'Calendrier';

            // Initialiser le calendrier si nécessaire (délégué à calendrier.js)
            // Assurez-vous que calendrier.js gère l'initialisation
        }

        // Charger le tableau de bord par défaut au démarrage
        window.onload = function() {
            showDashboard();
            if (typeof appRoutes === 'undefined') {
                console.error('appRoutes n\'est pas défini. Vérifiez tableau de bord.js.');
            }
            // L'initialisation du calendrier est gérée par calendrier.js
        };
    </script>
</body>
</html>
