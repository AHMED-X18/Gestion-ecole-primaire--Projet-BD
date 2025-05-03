<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Bulletins - École Primaire</title>
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
                        <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">École Primaire Les Petits Génies</h1>
                        <p class="text-blue-100">Gestion des bulletins scolaires</p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <button id="addBulletinBtn" class="bg-white text-blue-600 px-6 py-2 rounded-full font-semibold hover:bg-blue-50 transition">
                        <i class="fas fa-plus mr-2"></i>Nouveau bulletin
                    </button>
                    <button id="printAllBtn" class="bg-blue-500 text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-400 transition">
                        <i class="fas fa-print mr-2"></i>Imprimer tous
                    </button>
                </div>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="container mx-auto px-4 py-8">
            <!-- Filtres et recherche -->
            <div class="mb-8 bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Rechercher des bulletins</h2>
                <div class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
                        <select id="niveauFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Tous les niveaux</option>
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
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trimestre</label>
                        <select id="trimestreFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Tous les trimestres</option>
                            <option value="1">1er trimestre</option>
                            <option value="2">2ème trimestre</option>
                            <option value="3">3ème trimestre</option>
                        </select>
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Élève</label>
                        <input type="text" id="eleveSearch" placeholder="Nom de l'élève" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex items-end">
                        <button id="searchBtn" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                            <i class="fas fa-search mr-2"></i>Rechercher
                        </button>
                    </div>
                </div>
            </div>

            <!-- Onglets -->
            <div class="mb-6">
                <div class="flex border-b border-gray-200">
                    <button class="tab-btn py-2 px-4 font-medium text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500" data-tab="bulletins">
                        <i class="fas fa-file-alt mr-2"></i>Liste des bulletins
                    </button>
                    <button class="tab-btn py-2 px-4 font-medium text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500" data-tab="statistiques">
                        <i class="fas fa-chart-bar mr-2"></i>Statistiques
                    </button>
                    <button class="tab-btn py-2 px-4 font-medium text-gray-600 hover:text-blue-600 border-b-2 border-transparent hover:border-blue-500" data-tab="parametres">
                        <i class="fas fa-cog mr-2"></i>Paramètres
                    </button>
                </div>
            </div>

            <!-- Contenu des onglets -->
            <div id="bulletins" class="tab-content active">
                <!-- Liste des bulletins -->
                <div id="bulletinsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Les bulletins seront ajoutés dynamiquement ici -->
                </div>
            </div>

            <div id="statistiques" class="tab-content">
                <!-- Statistiques -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-xl font-semibold mb-6 text-gray-700">Statistiques des résultats</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-lg font-medium mb-4 text-gray-700">Moyennes par niveau</h3>
                            <div id="niveauStats" class="space-y-4">
                                <!-- Statistiques par niveau seront ajoutées ici -->
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium mb-4 text-gray-700">Répartition des mentions</h3>
                            <div id="mentionChart" class="h-64">
                                <!-- Graphique sera ajouté ici -->
                                <div class="flex items-center justify-center h-full bg-gray-100 rounded-lg">
                                    <p class="text-gray-500">Graphique des mentions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="parametres" class="tab-content">
                <!-- Paramètres -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-xl font-semibold mb-6 text-gray-700">Paramètres des bulletins</h2>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium mb-3 text-gray-700">Matières par niveau</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Niveau</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matières</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="matieresTable" class="divide-y divide-gray-200">
                                        <!-- Matières par niveau seront ajoutées ici -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium mb-3 text-gray-700">Seuils des mentions</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="bg-blue-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-blue-800 mb-1">Très bien</label>
                                    <input type="number" id="tbSeuil" min="16" max="20" value="16" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-green-800 mb-1">Bien</label>
                                    <input type="number" id="bSeuil" min="14" max="16" value="14" class="w-full px-3 py-2 border border-green-200 rounded-lg focus:ring-green-500 focus:border-green-500">
                                </div>
                                <div class="bg-yellow-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-yellow-800 mb-1">Assez bien</label>
                                    <input type="number" id="abSeuil" min="12" max="14" value="12" class="w-full px-3 py-2 border border-yellow-200 rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-gray-800 mb-1">Passable</label>
                                    <input type="number" id="pSeuil" min="10" max="12" value="10" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-gray-500 focus:border-gray-500">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button id="saveSeuilsBtn" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                                    <i class="fas fa-save mr-2"></i>Enregistrer les seuils
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal pour ajouter/modifier un bulletin -->
    <div id="bulletinModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 invisible z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 id="modalTitle" class="text-xl font-semibold text-gray-800">Nouveau bulletin scolaire</h3>
                <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="bulletinForm" class="space-y-6">
                <input type="hidden" id="bulletinId">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="eleve" class="block text-sm font-medium text-gray-700 mb-1">Élève</label>
                        <select id="eleve" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Sélectionner un élève</option>
                            <!-- Options seront ajoutées dynamiquement -->
                        </select>
                    </div>
                    <div>
                        <label for="trimestre" class="block text-sm font-medium text-gray-700 mb-1">Trimestre</label>
                        <select id="trimestre" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Sélectionner un trimestre</option>
                            <option value="1">1er trimestre</option>
                            <option value="2">2ème trimestre</option>
                            <option value="3">3ème trimestre</option>
                        </select>
                    </div>
                    <div>
                        <label for="niveau" class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
                        <select id="niveau" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Sélectionner un niveau</option>
                            <option value="CP">CP</option>
                            <option value="CE1">CE1</option>
                            <option value="CE2">CE2</option>
                            <option value="CM1">CM1</option>
                            <option value="CM2">CM2</option>
                        </select>
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" id="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-medium mb-3 text-gray-700">Notes par matière</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Matière</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Note (/20)</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Appréciation</th>
                                </tr>
                            </thead>
                            <tbody id="matieresNotes" class="divide-y divide-gray-200">
                                <!-- Lignes des matières seront ajoutées dynamiquement -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div>
                    <label for="appreciation" class="block text-sm font-medium text-gray-700 mb-1">Appréciation générale</label>
                    <textarea id="appreciation" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div class="pt-4 flex justify-between">
                    <button type="button" id="previewBtn" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium hover:bg-gray-300 transition">
                        <i class="fas fa-eye mr-2"></i>Aperçu
                    </button>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                        <i class="fas fa-save mr-2"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal d'aperçu -->
    <div id="previewModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 invisible z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-3xl mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Aperçu du bulletin</h3>
                <button id="closePreviewBtn" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="bulletinPreview" class="p-6 border border-gray-200 rounded-lg">
                <!-- Contenu de l'aperçu sera ajouté dynamiquement -->
                <div class="text-center py-20 text-gray-400">
                    <i class="fas fa-file-alt text-4xl mb-2"></i>
                    <p>Aperçu du bulletin</p>
                </div>
            </div>
            <div class="mt-4 text-right">
                <button id="printBtn" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                    <i class="fas fa-print mr-2"></i>Imprimer
                </button>
            </div>
        </div>
    </div>

    <script>
        // Données de test
        const eleves = [
            { id: 1, nom: "Dupont", prenom: "Jean", niveau: "CP" },
            { id: 2, nom: "Martin", prenom: "Sophie", niveau: "CP" },
            { id: 3, nom: "Bernard", prenom: "Lucas", niveau: "CE1" },
            { id: 4, nom: "Petit", prenom: "Emma", niveau: "CE2" },
            { id: 5, nom: "Leroy", prenom: "Hugo", niveau: "CM1" },
            { id: 6, nom: "Moreau", prenom: "Léa", niveau: "CM2" }
        ];

        const matieresParNiveau = {
            "CP": ["Lecture", "Écriture", "Mathématiques", "Découverte du monde"],
            "CE1": ["Français", "Mathématiques", "Questionner le monde", "EPS"],
            "CE2": ["Français", "Mathématiques", "Sciences", "Histoire-Géographie", "Anglais"],
            "CM1": ["Français", "Mathématiques", "Sciences", "Histoire-Géographie", "Anglais", "Arts"],
            "CM2": ["Français", "Mathématiques", "Sciences", "Histoire-Géographie", "Anglais", "Arts"]
        };

        let bulletins = [
            {
                id: 1,
                eleveId: 1,
                trimestre: "1",
                niveau: "CP",
                date: "2023-12-15",
                notes: [
                    { matiere: "Lecture", note: 15, appreciation: "Très bon niveau de lecture" },
                    { matiere: "Écriture", note: 14, appreciation: "Bonne écriture, quelques fautes" },
                    { matiere: "Mathématiques", note: 16, appreciation: "Excellents résultats" },
                    { matiere: "Découverte du monde", note: 13, appreciation: "Très curieux et intéressé" }
                ],
                appreciation: "Jean est un élève sérieux et appliqué. Il participe activement en classe et fait preuve d'une grande curiosité intellectuelle."
            },
            {
                id: 2,
                eleveId: 3,
                trimestre: "1",
                niveau: "CE1",
                date: "2023-12-18",
                notes: [
                    { matiere: "Français", note: 12, appreciation: "Bonne compréhension des textes" },
                    { matiere: "Mathématiques", note: 11, appreciation: "Des efforts sont encore nécessaires" },
                    { matiere: "Questionner le monde", note: 14, appreciation: "Très intéressé" },
                    { matiere: "EPS", note: 16, appreciation: "Excellent en sport" }
                ],
                appreciation: "Lucas est un élève dynamique qui s'investit bien dans les activités sportives. Il doit continuer ses efforts en mathématiques."
            }
        ];

        // Éléments du DOM
        const bulletinsContainer = document.getElementById('bulletinsContainer');
        const addBulletinBtn = document.getElementById('addBulletinBtn');
        const printAllBtn = document.getElementById('printAllBtn');
        const bulletinModal = document.getElementById('bulletinModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalTitle = document.getElementById('modalTitle');
        const bulletinForm = document.getElementById('bulletinForm');
        const bulletinIdInput = document.getElementById('bulletinId');
        const eleveSelect = document.getElementById('eleve');
        const trimestreSelect = document.getElementById('trimestre');
        const niveauSelect = document.getElementById('niveau');
        const dateInput = document.getElementById('date');
        const matieresNotes = document.getElementById('matieresNotes');
        const appreciationInput = document.getElementById('appreciation');
        const niveauFilter = document.getElementById('niveauFilter');
        const trimestreFilter = document.getElementById('trimestreFilter');
        const eleveSearch = document.getElementById('eleveSearch');
        const searchBtn = document.getElementById('searchBtn');
        const previewBtn = document.getElementById('previewBtn');
        const previewModal = document.getElementById('previewModal');
        const closePreviewBtn = document.getElementById('closePreviewBtn');
        const bulletinPreview = document.getElementById('bulletinPreview');
        const printBtn = document.getElementById('printBtn');
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        const niveauStats = document.getElementById('niveauStats');
        const matieresTable = document.getElementById('matieresTable');
        const tbSeuil = document.getElementById('tbSeuil');
        const bSeuil = document.getElementById('bSeuil');
        const abSeuil = document.getElementById('abSeuil');
        const pSeuil = document.getElementById('pSeuil');
        const saveSeuilsBtn = document.getElementById('saveSeuilsBtn');

        // Initialiser l'application
        function init() {
            afficherBulletins();
            afficherElevesSelect();
            afficherMatieresTable();
            afficherStatistiques();

            // Définir la date du jour par défaut
            const today = new Date().toISOString().split('T')[0];
            dateInput.value = today;
        }

        // Afficher les bulletins
        function afficherBulletins(bulletinsToDisplay = bulletins) {
            bulletinsContainer.innerHTML = '';

            if (bulletinsToDisplay.length === 0) {
                bulletinsContainer.innerHTML = `
                    <div class="col-span-full text-center py-12 text-gray-500">
                        <i class="fas fa-file-alt text-4xl mb-4"></i>
                        <p class="text-lg">Aucun bulletin trouvé</p>
                    </div>
                `;
                return;
            }

            bulletinsToDisplay.forEach(bulletin => {
                const eleve = eleves.find(e => e.id === bulletin.eleveId);
                const moyenne = calculerMoyenne(bulletin.notes);
                const mention = getMention(moyenne);

                const bulletinCard = document.createElement('div');
                bulletinCard.className = 'bulletin-card bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-300';

                bulletinCard.innerHTML = `
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">${eleve.prenom} ${eleve.nom}</h3>
                            <p class="text-sm text-gray-600">${bulletin.niveau} - ${bulletin.trimestre}ème trimestre</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold ${getMentionColorClass(mention)}">${moyenne.toFixed(2)}</p>
                            <p class="text-xs font-medium ${getMentionColorClass(mention)}">${mention}</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 line-clamp-2">${bulletin.appreciation}</p>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">${formatDate(bulletin.date)}</span>
                        <div class="flex space-x-2">
                            <button onclick="editerBulletin(${bulletin.id})" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="supprimerBulletin(${bulletin.id})" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button onclick="afficherPreview(${bulletin.id})" class="text-green-600 hover:text-green-800">
                                <i class="fas fa-print"></i>
                            </button>
                        </div>
                    </div>
                `;

                bulletinsContainer.appendChild(bulletinCard);
            });
        }

        // Calculer la moyenne
        function calculerMoyenne(notes) {
            if (notes.length === 0) return 0;
            const sum = notes.reduce((acc, note) => acc + note.note, 0);
            return sum / notes.length;
        }

        // Obtenir la mention
        function getMention(moyenne) {
            if (moyenne >= tbSeuil.value) return "Très bien";
            if (moyenne >= bSeuil.value) return "Bien";
            if (moyenne >= abSeuil.value) return "Assez bien";
            if (moyenne >= pSeuil.value) return "Passable";
            return "Insuffisant";
        }

        // Classe CSS pour la mention
        function getMentionColorClass(mention) {
            switch(mention) {
                case "Très bien": return "text-blue-600";
                case "Bien": return "text-green-600";
                case "Assez bien": return "text-yellow-600";
                case "Passable": return "text-gray-600";
                default: return "text-red-600";
            }
        }

        // Formater la date
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('fr-FR', options);
        }

        // Afficher les élèves dans le select
        function afficherElevesSelect() {
            eleveSelect.innerHTML = '<option value="">Sélectionner un élève</option>';
            eleves.forEach(eleve => {
                const option = document.createElement('option');
                option.value = eleve.id;
                option.textContent = `${eleve.prenom} ${eleve.nom} (${eleve.niveau})`;
                eleveSelect.appendChild(option);
            });
        }

        // Afficher les matières par niveau dans le tableau
        function afficherMatieresTable() {
            matieresTable.innerHTML = '';

            for (const niveau in matieresParNiveau) {
                const tr = document.createElement('tr');

                const tdNiveau = document.createElement('td');
                tdNiveau.className = 'px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900';
                tdNiveau.textContent = niveau;

                const tdMatieres = document.createElement('td');
                tdMatieres.className = 'px-4 py-3 text-sm text-gray-500';
                tdMatieres.textContent = matieresParNiveau[niveau].join(', ');

                const tdActions = document.createElement('td');
                tdActions.className = 'px-4 py-3 whitespace-nowrap text-sm text-gray-500';
                tdActions.innerHTML = `
                    <button onclick="editerMatieres('${niveau}')" class="text-blue-600 hover:text-blue-900 mr-2">
                        <i class="fas fa-edit"></i>
                    </button>
                `;

                tr.appendChild(tdNiveau);
                tr.appendChild(tdMatieres);
                tr.appendChild(tdActions);
                matieresTable.appendChild(tr);
            }
        }

        // Afficher les statistiques
        function afficherStatistiques() {
            // Calculer les moyennes par niveau
            const statsParNiveau = {};

            bulletins.forEach(bulletin => {
                if (!statsParNiveau[bulletin.niveau]) {
                    statsParNiveau[bulletin.niveau] = {
                        count: 0,
                        sum: 0,
                        mentions: {
                            "Très bien": 0,
                            "Bien": 0,
                            "Assez bien": 0,
                            "Passable": 0,
                            "Insuffisant": 0
                        }
                    };
                }

                const moyenne = calculerMoyenne(bulletin.notes);
                const mention = getMention(moyenne);

                statsParNiveau[bulletin.niveau].count++;
                statsParNiveau[bulletin.niveau].sum += moyenne;
                statsParNiveau[bulletin.niveau].mentions[mention]++;
            });

            // Afficher les stats
            niveauStats.innerHTML = '';

            for (const niveau in statsParNiveau) {
                const stats = statsParNiveau[niveau];
                const moyenneNiveau = stats.count > 0 ? (stats.sum / stats.count).toFixed(2) : 0;

                const niveauStat = document.createElement('div');
                niveauStat.className = 'bg-gray-50 p-4 rounded-lg';

                niveauStat.innerHTML = `
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="font-medium text-gray-700">${niveau}</h4>
                        <span class="text-lg font-bold text-blue-600">${moyenneNiveau}</span>
                    </div>
                    <div class="grid grid-cols-5 gap-1 text-xs text-center">
                        <div class="bg-blue-100 text-blue-800 p-1 rounded">TB: ${stats.mentions["Très bien"]}</div>
                        <div class="bg-green-100 text-green-800 p-1 rounded">B: ${stats.mentions["Bien"]}</div>
                        <div class="bg-yellow-100 text-yellow-800 p-1 rounded">AB: ${stats.mentions["Assez bien"]}</div>
                        <div class="bg-gray-100 text-gray-800 p-1 rounded">P: ${stats.mentions["Passable"]}</div>
                        <div class="bg-red-100 text-red-800 p-1 rounded">I: ${stats.mentions["Insuffisant"]}</div>
                    </div>
                `;

                niveauStats.appendChild(niveauStat);
            }
        }

        // Gérer les onglets
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const tabId = btn.getAttribute('data-tab');

                // Désactiver tous les onglets
                tabBtns.forEach(b => b.classList.remove('border-blue-500', 'text-blue-600'));
                tabContents.forEach(c => c.classList.remove('active'));

                // Activer l'onglet sélectionné
                btn.classList.add('border-blue-500', 'text-blue-600');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Ouvrir le modal pour ajouter un bulletin
        addBulletinBtn.addEventListener('click', () => {
            bulletinIdInput.value = '';
            bulletinForm.reset();
            niveauSelect.value = '';
            matieresNotes.innerHTML = '';
            modalTitle.textContent = 'Nouveau bulletin scolaire';
            ouvrirModal();
        });

        // Fermer le modal
        closeModalBtn.addEventListener('click', fermerModal);
        closePreviewBtn.addEventListener('click', fermerPreview);

        // Ouvrir le modal
        function ouvrirModal() {
            bulletinModal.classList.remove('invisible', 'opacity-0');
            bulletinModal.classList.add('visible', 'opacity-100');
        }

        // Fermer le modal
        function fermerModal() {
            bulletinModal.classList.remove('visible', 'opacity-100');
            bulletinModal.classList.add('invisible', 'opacity-0');
        }

        // Ouvrir le modal d'aperçu
        function ouvrirPreview() {
            previewModal.classList.remove('invisible', 'opacity-0');
            previewModal.classList.add('visible', 'opacity-100');
        }

        // Fermer le modal d'aperçu
        function fermerPreview() {
            previewModal.classList.remove('visible', 'opacity-100');
            previewModal.classList.add('invisible', 'opacity-0');
        }

        // Lorsque le niveau change, mettre à jour les matières
        niveauSelect.addEventListener('change', function() {
            const niveau = this.value;
            matieresNotes.innerHTML = '';

            if (niveau && matieresParNiveau[niveau]) {
                matieresParNiveau[niveau].forEach(matiere => {
                    const tr = document.createElement('tr');

                    const tdMatiere = document.createElement('td');
                    tdMatiere.className = 'px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900';
                    tdMatiere.textContent = matiere;

                    const tdNote = document.createElement('td');
                    tdNote.className = 'px-4 py-3 whitespace-nowrap';
                    tdNote.innerHTML = `
                        <input type="number" min="0" max="20" step="0.5" class="grade-input px-2 py-1 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                    `;

                    const tdAppreciation = document.createElement('td');
                    tdAppreciation.className = 'px-4 py-3 whitespace-nowrap';
                    tdAppreciation.innerHTML = `
                        <input type="text" class="w-full px-2 py-1 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                    `;

                    tr.appendChild(tdMatiere);
                    tr.appendChild(tdNote);
                    tr.appendChild(tdAppreciation);
                    matieresNotes.appendChild(tr);
                });
            }
        });

        // Lorsque l'élève change, mettre à jour le niveau
        eleveSelect.addEventListener('change', function() {
            const eleveId = parseInt(this.value);
            const eleve = eleves.find(e => e.id === eleveId);

            if (eleve) {
                niveauSelect.value = eleve.niveau;
                // Déclencher manuellement l'événement change pour les matières
                const event = new Event('change');
                niveauSelect.dispatchEvent(event);
            }
        });

        // Gérer la soumission du formulaire
        bulletinForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Récupérer les notes
            const notes = [];
            const rows = matieresNotes.querySelectorAll('tr');

            rows.forEach(row => {
                const matiere = row.cells[0].textContent;
                const note = parseFloat(row.cells[1].querySelector('input').value);
                const appreciation = row.cells[2].querySelector('input').value;

                if (!isNaN(note)) {
                    notes.push({
                        matiere,
                        note,
                        appreciation
                    });
                }
            });

            const bulletinData = {
                eleveId: parseInt(eleveSelect.value),
                trimestre: trimestreSelect.value,
                niveau: niveauSelect.value,
                date: dateInput.value,
                notes,
                appreciation: appreciationInput.value
            };

            if (bulletinIdInput.value) {
                // Mettre à jour un bulletin existant
                const id = parseInt(bulletinIdInput.value);
                const index = bulletins.findIndex(b => b.id === id);
                if (index !== -1) {
                    bulletins[index] = { ...bulletins[index], ...bulletinData };
                }
            } else {
                // Ajouter un nouveau bulletin
                const newId = bulletins.length > 0 ? Math.max(...bulletins.map(b => b.id)) + 1 : 1;
                bulletins.push({ id: newId, ...bulletinData });
            }

            afficherBulletins();
            afficherStatistiques();
            fermerModal();
        });

        // Éditer un bulletin
        window.editerBulletin = function(id) {
            const bulletin = bulletins.find(b => b.id === id);
            if (bulletin) {
                bulletinIdInput.value = bulletin.id;
                eleveSelect.value = bulletin.eleveId;
                trimestreSelect.value = bulletin.trimestre;
                niveauSelect.value = bulletin.niveau;
                dateInput.value = bulletin.date;
                appreciationInput.value = bulletin.appreciation;

                // Déclencher le changement de niveau pour afficher les matières
                const event = new Event('change');
                niveauSelect.dispatchEvent(event);

                // Remplir les notes après un petit délai pour laisser le temps au DOM de se mettre à jour
                setTimeout(() => {
                    const rows = matieresNotes.querySelectorAll('tr');

                    rows.forEach(row => {
                        const matiere = row.cells[0].textContent;
                        const noteObj = bulletin.notes.find(n => n.matiere === matiere);

                        if (noteObj) {
                            row.cells[1].querySelector('input').value = noteObj.note;
                            row.cells[2].querySelector('input').value = noteObj.appreciation;
                        }
                    });
                }, 50);

                modalTitle.textContent = `Modifier le bulletin`;
                ouvrirModal();
            }
        };

        // Supprimer un bulletin
        window.supprimerBulletin = function(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce bulletin ?')) {
                bulletins = bulletins.filter(b => b.id !== id);
                afficherBulletins();
                afficherStatistiques();
            }
        };

        // Afficher l'aperçu d'un bulletin
        window.afficherPreview = function(id) {
            const bulletin = bulletins.find(b => b.id === id);
            if (bulletin) {
                const eleve = eleves.find(e => e.id === bulletin.eleveId);
                const moyenne = calculerMoyenne(bulletin.notes);
                const mention = getMention(moyenne);

                bulletinPreview.innerHTML = `
                    <div class="text-center mb-8">
                        <h1 class="text-2xl font-bold text-gray-800">École Primaire Les Petits Génies</h1>
                        <h2 class="text-xl font-semibold text-gray-700">Bulletin scolaire</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Élève</h3>
                            <p class="text-lg font-semibold">${eleve.prenom} ${eleve.nom}</p>
                            <p class="text-sm text-gray-600">${bulletin.niveau}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Trimestre</h3>
                            <p class="text-lg font-semibold">${bulletin.trimestre}ème trimestre</p>
                            <p class="text-sm text-gray-600">Année scolaire 2023-2024</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Moyenne générale</h3>
                            <p class="text-2xl font-bold ${getMentionColorClass(mention)}">${moyenne.toFixed(2)}</p>
                            <p class="text-sm font-medium ${getMentionColorClass(mention)}">${mention}</p>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Notes par matière</h3>
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-4 py-2 text-left font-medium">Matière</th>
                                    <th class="px-4 py-2 text-center font-medium">Note</th>
                                    <th class="px-4 py-2 text-left font-medium">Appréciation</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${bulletin.notes.map(note => `
                                    <tr class="border-b">
                                        <td class="px-4 py-3">${note.matiere}</td>
                                        <td class="px-4 py-3 text-center font-medium">${note.note}/20</td>
                                        <td class="px-4 py-3">${note.appreciation}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-2">Appréciation générale</h3>
                        <p class="text-gray-700">${bulletin.appreciation}</p>
                    </div>

                    <div class="flex justify-between items-center mt-8 pt-4 border-t">
                        <div>
                            <p class="text-sm text-gray-500">Date: ${formatDate(bulletin.date)}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Signature du directeur</p>
                            <div class="mt-8 h-16"></div>
                        </div>
                    </div>
                `;

                ouvrirPreview();
            }
        };

        // Aperçu du bulletin avant enregistrement
        previewBtn.addEventListener('click', function() {
            // Récupérer les données du formulaire
            const eleveId = parseInt(eleveSelect.value);
            const eleve = eleves.find(e => e.id === eleveId);
            const trimestre = trimestreSelect.value;
            const niveau = niveauSelect.value;
            const date = dateInput.value;

            // Récupérer les notes
            const notes = [];
            const rows = matieresNotes.querySelectorAll('tr');

            rows.forEach(row => {
                const matiere = row.cells[0].textContent;
                const note = parseFloat(row.cells[1].querySelector('input').value);
                const appreciation = row.cells[2].querySelector('input').value;

                if (!isNaN(note)) {
                    notes.push({
                        matiere,
                        note,
                        appreciation
                    });
                }
            });

            const appreciation = appreciationInput.value;
            const moyenne = notes.length > 0 ? calculerMoyenne(notes) : 0;
            const mention = getMention(moyenne);

            if (eleve && notes.length > 0) {
                bulletinPreview.innerHTML = `
                    <div class="text-center mb-8">
                        <h1 class="text-2xl font-bold text-gray-800">École Primaire Les Petits Génies</h1>
                        <h2 class="text-xl font-semibold text-gray-700">Bulletin scolaire</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Élève</h3>
                            <p class="text-lg font-semibold">${eleve.prenom} ${eleve.nom}</p>
                            <p class="text-sm text-gray-600">${niveau}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Trimestre</h3>
                            <p class="text-lg font-semibold">${trimestre}ème trimestre</p>
                            <p class="text-sm text-gray-600">Année scolaire 2023-2024</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Moyenne générale</h3>
                            <p class="text-2xl font-bold ${getMentionColorClass(mention)}">${moyenne.toFixed(2)}</p>
                            <p class="text-sm font-medium ${getMentionColorClass(mention)}">${mention}</p>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Notes par matière</h3>
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-4 py-2 text-left font-medium">Matière</th>
                                    <th class="px-4 py-2 text-center font-medium">Note</th>
                                    <th class="px-4 py-2 text-left font-medium">Appréciation</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${notes.map(note => `
                                    <tr class="border-b">
                                        <td class="px-4 py-3">${note.matiere}</td>
                                        <td class="px-4 py-3 text-center font-medium">${note.note}/20</td>
                                        <td class="px-4 py-3">${note.appreciation}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-2">Appréciation générale</h3>
                        <p class="text-gray-700">${appreciation}</p>
                    </div>

                    <div class="flex justify-between items-center mt-8 pt-4 border-t">
                        <div>
                            <p class="text-sm text-gray-500">Date: ${formatDate(date)}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Signature du directeur</p>
                            <div class="mt-8 h-16"></div>
                        </div>
                    </div>
                `;

                ouvrirPreview();
            } else {
                alert("Veuillez sélectionner un élève et saisir au moins une note avant de prévisualiser.");
            }
        });

        // Imprimer le bulletin
        printBtn.addEventListener('click', function() {
            const printContents = bulletinPreview.innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

            // Réinitialiser l'affichage
            afficherBulletins();
        });

        // Imprimer tous les bulletins
        printAllBtn.addEventListener('click', function() {
            // Implémentation simplifiée pour l'exemple
            alert("Fonctionnalité d'impression de tous les bulletins sera implémentée ici");
        });

        // Filtrer les bulletins
        searchBtn.addEventListener('click', function() {
            const niveau = niveauFilter.value;
            const trimestre = trimestreFilter.value;
            const eleveNom = eleveSearch.value.toLowerCase();

            let bulletinsFiltres = bulletins;

            if (niveau) {
                bulletinsFiltres = bulletinsFiltres.filter(b => b.niveau === niveau);
            }

            if (trimestre) {
                bulletinsFiltres = bulletinsFiltres.filter(b => b.trimestre === trimestre);
            }

            if (eleveNom) {
                bulletinsFiltres = bulletinsFiltres.filter(b => {
                    const eleve = eleves.find(e => e.id === b.eleveId);
                    return eleve && (eleve.nom.toLowerCase().includes(eleveNom) || eleve.prenom.toLowerCase().includes(eleveNom));
                });
            }

            afficherBulletins(bulletinsFiltres);
        });

        // Éditer les matières d'un niveau
        window.editerMatieres = function(niveau) {
            alert(`Fonctionnalité d'édition des matières pour le niveau ${niveau} sera implémentée ici`);
        };

        // Enregistrer les seuils des mentions
        saveSeuilsBtn.addEventListener('click', function() {
            alert("Les seuils des mentions ont été enregistrés");
            afficherStatistiques();
        });

        // Initialiser l'application au chargement
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>
