<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Enseignant | École Primaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Page Title -->
            <div class="flex items-center mb-8">
                <i class="fas fa-chalkboard-teacher text-4xl text-indigo-600 mr-4"></i>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Ajouter un nouvel enseignant</h2>
                    <p class="text-gray-600">Remplissez le formulaire pour enregistrer un nouveau membre du corps enseignant</p>
                </div>
            </div>

            <!-- Success Message (hidden by default) -->
            <div id="success-message" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-2"></i>
                    <span>L'enseignant a été ajouté avec succès!</span>
                </div>
            </div>

            <!-- Error Message (hidden by default) -->
            <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                    <span id="error-text">Veuillez remplir tous les champs obligatoires.</span>
                </div>
            </div>

            <!-- Teacher Form -->
            <form id="teacher-form" class="bg-white shadow-md rounded-lg p-6" method="POST" action="{{ route('enseignant.store') }}" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <!-- Personal Information -->
                    <div class="col-span-2">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">
                            <i class="fas fa-user-graduate mr-2 text-indigo-500"></i>
                            Informations personnelles
                        </h3>
                    </div>

                    <div>
                        <label for="lastname" class="block text-gray-700 font-medium mb-2">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="lastname" name="nom"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition"
                                   placeholder="Dupont">
                            <i class="fas fa-user absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label for="firstname" class="block text-gray-700 font-medium mb-2">
                            Prénom <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="firstname" name="prénom"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition"
                                   placeholder="Jean">
                            <i class="fas fa-user absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label for="birthdate" class="block text-gray-700 font-medium mb-2">
                            Date de naissance <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="date" id="birthdate" name="date_naissance"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition">
                            <i class="fas fa-calendar-day absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label for="gender" class="block text-gray-700 font-medium mb-2">
                            Sexe <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="gender" name="sexe"
                                    class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition appearance-none">
                                <option value="" disabled selected>Sélectionnez</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="col-span-2 mt-6">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">
                            <i class="fas fa-address-book mr-2 text-indigo-500"></i>
                            Coordonnées
                        </h3>
                    </div>

                    <div>
                        <label for="phone1" class="block text-gray-700 font-medium mb-2">
                            Téléphone 1 <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="tel" id="phone1" name="tel1"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition"
                                   placeholder="06 12 34 56 78">
                            <i class="fas fa-phone absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label for="phone2" class="block text-gray-700 font-medium mb-2">
                            Téléphone 2
                        </label>
                        <div class="relative">
                            <input type="tel" id="phone2" name="tel2"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition"
                                   placeholder="06 98 76 54 32">
                            <i class="fas fa-phone-alt absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="email" id="email" name="email"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition"
                                   placeholder="jean.dupont@example.com">
                            <i class="fas fa-envelope absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label for="address" class="block text-gray-700 font-medium mb-2">
                            Adresse <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="address" name="addresse"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition"
                                   placeholder="123 Rue de l'École">
                            <i class="fas fa-map-marker-alt absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div class="col-span-2 mt-6">
                        <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">
                            <i class="fas fa-briefcase mr-2 text-indigo-500"></i>
                            Informations professionnelles
                        </h3>
                    </div>

                     <!-- ID Classe -->
                     <div>
                        <label for="id_classe" class="block text-sm font-medium text-gray-700">Classe*</label>
                        <select id="id_classe" name="id_classe" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            <option value="">Sélectionnez une classe</option>
                            <option value="Pre maternelle">Pre maternelle</option>
                            <option value="Petite section">Petite section</option>
                            <option value="Moyenne section">Moyenne section</option>
                            <option value="Grande section">Grande section </option>
                            <option value="SIL">SIL</option>
                            <option value="CP">CP</option>
                            <option value="CE1">CE1</option>
                            <option value="CE2">CE2</option>
                            <option value="CM1">CM1</option>
                            <option value="CM2">CM2</option>
                            <option value="Pre nursery">Pre nursery</option>
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


                    <div>
                        <label for="profile" class="block text-gray-700 font-medium mb-2">
                            Profil (télécharger une photo)
                        </label>
                        <div class="relative">
                            <input type="file" id="profile" name="profil"
                                   class="w-full px-4 py-2 border rounded-lg input-focus focus:outline-none focus:border-indigo-500 transition"
                                   accept="image/*">
                            <i class="fas fa-id-card absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4">
                    <button type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
                        <i class="fas fa-eraser mr-2"></i> Réinitialiser
                    </button>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition shadow-md">
                        <i class="fas fa-save mr-2"></i> Enregistrer l'enseignant
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
