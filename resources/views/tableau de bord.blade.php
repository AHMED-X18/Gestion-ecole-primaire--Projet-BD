<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Gestion scolaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/tableau de bord.css') }}">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-indigo-900 text-white w-64 flex-shrink-0 flex flex-col">
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
                    <div class="flex items-center mb-4 p-2 bg-indigo-800 rounded-lg">
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
                    <a href="#" class="flex items-center p-3 rounded-lg bg-indigo-800 text-white mb-2">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span class="sidebar-text">Tableau de bord</span>
                    </a>
                    <a href="#" class="flex items-center p-3 rounded-lg text-indigo-300 hover:bg-indigo-800 hover:text-white mb-2">
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
                                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-blue-500"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl p-6 mb-8 text-white shadow-lg">
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
        </div>
    </div>

    <script src="{{ asset('js/list.js') }}"></script>
    <script src="{{ asset('js/tableau de bord.js') }}"></script>
</body>
</html>
