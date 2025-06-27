<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Archives - École Primaire Yaoundé</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Gestion des Archives</h2>
        <p class="text-gray-600 mb-4">Visualisation et gestion des archives de l'école.</p>

        <div class="flex justify-between mb-4">
            <div class="w-1/3">
                <input type="text" id="filterArchives" placeholder="Filtrer par année ou type..." class="w-full p-2 border rounded-lg">
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="filterArchives()">Filtrer</button>
        </div>

        <div class="mb-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="openModal('addArchiveModal')">Ajouter une archive</button>
            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 ml-2" onclick="deleteArchive()">Supprimer</button>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold mb-2">Liste des Archives</h3>
            <ul id="archivesList" class="space-y-2">
                <li class="flex justify-between items-center p-2 border-b" data-year="2025" data-type="rapports">
                    Année 2025 - Rapports Annuels
                    <span class="text-green-600">Disponible</span>
                </li>
                <li class="flex justify-between items-center p-2 border-b" data-year="2024" data-type="dossiers">
                    Année 2024 - Dossiers Élèves
                    <span class="text-green-600">Disponible</span>
                </li>
            </ul>
        </div>

        <!-- Modal for Adding Archive -->
        <div id="addArchiveModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h3 class="text-lg font-bold mb-4">Ajouter une Archive</h3>
                <input type="text" id="archiveYear" placeholder="Année" class="w-full p-2 mb-2 border rounded-lg">
                <input type="text" id="archiveType" placeholder="Type" class="w-full p-2 mb-2 border rounded-lg">
                <div class="flex justify-end">
                    <button class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2" onclick="closeModal('addArchiveModal')">Annuler</button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg" onclick="addArchive()">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterArchives() {
            const filterValue = document.getElementById('filterArchives').value.toLowerCase();
            const items = document.getElementById('archivesList').getElementsByTagName('li');
            for (let i = 0; i < items.length; i++) {
                const text = items[i].textContent.toLowerCase();
                items[i].style.display = text.includes(filterValue) ? '' : 'none';
            }
        }

        function addArchive() {
            const year = document.getElementById('archiveYear').value;
            const type = document.getElementById('archiveType').value;
            if (year && type) {
                const li = document.createElement('li');
                li.className = 'flex justify-between items-center p-2 border-b';
                li.setAttribute('data-year', year);
                li.setAttribute('data-type', type.toLowerCase());
                li.innerHTML = `Année ${year} - ${type} <span class="text-green-600">Disponible</span>`;
                document.getElementById('archivesList').appendChild(li);
                closeModal('addArchiveModal');
                document.getElementById('archiveYear').value = '';
                document.getElementById('archiveType').value = '';
            } else {
                alert('Veuillez remplir tous les champs.');
            }
        }

        function deleteArchive() {
            const list = document.getElementById('archivesList');
            if (list.lastChild) list.removeChild(list.lastChild);
        }

        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
</body>
</html>
