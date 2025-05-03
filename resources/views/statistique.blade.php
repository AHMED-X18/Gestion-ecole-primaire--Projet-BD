<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Scolaires - École Primaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-blue-800 text-white w-64 flex flex-col">
            <!-- Logo -->
            <div class="p-4 flex items-center border-b border-blue-700">
                <i class="fas fa-school text-2xl mr-3"></i>
                <span class="logo-text text-xl font-bold">École Primaire</span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-4">
                <div class="space-y-2 px-4">
                    <a href="#" class="nav-item flex items-center p-3 rounded-lg bg-blue-700">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span class="nav-text">Tableau de bord</span>
                    </a>
                    <a href="#" class="nav-item flex items-center p-3 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-users mr-3"></i>
                        <span class="nav-text">Classes</span>
                    </a>
                    <a href="#" class="nav-item flex items-center p-3 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-user-graduate mr-3"></i>
                        <span class="nav-text">Élèves</span>
                    </a>
                    <a href="#" class="nav-item flex items-center p-3 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-chart-pie mr-3"></i>
                        <span class="nav-text">Statistiques</span>
                    </a>
                    <a href="#" class="nav-item flex items-center p-3 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-cog mr-3"></i>
                        <span class="nav-text">Paramètres</span>
                    </a>
                </div>
            </nav>

            <!-- User profile -->
            <div class="p-4 border-t border-blue-700">
                <div class="flex items-center">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <div class="font-medium">Mme. Dupont</div>
                        <div class="text-sm text-blue-200">Directrice</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">
                    <i class="fas fa-chart-line text-blue-600 mr-2"></i>
                    Statistiques Scolaires
                </h1>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <button class="p-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200">
                        <i class="fas fa-bell"></i>
                    </button>
                </div>
            </header>

            <!-- Main dashboard -->
            <main class="p-6">
                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Année scolaire</label>
                            <select class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>2023-2024</option>
                                <option>2022-2023</option>
                                <option>2021-2022</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
                            <select class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Tous les niveaux</option>
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
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Classe</label>
                            <select class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Toutes les classes</option>
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
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Trimestre</label>
                            <select class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Tous les trimestres</option>
                                <option>1er Trimestre</option>
                                <option>2ème Trimestre</option>
                                <option>3ème Trimestre</option>
                            </select>
                        </div>
                        <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center">
                            <i class="fas fa-filter mr-2"></i> Filtrer
                        </button>
                    </div>
                </div>

                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Nombre d'élèves</p>
                                <h3 class="text-3xl font-bold text-gray-800">248</h3>
                            </div>
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-user-graduate text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 12% vs. l'an dernier
                            </span>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Moyenne générale</p>
                                <h3 class="text-3xl font-bold text-gray-800">14.2</h3>
                            </div>
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-chart-line text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 0.8 points
                            </span>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Taux de réussite</p>
                                <h3 class="text-3xl font-bold text-gray-800">92%</h3>
                            </div>
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-trophy text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-500 flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 5% vs. l'an dernier
                            </span>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Taux d'absentéisme</p>
                                <h3 class="text-3xl font-bold text-gray-800">3.5%</h3>
                            </div>
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <i class="fas fa-user-times text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-red-500 flex items-center">
                                <i class="fas fa-arrow-down mr-1"></i> 1.2% vs. l'an dernier
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Moyennes par classe -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Moyennes par classe</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded-lg">Annuel</button>
                                <button class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-lg">Trimestre</button>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="classAveragesChart"></canvas>
                        </div>
                    </div>

                    <!-- Répartition des notes -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Répartition des notes</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded-lg">Toutes</button>
                                <button class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-lg">Maths</button>
                                <button class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-lg">Français</button>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="gradesDistributionChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Classes performance -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Performance des classes</h3>
                        <button class="text-blue-600 hover:text-blue-800 flex items-center">
                            <i class="fas fa-download mr-1"></i> Exporter
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classe</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Effectif</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moyenne</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">% Réussite</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Évolution</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">CP-A</div>
                                                <div class="text-sm text-gray-500">Mme. Martin</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">24</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15.2</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">96%</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            +1.4 pts
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="text-green-600 hover:text-green-900"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">CE1-A</div>
                                                <div class="text-sm text-gray-500">M. Dubois</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">26</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14.8</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">94%</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            +0.9 pts
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="text-green-600 hover:text-green-900"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">CE2-A</div>
                                                <div class="text-sm text-gray-500">Mme. Leroy</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13.5</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">88%</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            -0.3 pts
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="text-green-600 hover:text-green-900"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">CM1-A</div>
                                                <div class="text-sm text-gray-500">M. Bernard</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">28</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14.1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">90%</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            +1.1 pts
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="text-green-600 hover:text-green-900"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">CM2-A</div>
                                                <div class="text-sm text-gray-500">Mme. Petit</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">27</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15.0</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">96%</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            +2.0 pts
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="text-green-600 hover:text-green-900"><i class="fas fa-download"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Matières -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Meilleures matières -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Meilleures matières</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Mathématiques</span>
                                    <span class="text-sm font-medium text-gray-700">15.4</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-500 h-2.5 rounded-full" style="width: 88%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Sciences</span>
                                    <span class="text-sm font-medium text-gray-700">14.9</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-400 h-2.5 rounded-full" style="width: 82%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Éducation Physique</span>
                                    <span class="text-sm font-medium text-gray-700">14.7</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-500 h-2.5 rounded-full" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Matières à améliorer -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Matières à améliorer</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Orthographe</span>
                                    <span class="text-sm font-medium text-gray-700">12.1</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 65%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Grammaire</span>
                                    <span class="text-sm font-medium text-gray-700">12.8</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 70%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Histoire-Géo</span>
                                    <span class="text-sm font-medium text-gray-700">13.2</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-orange-500 h-2.5 rounded-full" style="width: 72%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Chart 1: Moyennes par classe
        const classAveragesCtx = document.getElementById('classAveragesChart').getContext('2d');
        const classAveragesChart = new Chart(classAveragesCtx, {
            type: 'bar',
            data: {
                labels: ['CP-A', 'CE1-A', 'CE2-A', 'CM1-A', 'CM2-A'],
                datasets: [
                    {
                        label: '2023-2024',
                        data: [15.2, 14.8, 13.5, 14.1, 15.0],
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2022-2023',
                        data: [13.8, 13.9, 13.8, 13.0, 13.0],
                        backgroundColor: 'rgba(209, 213, 219, 0.7)',
                        borderColor: 'rgba(209, 213, 219, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 10,
                        max: 20
                    }
                }
            }
        });

        // Chart 2: Répartition des notes
        const gradesDistributionCtx = document.getElementById('gradesDistributionChart').getContext('2d');
        const gradesDistributionChart = new Chart(gradesDistributionCtx, {
            type: 'pie',
            data: {
                labels: ['0-5', '5-10', '10-12', '12-15', '15-20'],
                datasets: [{
                    data: [2, 8, 25, 40, 25],
                    backgroundColor: [
                        'rgba(239, 68, 68, 0.7)',
                        'rgba(249, 168, 37, 0.7)',
                        'rgba(234, 179, 8, 0.7)',
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(16, 185, 129, 0.7)'
                    ],
                    borderColor: [
                        'rgba(239, 68, 68, 1)',
                        'rgba(249, 168, 37, 1)',
                        'rgba(234, 179, 8, 1)',
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });

        // Toggle sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');

            // Simulate toggle button (you can add a real button in your UI)
            setTimeout(() => {
                sidebar.classList.add('collapsed');
            }, 3000);

            // For demonstration, toggle every 5 seconds
            setInterval(() => {
                sidebar.classList.toggle('collapsed');
            }, 5000);
        });
    </script>
</body>
</html>
