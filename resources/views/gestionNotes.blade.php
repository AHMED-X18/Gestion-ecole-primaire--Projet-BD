<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Notes | Les étoiles de l'avenir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animation pour les transitions de page */
        .page {
            transition: all 0.3s ease-in-out;
        }

        /* Style pour le tableau des notes */
        .notes-table th {
            background-color: #3b82f6;
            color: white;
        }

        /* Style personnalisé pour les boutons */
        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        /* Animation de chargement */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-spinner {
            animation: spin 1s linear infinite;
        }

        /* Effet de carte */
        .card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Style pour le mode impression */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                padding: 0;
                margin: 0;
                background: white;
                color: black;
            }

            .bulletin-container {
                box-shadow: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-blue-600 mb-2">Les étoiles de l'avenir</h1>
            <h2 class="text-2xl text-gray-600">Gestion des notes scolaires</h2>
        </header>

        <!-- Page principale -->
        <div id="mainPage" class="page">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
                <!-- Option 1: Enregistrer les notes -->
                <div class="card bg-white rounded-lg p-6 cursor-pointer" onclick="window.location.href='{{ route('showNote')}}'">
                    <div class="text-center">
                        <div class="mb-4 text-blue-500">
                            <i class="fas fa-pen-fancy text-5xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Enregistrer les notes</h3>
                        <p class="text-gray-600">Saisissez les notes des élèves par classe et par matière</p>
                    </div>
                </div>

                <!-- Option 2: Générer bulletin -->
                <div class="card bg-white rounded-lg p-6 cursor-pointer" onclick="window.location.href='{{ route('student.bulletin')}}'">
                    <div class="text-center">
                        <div class="mb-4 text-green-500">
                            <i class="fas fa-file-alt text-5xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Générer les bulletins</h3>
                        <p class="text-gray-600">Créez et imprimez les bulletins de notes des élèves</p>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
