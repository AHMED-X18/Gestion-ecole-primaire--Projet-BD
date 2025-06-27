<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Enseignant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @media print {
            /* Styles spécifiques à l'impression */
            body {
                font-size: 12pt;
                background: none;
                color: #000;
            }

            .no-print {
                display: none !important;
            }

            /* Force les couleurs pour l'impression */
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-purple-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="form-container rounded-xl shadow-2xl overflow-hidden">
            <div class="bg-purple-600 py-4 px-6">
                <h1 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-user mr-3"></i>
                    Informations Enseignant
                </h1>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informations de l'enseignant -->
                <div>
                    <h2 class="text-lg font-semibold text-purple-700 border-b pb-2">
                        <i class="fas fa-info-circle mr-2"></i>Informations de l'enseignant
                    </h2>

                    <div class="space-y-4 mt-4">
                        <p><strong>Matricule:</strong> {{ $enseignant->id_maitre }}</p>
                        <p><strong>Nom:</strong> {{ $enseignant->nom }}</p>
                        <p><strong>Prénom:</strong> {{ $enseignant->prénom }}</p>
                        <p><strong>Date de naissance:</strong> {{ $enseignant->date_naissance }}</p>
                        <p><strong>Sexe:</strong> {{ $enseignant->sexe}}</p>
                        <p><strong>Numero de téléphone 1 :</strong> {{ $enseignant->tel1}}</p>
                        <p><strong>Numéro de téléphone 2 :</strong> {{ $enseignant->tel2}}</p>
                        <p><strong>Classe:</strong> {{ $enseignant->id_classe }}</p>
                        <p><strong>Statut:</strong> {{ $enseignant->statut }}</p>
                        <p><strong>Adresse:</strong> {{ $enseignant->addresse }}</p>
                        <p><strong>Email:</strong> {{ $enseignant->email }}</p>
                    </div>
                </div>

                <!-- Section Photo de profil -->
                <div class="flex justify-center">
                    <img id="profilePreview" src="{{ asset('images/' . $enseignant->profil) }}" alt="Photo de profil" class="profile-show">
                </div>
            </div>

            <div class="px-6 space-y-8 pt-4">
                <button onclick="window.location.href=''" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition flex items-center">
                    <i class="fas fa-user mr-2"></i> Modifier les informations
                </button>
            </div>

            <!-- Boutons d'action -->
            <div class="flex justify-end space-x-4 pt-4 px-6">
                <button onclick="confirmDelete('{{ route('deleteTeacher', ['id_maitre' => $enseignant->id_maitre]) }}')" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition flex items-center">
                    <i class="fas fa-trash mr-2"></i> Supprimer cet enseignant
                </button>
                <button onclick="window.print()" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                    <i class="fas fa-print mr-2"></i> Imprimer
                </button>
                <button onclick="window.history.back()" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Retour
                </button>
            </div>
        </div>
    </div>

    <!-- Hidden form for DELETE request -->
    <form id="deleteTeacherForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function confirmDelete(deleteUrl) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet enseignant ?")) {
                const form = document.getElementById('deleteTeacherForm');
                form.action = deleteUrl;
                form.submit();
            }
        }
    </script>
</body>
</html>