<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communication avec les Parents - École Primaire Yaoundé</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Communication avec les Parents</h2>
        <p class="text-gray-600 mb-4">Gestion des messages et annonces pour les parents.</p>

        <div class="flex justify-between mb-4">
            <div class="w-1/3">
                <input type="text" id="filterCommunication" placeholder="Filtrer par nom ou date..." class="w-full p-2 border rounded-lg">
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="filterCommunication()">Filtrer</button>
        </div>

        <div class="mb-4">
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="openModal('addCommunicationModal')">Envoyer un message</button>
            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 ml-2" onclick="deleteCommunication()">Supprimer</button>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold mb-2">Liste des Messages</h3>
            <ul id="communicationList" class="space-y-2">
                <li class="flex justify-between items-center p-2 border-b" data-name="ngono" data-date="2025-06-10">
                    Message à M. Ngono - Réunion parents - 10/06/2025
                    <span class="text-green-600">Envoyé</span>
                </li>
                <li class="flex justify-between items-center p-2 border-b" data-name="ebang" data-date="2025-06-15">
                    Annonce générale - Vacances - 15/06/2025
                    <span class="text-green-600">Envoyé</span>
                </li>
            </ul>
        </div>

        <!-- Modal for Adding Communication -->
        <div id="addCommunicationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h3 class="text-lg font-bold mb-4">Envoyer un Message</h3>
                <input type="text" id="communicationRecipient" placeholder="Destinataire" class="w-full p-2 mb-2 border rounded-lg">
                <input type="text" id="communicationContent" placeholder="Contenu" class="w-full p-2 mb-2 border rounded-lg">
                <input type="date" id="communicationDate" class="w-full p-2 mb-2 border rounded-lg">
                <div class="flex justify-end">
                    <button class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2" onclick="closeModal('addCommunicationModal')">Annuler</button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg" onclick="addCommunication()">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterCommunication() {
            const filterValue = document.getElementById('filterCommunication').value.toLowerCase();
            const items = document.getElementById('communicationList').getElementsByTagName('li');
            for (let i = 0; i < items.length; i++) {
                const text = items[i].textContent.toLowerCase();
                items[i].style.display = text.includes(filterValue) ? '' : 'none';
            }
        }

        function addCommunication() {
            const recipient = document.getElementById('communicationRecipient').value;
            const content = document.getElementById('communicationContent').value;
            const date = document.getElementById('communicationDate').value;
            if (recipient && content && date) {
                const li = document.createElement('li');
                li.className = 'flex justify-between items-center p-2 border-b';
                li.setAttribute('data-name', recipient.toLowerCase());
                li.setAttribute('data-date', date);
                li.innerHTML = `Message à ${recipient} - ${content} - ${date.split('-').reverse().join('/')} <span class="text-green-600">Envoyé</span>`;
                document.getElementById('communicationList').appendChild(li);
                closeModal('addCommunicationModal');
                document.getElementById('communicationRecipient').value = '';
                document.getElementById('communicationContent').value = '';
                document.getElementById('communicationDate').value = '';
            } else {
                alert('Veuillez remplir tous les champs.');
            }
        }

        function deleteCommunication() {
            const list = document.getElementById('communicationList');
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
