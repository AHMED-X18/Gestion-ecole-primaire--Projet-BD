<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Élève</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="form-container rounded-xl shadow-2xl overflow-hidden">
            <div class="bg-blue-600 py-4 px-6">
                <h1 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-user-graduate mr-3"></i>
                    Formulaire d'Inscription Élève
                </h1>
            </div>

            <form class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Section Photo de profil -->
                <div class="md:col-span-2 flex flex-col items-center">
                    <div class="relative mb-4">
                        <img id="profilePreview" src="https://via.placeholder.com/120" alt="Photo de profil" class="profile-preview">
                        <label for="profileUpload" class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-2 cursor-pointer hover:bg-blue-600 transition">
                            <i class="fas fa-camera"></i>
                            <input type="file" id="profileUpload" accept="image/*" class="hidden">
                        </label>
                    </div>
                    <p class="text-gray-600 text-sm">Cliquez sur l'icône pour ajouter une photo</p>
                </div>

                <!-- Section Informations de l'élève -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-blue-700 border-b pb-2">
                        <i class="fas fa-info-circle mr-2"></i>Informations de l'élève
                    </h2>

                    <div>
                        <label for="matricule" class="block text-sm font-medium text-gray-700 mb-1">Matricule*</label>
                        <div class="relative">
                            <input type="text" id="matricule" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: MAT2023001">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-id-card"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom*</label>
                        <div class="relative">
                            <input type="text" id="nom" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nom de famille">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom*</label>
                        <div class="relative">
                            <input type="text" id="prenom" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Prénom(s)">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="naissance" class="block text-sm font-medium text-gray-700 mb-1">Date de naissance*</label>
                        <div class="relative">
                            <input type="date" id="naissance" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-calendar-day"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sexe*</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="sexe" value="M" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Masculin</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="sexe" value="F" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-gray-700">Féminin</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="classe" class="block text-sm font-medium text-gray-700 mb-1">Classe*</label>
                        <div class="relative">
                            <select id="classe" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                                <option value="">Sélectionnez une classe</option>
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
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Section Informations du tuteur -->
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-blue-700 border-b pb-2">
                        <i class="fas fa-user-tie mr-2"></i>Informations du tuteur
                    </h2>

                    <div>
                        <label for="tuteur" class="block text-sm font-medium text-gray-700 mb-1">Nom complet du tuteur*</label>
                        <div class="relative">
                            <input type="text" id="tuteur" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nom et prénom du tuteur">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-user-tie"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="tel1" class="block text-sm font-medium text-gray-700 mb-1">Téléphone 1*</label>
                        <div class="relative">
                            <input type="tel" id="tel1" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: +225 01 23 45 67 89">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-phone"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="tel2" class="block text-sm font-medium text-gray-700 mb-1">Téléphone 2</label>
                        <div class="relative">
                            <input type="tel" id="tel2" class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Numéro secondaire (optionnel)">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email du tuteur</label>
                        <div class="relative">
                            <input type="email" id="email" class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="email@exemple.com">
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="statut" class="block text-sm font-medium text-gray-700 mb-1">Statut*</label>
                        <div class="relative">
                            <select id="statut" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                                <option value="">Sélectionnez un statut</option>
                                <option value="interne">Interne</option>
                                <option value="externe">Externe</option>
                                <option value="demi-pensionnaire">Demi-pensionnaire</option>
                            </select>
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-user-tag"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse*</label>
                        <div class="relative">
                            <textarea id="adresse" rows="3" required class="w-full input-field px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Adresse complète"></textarea>
                            <span class="absolute right-3 top-2.5 text-gray-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Boutons de soumission -->
                <div class="md:col-span-2 flex justify-end space-x-4 pt-4">
                    <button type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition flex items-center">
                        <i class="fas fa-eraser mr-2"></i> Effacer
                    </button>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                        <i class="fas fa-save mr-2"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Prévisualisation de la photo de profil
        document.getElementById('profileUpload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('profilePreview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Validation du formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Ici vous pouvez ajouter la logique de validation et d'envoi des données
            alert('Formulaire soumis avec succès!');
            // this.reset();
        });
    </script>
</body>
</html>
