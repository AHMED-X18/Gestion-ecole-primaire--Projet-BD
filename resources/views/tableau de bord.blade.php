<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Gestion scolaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/tableau de bord.css') }}">
    <style>
        /* Styles pour le calendrier */
        .calendar-container {
            display: none;
            padding: 1.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            margin: 1.5rem;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f3f4f6;
        }

        .calendar-nav-btn {
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .calendar-nav-btn:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
            background: #e5e7eb;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .calendar-day-header {
            background: #16a34a;
            color: white;
            padding: 0.75rem;
            text-align: center;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .calendar-day {
            background: white;
            min-height: 80px;
            padding: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
            border: 2px solid transparent;
        }

        .calendar-day:hover {
            background: #f8fafc;
            border-color: #16a34a;
        }

        .calendar-day.other-month {
            background: #f9fafb;
            color: #9ca3af;
        }

        .calendar-day.today {
            background: #dcfce7;
            border-color: #16a34a;
            font-weight: bold;
        }

        .calendar-day.selected {
            background: #16a34a;
            color: white;
        }

        .event-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            position: absolute;
            top: 4px;
            right: 4px;
        }

        .event-list {
            margin-top: 0.25rem;
        }

        .event-item {
            background: #fef3c7;
            color: #92400e;
            font-size: 0.625rem;
            padding: 0.125rem 0.25rem;
            border-radius: 0.25rem;
            margin-bottom: 0.125rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .event-item:hover {
            background: #fcd34d;
        }

        /* Modal pour les événements */
        .event-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        .event-modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: slideIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translate(-50%, -60%); opacity: 0; }
            to { transform: translate(-50%, -50%); opacity: 1; }
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #374151;
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #16a34a;
        }

        .btn-primary {
            background: #16a34a;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-right: 0.5rem;
        }

        .btn-primary:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .calendar-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
            padding: 1.5rem;
            border-radius: 1rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.3);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-green-700 text-white w-64 flex-shrink-0 flex flex-col">
            <div class="p-4 flex items-center justify-between border-b border-indigo-800">
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
                        <img src="{{ "images/".session('admin')->profil }}"
                             class="w-10 h-10 rounded-full mr-3">
                        @else
                         <img src="https://ui-avatars.com/api/?name=Admin+User&background=7e22ce&color=fff"
                             class="w-10 h-10 rounded-full mr-3">
                        @endif
                        <div class="sidebar-text">
                            @if (session('admin'))
                            <div class="font-medium">{{session('admin')->nom}}</div>
                            <div class="text-xs text-indigo-300">Administrateur</div>
                            @else
                            <div class="font-medium">New user</div>
                            <div class="text-xs text-indigo-300">Administrateur</div>
                            @endif
                        </div>
                    </div>
                </div>
                <nav>
                    <a href="#" class="flex items-center p-3 rounded-lg bg-green-800 text-white mb-2">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span class="sidebar-text">Tableau de bord</span>
                    </a>
                    <a href="#" class="flex items-center p-3 rounded-lg text-green-300 hover:bg-green-800 hover:text-white mb-2">
                        <i class="fas fa-calendar-alt mr-3"></i>
                        <span class="sidebar-text">Calendrier</span>
                    </a>

                </nav>
            </div>
            <div class="p-4 border-t border-indigo-800">
                <a href="{{ route('logout.user') }}" class="flex items-center text-indigo-300 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span class="sidebar-text">Déconnexion</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-1 overflow-auto transition-all">
            <header class="bg-white shadow-sm p-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Tableau de bord</h1>
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
                                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-green-500"></span>
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
                    </div>
                </div>

                <!-- Floating Cards Grid -->
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
            <div id="calendarSection" class="calendar-container">
                <div class="calendar-stats">
                    <div class="stat-card">
                        <div class="stat-number" id="totalEvents">0</div>
                        <div class="stat-label">Événements ce mois</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" id="todayEvents">0</div>
                        <div class="stat-label">Événements aujourd'hui</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" id="upcomingEvents">0</div>
                        <div class="stat-label">Événements à venir</div>
                    </div>
                </div>

                <div class="calendar-header">
                    <button class="calendar-nav-btn" onclick="previousMonth()">
                        <i class="fas fa-chevron-left"></i> Précédent
                    </button>
                    <h2 id="currentMonth" class="text-2xl font-bold text-gray-800"></h2>
                    <button class="calendar-nav-btn" onclick="nextMonth()">
                        Suivant <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <div class="calendar-grid" id="calendarGrid">
                    <!-- Le calendrier sera généré ici -->
                </div>

                <div class="mt-6 text-center">
                    <button class="btn-primary" onclick="showEventModal()">
                        <i class="fas fa-plus"></i> Ajouter un événement
                    </button>
                    <button class="btn-secondary" onclick="showDashboard()">
                        <i class="fas fa-arrow-left"></i> Retour au tableau de bord
                    </button>
                </div>
            </div>

            <!-- Modal pour ajouter/modifier des événements -->
            <div id="eventModal" class="event-modal">
                <div class="event-modal-content">
                    <div class="flex justify-between items-center mb-4">
                        <h3 id="eventModalTitle" class="text-xl font-bold text-gray-800">Ajouter un événement</h3>
                        <button onclick="closeEventModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <form id="eventForm">
                        <div class="form-group">
                            <label class="form-label" for="eventTitle">Titre de l'événement</label>
                            <input type="text" id="eventTitle" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="eventDate">Date</label>
                            <input type="date" id="eventDate" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="eventTime">Heure</label>
                            <input type="time" id="eventTime" class="form-input">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="eventCategory">Catégorie</label>
                            <select id="eventCategory" class="form-select">
                                <option value="cours">Cours</option>
                                <option value="reunion">Réunion</option>
                                <option value="examen">Examen</option>
                                <option value="evenement">Événement spécial</option>
                                <option value="conge">Congé</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="eventDescription">Description</label>
                            <textarea id="eventDescription" class="form-textarea" rows="3"></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" class="btn-secondary" onclick="closeEventModal()">Annuler</button>
                            <button type="submit" class="btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/list.js') }}"></script>
    <script src="{{ asset('js/tableau de bord.js') }}"></script>
    <script>
        // Variables globales pour le calendrier
        let currentDate = new Date();
        let selectedDate = null;
        let events = JSON.parse(localStorage.getItem('schoolEvents') || '{}');
        let currentEditingEvent = null;

        // Noms des mois et jours en français
        const monthNames = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ];

        const dayNames = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];

        // Fonction pour afficher le calendrier
        function showCalendar() {
            document.getElementById('dashboardCards').style.display = 'none';
            document.querySelector('.bg-gradient-to-r').style.display = 'none';
            document.getElementById('calendarSection').style.display = 'block';

            // Mettre à jour l'état actif dans la sidebar
            document.querySelectorAll('.sidebar nav a').forEach(link => {
                link.classList.remove('bg-green-800', 'text-white');
                link.classList.add('text-green-300', 'hover:bg-green-800', 'hover:text-white');
            });

            document.querySelectorAll('.sidebar nav a')[1].classList.remove('text-green-300', 'hover:bg-green-800', 'hover:text-white');
            document.querySelectorAll('.sidebar nav a')[1].classList.add('bg-green-800', 'text-white');

            generateCalendar();
            updateStats();
        }

        // Fonction pour afficher le tableau de bord
        function showDashboard() {
            document.getElementById('calendarSection').style.display = 'none';
            document.getElementById('dashboardCards').style.display = 'grid';
            document.querySelector('.bg-gradient-to-r').style.display = 'flex';

            // Mettre à jour l'état actif dans la sidebar
            document.querySelectorAll('.sidebar nav a').forEach(link => {
                link.classList.remove('bg-green-800', 'text-white');
                link.classList.add('text-green-300', 'hover:bg-green-800', 'hover:text-white');
            });

            document.querySelectorAll('.sidebar nav a')[0].classList.remove('text-green-300', 'hover:bg-green-800', 'hover:text-white');
            document.querySelectorAll('.sidebar nav a')[0].classList.add('bg-green-800', 'text-white');
        }

        // Générer le calendrier
        function generateCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const firstDayOfWeek = firstDay.getDay();
            const daysInMonth = lastDay.getDate();

            const calendarGrid = document.getElementById('calendarGrid');
            calendarGrid.innerHTML = '';

            // En-têtes des jours
            dayNames.forEach(day => {
                const dayHeader = document.createElement('div');
                dayHeader.className = 'calendar-day-header';
                dayHeader.textContent = day;
                calendarGrid.appendChild(dayHeader);
            });

            // Jours du mois précédent
            const prevMonth = new Date(year, month - 1, 0);
            const prevMonthDays = prevMonth.getDate();

            for (let i = firstDayOfWeek - 1; i >= 0; i--) {
                const dayElement = createDayElement(prevMonthDays - i, true, year, month - 1);
                calendarGrid.appendChild(dayElement);
            }

            // Jours du mois actuel
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = createDayElement(day, false, year, month);
                calendarGrid.appendChild(dayElement);
            }

            // Jours du mois suivant
            const totalCells = calendarGrid.children.length - 7; // Soustraire les en-têtes
            const remainingCells = 42 - totalCells; // 6 semaines * 7 jours

            for (let day = 1; day <= remainingCells; day++) {
                const dayElement = createDayElement(day, true, year, month + 1);
                calendarGrid.appendChild(dayElement);
            }
        }

        // Créer un élément jour
        function createDayElement(day, isOtherMonth, year, month) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day';

            if (isOtherMonth) {
                dayElement.classList.add('other-month');
            }

            const today = new Date();
            if (!isOtherMonth && day === today.getDate() &&
                month === today.getMonth() && year === today.getFullYear()) {
                dayElement.classList.add('today');
            }

            const dateKey = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            dayElement.innerHTML = `<div class="font-semibold">${day}</div>`;

            // Ajouter les événements pour ce jour
            if (events[dateKey]) {
                const eventList = document.createElement('div');
                eventList.className = 'event-list';

                events[dateKey].slice(0, 2).forEach(event => {
                    const eventElement = document.createElement('div');
                    eventElement.className = 'event-item';
                    eventElement.textContent = event.title;
                    eventElement.onclick = (e) => {
                        e.stopPropagation();
                        editEvent(dateKey, event.id);
                    };
                    eventList.appendChild(eventElement);
                });

                if (events[dateKey].length > 2) {
                    const moreElement = document.createElement('div');
                    moreElement.className = 'event-item';
                    moreElement.textContent = `+${events[dateKey].length - 2} autres`;
                    eventList.appendChild(moreElement);
                }

                dayElement.appendChild(eventList);

                const eventDot = document.createElement('div');
                eventDot.className = 'event-dot';
                dayElement.appendChild(eventDot);
            }

            dayElement.onclick = () => selectDate(dateKey, dayElement);

            return dayElement;
        }

        // Sélectionner une date
        function selectDate(dateKey, element) {
            document.querySelectorAll('.calendar-day').forEach(day => {
                day.classList.remove('selected');
            });

            element.classList.add('selected');
            selectedDate = dateKey;
        }

        // Navigation du calendrier
        function previousMonth() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            generateCalendar();
            updateStats();
        }

        function nextMonth() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            generateCalendar();
            updateStats();
        }

        // Afficher le modal d'événement
        function showEventModal(eventData = null) {
            const modal = document.getElementById('eventModal');
            const form = document.getElementById('eventForm');

            if (eventData) {
                // Mode édition
                document.getElementById('eventModalTitle').textContent = 'Modifier l\'événement';
                document.getElementById('eventTitle').value = eventData.title;
                document.getElementById('eventDate').value = eventData.date;
                document.getElementById('eventTime').value = eventData.time || '';
                document.getElementById('eventCategory').value = eventData.category;
                document.getElementById('eventDescription').value = eventData.description || '';
                currentEditingEvent = eventData;
            } else {
                // Mode création
                document.getElementById('eventModalTitle').textContent = 'Ajouter un événement';
                form.reset();
                if (selectedDate) {
                    document.getElementById('eventDate').value = selectedDate;
                }
                currentEditingEvent = null;
            }

            modal.style.display = 'block';
        }

        // Fermer le modal d'événement
        function closeEventModal() {
            document.getElementById('eventModal').style.display = 'none';
            currentEditingEvent = null;
        }

        // Éditer un événement
        function editEvent(dateKey, eventId) {
            const event = events[dateKey].find(e => e.id === eventId);
            if (event) {
                showEventModal({...event, date: dateKey});
            }
        }

        // Gérer la soumission du formulaire
        document.getElementById('eventForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const title = document.getElementById('eventTitle').value;
            const date = document.getElementById('eventDate').value;
            const time = document.getElementById('eventTime').value;
            const category = document.getElementById('eventCategory').value;
            const description = document.getElementById('eventDescription').value;

            const eventData = {
                id: currentEditingEvent ? currentEditingEvent.id : Date.now(),
                title,
                time,
                category,
                description
            };

            if (!events[date]) {
                events[date] = [];
            }

            if (currentEditingEvent) {
                // Supprimer l'ancien événement
                const oldDate = currentEditingEvent.date;
                events[oldDate] = events[oldDate].filter(e => e.id !== currentEditingEvent.id);
                if (events[oldDate].length === 0) {
                    delete events[oldDate];
                }
            }

            events[date].push(eventData);

            // Sauvegarder dans localStorage
            localStorage.setItem('schoolEvents', JSON.stringify(events));

            closeEventModal();
            generateCalendar();
            updateStats();
        });

        // Mettre à jour les statistiques
        function updateStats() {
            const today = new Date();
            const currentMonthKey = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}`;
            const todayKey = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;

            let totalEvents = 0;
            let todayEvents = 0;
            let upcomingEvents = 0;

            Object.keys(events).forEach(dateKey => {
                if (dateKey.startsWith(currentMonthKey)) {
                    totalEvents += events[dateKey].length;
                }

                if (dateKey === todayKey) {
                    todayEvents = events[dateKey].length;
                }

                if (new Date(dateKey) > today) {
                    upcomingEvents += events[dateKey].length;
                }
            });

            document.getElementById('totalEvents').textContent = totalEvents;
            document.getElementById('todayEvents').textContent = todayEvents;
            document.getElementById('upcomingEvents').textContent = upcomingEvents;
        }

        // Modifier le gestionnaire d'événement existant pour le bouton calendrier
        document.addEventListener('DOMContentLoaded', function() {
            // Ajouter l'événement click au bouton calendrier
            const calendarButton = document.querySelectorAll('.sidebar nav a')[1];
            calendarButton.onclick = function(e) {
                e.preventDefault();
                showCalendar();
            };

            // Modifier le bouton tableau de bord pour revenir au dashboard
            const dashboardButton = document.querySelectorAll('.sidebar nav a')[0];
            dashboardButton.onclick = function(e) {
                e.preventDefault();
                showDashboard();
            };

            // Fermer le modal en cliquant à l'extérieur
            document.getElementById('eventModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeEventModal();
                }
            });
        });
        </script>
</body>
</html>
