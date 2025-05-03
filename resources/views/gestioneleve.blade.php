<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Salles - École Primaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header avec logo -->
        <header class="bg-blue-600 text-white shadow-md">
            <div class="container mx-auto px-4 py-6 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                        <!-- Espace pour le logo de l'école -->
                        <i class="fas fa-school text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">École Primaire Les Petits Génies</h1>
                        <p class="text-blue-100">Gestion des salles de classe</p>
                    </div>
                </div>
                <button id="addSalleBtn" class="bg-white text-blue-600 px-6 py-2 rounded-full font-semibold hover:bg-blue-50 transition">
                    <i class="fas fa-plus mr-2"></i>Ajouter une salle
                </button>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="container mx-auto px-4 py-8">
            <!-- Filtres -->
            <div class="mb-8 bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Filtrer les salles</h2>
                <div class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
                        <select id="niveauFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Tous les niveaux</option>
                            <option value="CP">CP</option>
                            <option value="CE1">CE1</option>
                            <option value="CE2">CE2</option>
                            <option value="CM1">CM1</option>
                            <option value="CM2">CM2</option>
                        </select>
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                        <select id="statutFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Tous les statuts</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Occupée">Occupée</option>
                            <option value="En maintenance">En maintenance</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button id="filterBtn" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                            <i class="fas fa-filter mr-2"></i>Filtrer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Liste des salles par classe -->
            <div id="sallesContainer">
                <!-- Les salles seront ajoutées dynamiquement ici -->
            </div>
        </main>
    </div>

    <!-- Modal pour ajouter/modifier une salle -->
    <div id="salleModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 invisible z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-md mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 id="modalTitle" class="text-xl font-semibold text-gray-800">Ajouter une nouvelle salle</h3>
                <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="salleForm" class="space-y-4">
                <input type="hidden" id="salleId">
                <div>
                    <label for="numero" class="block text-sm font-medium text-gray-700 mb-1">Numéro de salle</label>
                    <input type="text" id="numero" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="niveau" class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
                    <select id="niveau" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
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
                    <label for="capacite" class="block text-sm font-medium text-gray-700 mb-1">Capacité (nombre d'élèves)</label>
                    <input type="number" id="capacite" min="10" max="40" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="statut" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                    <select id="statut" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="Disponible">Disponible</option>
                        <option value="Occupée">Occupée</option>
                        <option value="En maintenance">En maintenance</option>
                    </select>
                </div>
                <div>
                    <label for="equipements" class="block text-sm font-medium text-gray-700 mb-1">Équipements</label>
                    <textarea id="equipements" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div>
                    <label for="professeur" class="block text-sm font-medium text-gray-700 mb-1">Professeur principal</label>
                    <input type="text" id="professeur" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="pt-2">
                    <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                        <i class="fas fa-save mr-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Données des salles (simulées)
        let salles = [
            { id: 1, numero: "A101", niveau: "CP", capacite: 25, statut: "Occupée", equipements: "Tableau blanc, Projecteur, Ordinateur", professeur: "Mme Dupont" },
            { id: 2, numero: "A102", niveau: "CP", capacite: 28, statut: "Disponible", equipements: "Tableau blanc, Ordinateur", professeur: "M. Martin" },
            { id: 3, numero: "B201", niveau: "CE1", capacite: 30, statut: "Occupée", equipements: "Tableau interactif, Ordinateur", professeur: "Mme Leroy" },
            { id: 4, numero: "B202", niveau: "CE2", capacite: 22, statut: "En maintenance", equipements: "Tableau blanc", professeur: "" },
            { id: 5, numero: "C301", niveau: "CM1", capacite: 26, statut: "Disponible", equipements: "Tableau interactif, Projecteur, Ordinateurs", professeur: "M. Bernard" },
            { id: 6, numero: "C302", niveau: "CM2", capacite: 24, statut: "Occupée", equipements: "Tableau blanc, Ordinateur", professeur: "Mme Petit" }
        ];

        // Éléments du DOM
        const sallesContainer = document.getElementById('sallesContainer');
        const addSalleBtn = document.getElementById('addSalleBtn');
        const salleModal = document.getElementById('salleModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalTitle = document.getElementById('modalTitle');
        const salleForm = document.getElementById('salleForm');
        const salleIdInput = document.getElementById('salleId');
        const numeroInput = document.getElementById('numero');
        const niveauInput = document.getElementById('niveau');
        const capaciteInput = document.getElementById('capacite');
        const statutInput = document.getElementById('statut');
        const equipementsInput = document.getElementById('equipements');
        const professeurInput = document.getElementById('professeur');
        const niveauFilter = document.getElementById('niveauFilter');
        const statutFilter = document.getElementById('statutFilter');
        const filterBtn = document.getElementById('filterBtn');

        // Afficher les salles
        function afficherSalles(sallesToDisplay = salles) {
            sallesContainer.innerHTML = '';

            // Grouper les salles par niveau
            const sallesParNiveau = {};
            sallesToDisplay.forEach(salle => {
                if (!sallesParNiveau[salle.niveau]) {
                    sallesParNiveau[salle.niveau] = [];
                }
                sallesParNiveau[salle.niveau].push(salle);
            });

            // Afficher les salles par niveau
            for (const niveau in sallesParNiveau) {
                const sallesNiveau = sallesParNiveau[niveau];

                const niveauSection = document.createElement('div');
                niveauSection.className = 'mb-10';

                const niveauTitle = document.createElement('h2');
                niveauTitle.className = 'text-2xl font-bold mb-4 text-gray-800 flex items-center';
                niveauTitle.innerHTML = `
                    <span class="bg-blue-100 text-blue-800 px-4 py-1 rounded-full mr-3">${niveau}</span>
                    <span>Salles de classe</span>
                `;

                const sallesGrid = document.createElement('div');
                sallesGrid.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';

                sallesNiveau.forEach(salle => {
                    const salleCard = document.createElement('div');
                    salleCard.className = 'salle-card bg-white rounded-xl shadow-sm p-6 border-l-4';

                    // Couleur de la bordure selon le statut
                    let borderColor = 'border-gray-300';
                    if (salle.statut === 'Occupée') borderColor = 'border-red-500';
                    else if (salle.statut === 'Disponible') borderColor = 'border-green-500';
                    else if (salle.statut === 'En maintenance') borderColor = 'border-yellow-500';

                    salleCard.classList.add(borderColor);

                    salleCard.innerHTML = `
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">Salle ${salle.numero}</h3>
                            <span class="px-2 py-1 text-xs rounded-full ${getStatutClass(salle.statut)}">${salle.statut}</span>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p><i class="fas fa-users mr-2 text-blue-500"></i> Capacité: ${salle.capacite} élèves</p>
                            <p><i class="fas fa-chalkboard-teacher mr-2 text-blue-500"></i> Professeur: ${salle.professeur || 'Non attribué'}</p>
                            <p><i class="fas fa-tools mr-2 text-blue-500"></i> Équipements: ${salle.equipements || 'Aucun'}</p>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <button onclick="editerSalle(${salle.id})" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                <i class="fas fa-edit mr-1"></i>Modifier
                            </button>
                            <button onclick="supprimerSalle(${salle.id})" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                <i class="fas fa-trash-alt mr-1"></i>Supprimer
                            </button>
                        </div>
                    `;

                    sallesGrid.appendChild(salleCard);
                });

                niveauSection.appendChild(niveauTitle);
                niveauSection.appendChild(sallesGrid);
                sallesContainer.appendChild(niveauSection);
            }
        }

        // Classe CSS pour le statut
        function getStatutClass(statut) {
            switch(statut) {
                case 'Disponible': return 'bg-green-100 text-green-800';
                case 'Occupée': return 'bg-red-100 text-red-800';
                case 'En maintenance': return 'bg-yellow-100 text-yellow-800';
                default: return 'bg-gray-100 text-gray-800';
            }
        }

        // Ouvrir le modal pour ajouter une salle
        addSalleBtn.addEventListener('click', () => {
            salleIdInput.value = '';
            salleForm.reset();
            modalTitle.textContent = 'Ajouter une nouvelle salle';
            ouvrirModal();
        });

        // Fermer le modal
        closeModalBtn.addEventListener('click', fermerModal);

        // Ouvrir le modal
        function ouvrirModal() {
            salleModal.classList.remove('invisible', 'opacity-0');
            salleModal.classList.add('visible', 'opacity-100');
        }

        // Fermer le modal
        function fermerModal() {
            salleModal.classList.remove('visible', 'opacity-100');
            salleModal.classList.add('invisible', 'opacity-0');
        }

        // Gérer la soumission du formulaire
        salleForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const salleData = {
                numero: numeroInput.value,
                niveau: niveauInput.value,
                capacite: parseInt(capaciteInput.value),
                statut: statutInput.value,
                equipements: equipementsInput.value,
                professeur: professeurInput.value
            };

            if (salleIdInput.value) {
                // Mettre à jour une salle existante
                const id = parseInt(salleIdInput.value);
                const index = salles.findIndex(s => s.id === id);
                if (index !== -1) {
                    salles[index] = { ...salles[index], ...salleData };
                }
            } else {
                // Ajouter une nouvelle salle
                const newId = salles.length > 0 ? Math.max(...salles.map(s => s.id)) + 1 : 1;
                salles.push({ id: newId, ...salleData });
            }

            afficherSalles();
            fermerModal();
        });

        // Éditer une salle
        window.editerSalle = function(id) {
            const salle = salles.find(s => s.id === id);
            if (salle) {
                salleIdInput.value = salle.id;
                numeroInput.value = salle.numero;
                niveauInput.value = salle.niveau;
                capaciteInput.value = salle.capacite;
                statutInput.value = salle.statut;
                equipementsInput.value = salle.equipements;
                professeurInput.value = salle.professeur;

                modalTitle.textContent = `Modifier la salle ${salle.numero}`;
                ouvrirModal();
            }
        };

        // Supprimer une salle
        window.supprimerSalle = function(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette salle ?')) {
                salles = salles.filter(s => s.id !== id);
                afficherSalles();
            }
        };

        // Filtrer les salles
        filterBtn.addEventListener('click', function() {
            const niveau = niveauFilter.value;
            const statut = statutFilter.value;

            let sallesFiltrees = salles;

            if (niveau) {
                sallesFiltrees = sallesFiltrees.filter(s => s.niveau === niveau);
            }

            if (statut) {
                sallesFiltrees = sallesFiltrees.filter(s => s.statut === statut);
            }

            afficherSalles(sallesFiltrees);
        });

        // Initialiser l'affichage
        document.addEventListener('DOMContentLoaded', () => {
            afficherSalles();
        });
    </script>
</body>
</html>
