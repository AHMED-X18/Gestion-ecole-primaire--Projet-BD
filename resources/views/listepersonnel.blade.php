<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste du Personnel par Poste</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .personnel-card {
            transition: all 0.3s ease;
        }
        .personnel-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        <i class="fas fa-users mr-2 text-blue-500"></i>Liste du Personnel par Poste
                    </h1>
                    <p class="text-gray-600 mt-1">Visualisation et gestion du personnel organisé par poste</p>
                </div>

                <div class="w-full md:w-auto">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" id="searchInput" placeholder="Rechercher un personnel..."
                               class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-800 font-medium">Total Personnel</p>
                            <p class="text-2xl font-bold text-blue-900">{{ $stats['total'] }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-users text-blue-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-green-800 font-medium">Directeurs</p>
                            <p class="text-2xl font-bold text-green-900">{{ $stats['directeurs'] }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-user-tie text-green-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-red-50 p-4 rounded-lg border border-red-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-red-800 font-medium">Trésoriers</p>
                            <p class="text-2xl font-bold text-red-900">{{ $stats['tresoriers'] }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-user-tie text-red-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-purple-800 font-medium">Secrétaires</p>
                            <p class="text-2xl font-bold text-purple-900">{{ $stats['secretaires'] }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-user-secret text-purple-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-orange-50 p-4 rounded-lg border border-orange-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-orange-800 font-medium">Autres postes</p>
                            <p class="text-2xl font-bold text-orange-900">{{ $stats['autres'] }}</p>
                        </div>
                        <div class="bg-orange-100 p-3 rounded-full">
                            <i class="fas fa-user-cog text-orange-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste par poste -->
            <div class="space-y-6" id="personnelContainer">
                @foreach($personnelParPoste as $poste => $personnels)
                    @php
                        // Configuration des styles pour chaque type de poste
                        $config = [
                            'directeur' => [
                                'header_bg' => 'bg-blue-600',
                                'badge_bg' => 'bg-blue-800',
                                'icon' => 'fa-user-tie',
                                'card_bg' => 'bg-blue-100',
                                'card_text' => 'text-blue-800',
                                'icon_color' => 'text-blue-500'
                            ],
                            'secretaire' => [
                                'header_bg' => 'bg-purple-600',
                                'badge_bg' => 'bg-purple-800',
                                'icon' => 'fa-user-secret',
                                'card_bg' => 'bg-purple-100',
                                'card_text' => 'text-purple-800',
                                'icon_color' => 'text-purple-500'
                            ],
                            'enseignant' => [
                                'header_bg' => 'bg-purple-600',
                                'badge_bg' => 'bg-purple-800',
                                'icon' => 'fa-chalkboard-teacher',
                                'card_bg' => 'bg-purple-100',
                                'card_text' => 'text-purple-800',
                                'icon_color' => 'text-purple-500'
                            ],
                            'tresorier' => [
                                'header_bg' => 'bg-red-600',
                                'badge_bg' => 'bg-red-800',
                                'icon' => 'fa-user-tie',
                                'card_bg' => 'bg-red-100',
                                'card_text' => 'text-red-800',
                                'icon_color' => 'text-red-500'
                            ],
                            'autre' => [
                                'header_bg' => 'bg-orange-600',
                                'badge_bg' => 'bg-orange-800',
                                'icon' => 'fa-user-cog',
                                'card_bg' => 'bg-orange-100',
                                'card_text' => 'text-orange-800',
                                'icon_color' => 'text-orange-500'
                            ]
                        ];

                        // Récupération de la configuration pour ce poste
                        $style = $config[$poste] ?? $config['secretaire'];
                    @endphp

                    <!-- Section -->
                    <div class="poste-section bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="{{ $style['header_bg'] }} px-4 py-3 flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-white flex items-center">
                                <i class="fas {{ $style['icon'] }} mr-2"></i>{{ ucfirst($poste) }}
                            </h2>
                            <span class="{{ $style['badge_bg'] }} text-white text-sm font-medium px-2.5 py-0.5 rounded-full">
                                {{ count($personnels) }}
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                            @foreach($personnels as $personnel)
                                <!-- Carte Personnel -->
                                <div class="personnel-card {{ $style['card_bg'] }} border border-gray-200 rounded-lg p-4 transition-all duration-300 hover:shadow-md">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="{{ $style['card_bg'] }} {{ $style['card_text'] }} rounded-full w-12 h-12 flex items-center justify-center">
                                                <i class="fas fa-user text-xl"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $personnel->nom }}</h3>
                                            <p class="text-sm text-gray-500">
                                                {{ ucfirst($personnel->sexe) }} - {{ \Carbon\Carbon::parse($personnel->date_naissance)->age }} ans
                                            </p>

                                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                                <i class="fas fa-phone-alt mr-2 {{ $style['icon_color'] }}"></i>
                                                <span>{{ $personnel->tel1 ?? 'Non fourni' }}</span>
                                            </div>
                                            <div class="mt-1 flex items-center text-sm text-gray-500">
                                                <i class="fas fa-envelope mr-2 {{ $style['icon_color'] }}"></i>
                                                <span class="truncate">{{ $personnel->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const personnelCards = document.querySelectorAll('.personnel-card');

                personnelCards.forEach(card => {
                    const name = card.querySelector('h3').textContent.toLowerCase();
                    const details = card.querySelectorAll('p, span');
                    let detailsText = '';

                    details.forEach(detail => {
                        detailsText += detail.textContent.toLowerCase() + ' ';
                    });

                    if (name.includes(searchTerm) || detailsText.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Masquer les sections vides
                document.querySelectorAll('.poste-section').forEach(section => {
                    const visibleCards = section.querySelectorAll('.personnel-card[style="display: block"], .personnel-card:not([style])');
                    if (visibleCards.length === 0) {
                        section.style.display = 'none';
                    } else {
                        section.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>
