<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Enseignants | École Primaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Title and Actions -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div class="mb-4 md:mb-0">
                <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-chalkboard-teacher text-indigo-600 mr-3"></i>
                    Liste des Enseignants
                </h2>
                <p class="text-gray-600 mt-1">Gérez le corps enseignant de votre établissement</p>
            </div>

            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full md:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" placeholder="Rechercher un enseignant..."
                           class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option>Tous les niveaux</option>
                    <option>Maternelle</option>
                    <option>CP</option>
                    <option>CE1</option>
                    <option>CE2</option>
                    <option>CM1</option>
                    <option>CM2</option>
                </select>
            </div>
        </div>

        <!-- Teachers List -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Table Header -->
            <div class="grid grid-cols-12 bg-gray-50 px-6 py-3 border-b font-medium text-gray-600 uppercase text-sm">
                <div class="col-span-4 md:col-span-3">Enseignant</div>
                <div class="col-span-3 md:col-span-2 hidden sm:block">Contact</div>
                <div class="col-span-4 md:col-span-3">Niveau</div>
                <div class="col-span-2 md:col-span-2 text-center">Actions</div>
            </div>

            <!-- Teacher Items -->
            <div id="teachers-list">
                @foreach($enseignants as $enseignant)
                <div class="grid grid-cols-12 items-center px-6 py-4 border-b hover:bg-gray-50 transition animate-fade-in">
                    <div class="col-span-4 md:col-span-3 flex items-center">
                        <img src="{{ asset("images/".$enseignant->profil) }}"  class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <h4 class="font-medium text-gray-800">{{ $enseignant->nom }} {{ $enseignant->prénom }}</h4>
                            <p class="text-sm text-gray-500">Né le {{ \Carbon\Carbon::parse($enseignant->date_naissance)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="col-span-3 md:col-span-2 hidden sm:block">
                        <p class="text-gray-800">{{ $enseignant->email }}</p>
                        <p class="text-sm text-gray-500">{{ $enseignant->tel1 }}</p>
                    </div>
                    <div class="col-span-4 md:col-span-3">
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $enseignant->id_classe) as $niveau)
                            <span class="specialty-chip px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">{{ $niveau }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-span-2 md:col-span-2 flex flex-col items-center">
                        <div class="flex justify-center">
                            <button class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-full transition" onclick="window.location.href='{{ route('teacher.info',$enseignant->id_maitre) }}'">
                                <i class="fas fa-eye"> </i>Voir les informations
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

</body>
</html>
