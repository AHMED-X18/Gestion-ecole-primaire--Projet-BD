<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Élève</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="form-container rounded-xl shadow-2xl overflow-hidden">
            <div class="bg-blue-600 py-4 px-6">
                <h1 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-user-graduate mr-3"></i>
                    Informations Élève
                </h1>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informations de l'élève -->
                <div>
                    <h2 class="text-lg font-semibold text-blue-700 border-b pb-2">
                        <i class="fas fa-info-circle mr-2"></i>Informations de l'élève
                    </h2>

                    <div class="space-y-4 mt-4">
                        <p><strong>Matricule:</strong> {{ $eleve->matricule }}</p>
                        <p><strong>Nom:</strong> {{ $eleve->nom }}</p>
                        <p><strong>Prénom:</strong> {{ $eleve->prénom }}</p>
                        <p><strong>Date et lieu de naissance:</strong> {{ $eleve->date_naissance }} À {{$eleve->lieu_naissance}}</p>
                        <p><strong>Sexe:</strong> {{ $eleve->sexe}}</p>
                        <p><strong>Classe:</strong> {{ $eleve->id_classe }}</p>
                        <p><strong>Statut:</strong> {{ $eleve->statut }}</p>
                        <p><strong>Adresse:</strong> {{ $eleve->addresse }}</p>
                    </div>
                </div>

                <!-- Section Photo de profil -->
                <div class="flex justify-center">
                    <img id="profilePreview" src="storage/image/eleve/{{ $eleve->profil }}" alt="Photo de profil" class="profile-preview">
                    <p>{{$eleve->profil}}</p>
                </div>
            </div>

            <!-- Informations du tuteur -->
            <h2 class="text-lg font-semibold text-blue-700 border-b pb-2 mt-6 px-6">
                <i class="fas fa-user-tie mr-2"></i>Informations du tuteur
            </h2>

            <div class="px-6 space-y-4 mt-4">
                <p><strong>Nom complet du tuteur:</strong> {{ $eleve->nom_tuteur }}</p>
                <p><strong>Téléphone 1:</strong> {{ $eleve->tel1_tuteur }}</p>
                <p><strong>Téléphone 2:</strong> {{ $eleve->tel2_tuteur }}</p>
                <p><strong>Email du tuteur:</strong> {{ $eleve->email_tuteur }}</p>
            </div>
            <div class="px-6 space-y-8 pt-4 px-6">
                <button onclick="window.location.href=" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                    <i class="fas fa-user mr-2"></i> Modifier les informations
                </button>
                <button onclick="window.location.href=" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                    <i class="fas fa-folder-open mr-2"></i> Dossier d'inscription
                </button>
                 <button onclick="window.location.href=" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                    <i class="fas fa-folder-open mr-2"></i> Dossier d'examen
                </button>

            <!-- Boutons d'action -->
            <div class="flex justify-end space-x-4 pt-4 px-6">
                <button onclick="window.print()" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                    <i class="fas fa-print mr-2"></i> Imprimer
                </button>
                <button onclick="window.history.back()" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Retour
                </button>
            </div>
        </div>
    </div>

</body>
</html>
