<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Élève</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="md:flex">
                <!-- Left side - Form -->
                <div class="w-full p-8">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-3xl font-bold text-green-700">Inscription Élève</h2>
                        <div class="w-16 h-1 bg-green-500"></div>
                    </div>

                    <form id="registrationForm" class="mt-8 space-y-6" method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nom -->
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom*</label>
                                <input id="nom" name="nom" type="text" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                            <!-- Prénom -->
                            <div>
                                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom*</label>
                                <input id="prenom" name="prénom" type="text" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                            <!-- Date de naissance -->
                            <div>
                                <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de naissance*</label>
                                <input id="date_naissance" name="date_naissance" type="date" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                             <!-- Lieu de naissance -->
                             <div>
                                <label for="lieu_naissance" class="block text-sm font-medium text-gray-700">Lieu de naissance*</label>
                                <input id="lieu_naissance" name="lieu_naissance" type="text" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                            <!-- Sexe -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Sexe*</label>
                                <div class="mt-1 flex space-x-4">
                                    <div class="flex items-center">
                                        <input id="sexe_m" name="sexe" type="radio" value="Masculin" required
                                            class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300">
                                        <label for="sexe_m" class="ml-2 block text-sm text-gray-700">Masculin</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="sexe_f" name="sexe" type="radio" value="Féminin"
                                            class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300">
                                        <label for="sexe_f" class="ml-2 block text-sm text-gray-700">Féminin</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Statut -->
                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700">Statut*</label>
                                <select id="statut" name="statut" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                    <option value="">Sélectionnez un statut</option>
                                    <option value="Redoublant">Redoublant</option>
                                    <option value="Non redoublant">Non redoublant</option>
                                </select>
                            </div>

                            <!-- Nom tuteur -->
                            <div>
                                <label for="nom_tuteur" class="block text-sm font-medium text-gray-700">Nom tuteur*</label>
                                <input id="nom_tuteur" name="nom_tuteur" type="text" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                            <!-- Téléphone 1 tuteur -->
                            <div>
                                <label for="tel1_tuteur" class="block text-sm font-medium text-gray-700">Téléphone 1 tuteur*</label>
                                <input id="tel1_tuteur" name="tel1_tuteur" type="tel" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                            <!-- Téléphone 2 tuteur -->
                            <div>
                                <label for="tel2_tuteur" class="block text-sm font-medium text-gray-700">Téléphone 2 tuteur</label>
                                <input id="tel2_tuteur" name="tel2_tuteur" type="tel"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                            <!-- Email tuteur -->
                            <div>
                                <label for="email_tuteur" class="block text-sm font-medium text-gray-700">Email tuteur</label>
                                <input id="email_tuteur" name="email_tuteur" type="email"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>

                            <!-- Adresse -->
                            <div>
                                <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse*</label>
                                <input id="adresse" name="addresse" rows="2" type="text" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"></input>
                            </div>

                            <!-- ID Classe -->
                            <div>
                                <label for="id_classe" class="block text-sm font-medium text-gray-700">Classe*</label>
                                <select id="id_classe" name="id_classe" required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                    <option value="">Sélectionnez une classe</option>
                                    <option value="Pré-maternelle">Pre maternelle</option>
                                    <option value="Petite section">Petite section</option>
                                    <option value="Moyenne section">Moyenne section</option>
                                    <option value="Grande section">Grande section </option>
                                    <option value="SIL">SIL</option>
                                    <option value="CP">CP</option>
                                    <option value="CE1">CE1</option>
                                    <option value="CE2">CE2</option>
                                    <option value="CM1">CM1</option>
                                    <option value="CM2">CM2</option>
                                    <option value="Pre-nursery">Pre-nursery</option>
                                    <option value="Nursery 1">Nursery 1</option>
                                    <option value="Nursery 2">Nursery 2</option>
                                    <option value="Class 1">Class 1</option>
                                    <option value="Class 2">Class 2</option>
                                    <option value="Class 3">Class 3</option>
                                    <option value="Class 4">Class 4</option>
                                    <option value="Class 5">Class 5</option>
                                    <option value="Class 6">Class 6</option>

                                </select>
                            </div>

                            <!-- Photo de profil -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Photo de profil</label>
                                <div class="mt-1 flex items-center">
                                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                        <img id="preview" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23cccccc' viewBox='0 0 24 24'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z'/%3E%3C/svg%3E" alt="Preview" class="h-full w-full text-gray-300">
                                    </span>
                                    <input id="profil" name="profil" type="file" accept="image/*" class="custom-file-input ml-5">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="terms" name="terms" type="checkbox" required
                                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="terms" class="ml-2 block text-sm text-gray-700">
                                    J'accepte les <a href="#" class="text-green-600 hover:text-green-500">conditions d'utilisation</a>
                                </label>
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                                <i class="fas fa-user-plus mr-2"></i> S'inscrire
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right side - Illustration -->
                <div class="hidden md:block md:w-1/3 bg-green-600 p-8 flex flex-col justify-center items-center text-white">
                    <div class="text-center">
                        <i class="fas fa-user-graduate text-6xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Bienvenue à l'école</h3>
                        <p class="text-sm opacity-80">Remplissez ce formulaire pour inscrire un nouvel élève dans notre établissement.</p>
                    </div>
                    <div class="mt-8 w-full">
                        <div class="bg-green-700 bg-opacity-30 rounded-lg p-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span class="text-sm">Matricule unique</span>
                            </div>
                        </div>
                        <div class="bg-green-700 bg-opacity-30 rounded-lg p-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span class="text-sm">Informations complètes</span>
                            </div>
                        </div>
                        <div class="bg-green-700 bg-opacity-30 rounded-lg p-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span class="text-sm">Sécurité des données</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/InscriptionEleve.js') }}"></script>
</body>
</html>
