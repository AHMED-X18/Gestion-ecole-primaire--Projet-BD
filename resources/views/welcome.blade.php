<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Étoiles de l'Avenir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>

                        <img src="/images/logo.png" alt="Logo" class="h-20 w-20 mr-2">
                        <span class="font-semibold text-green-600 text-lg">Les Étoiles de l'Avenir</span>

                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#accueil" class="py-4 px-2 text-green-600 font-semibold border-b-4 border-green-600">Accueil</a>
                    <a href="#apropos" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-600 transition duration-300">À propos</a>
                    <a href="#services" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-600 transition duration-300">Services</a>
                    <a href="#equipe" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-600 transition duration-300">Équipe</a>
                    <a href="#statistiques" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-600 transition duration-300">Statistiques</a>
                    <a href="#contact" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-600 transition duration-300">Contact</a>
                    <button id="loginBtn" class="py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300" onclick="window.location.href='{{ route('login') }}'">
                        Connexion
                    </button>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden mobile-menu">
            <ul>
                <li>
                    <button id="mobileLoginBtn" class="block w-full text-left text-sm px-2 py-4 hover:bg-green-600 hover:text-white transition duration-300">
                        Connexion
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="accueil" class="hero text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-6">Bienvenue aux Étoiles de l'Avenir</h1>
            <p class="text-xl mb-8">L'excellence éducative au cœur de Yaoundé</p>
        </div>
    </section>

    <!-- À propos -->
    <section id="apropos" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-green-600 mb-12">À propos de notre école</h2>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="/images/ecole.jpg" alt="École" class="rounded-lg shadow-xl">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Notre histoire</h3>
                    <p class="text-gray-600 mb-4">
                        Fondée en 2005, Les Étoiles de l'Avenir est une école primaire située à Yaoundé, au Cameroun. Notre mission est de fournir une éducation de qualité qui prépare les élèves à devenir des citoyens responsables et éclairés.
                    </p>
                    <p class="text-gray-600 mb-4">
                        Avec une approche pédagogique innovante et un environnement d'apprentissage stimulant, nous nous engageons à développer le potentiel de chaque enfant.
                    </p>
                    <div class="flex items-center mt-6">
                        <div class="mr-4">
                            <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full">
                                <i class="fas fa-graduation-cap text-green-600 text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Notre vision</h4>
                            <p class="text-gray-600">Former les leaders de demain à travers une éducation holistique et inclusive.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-green-600 mb-12">Nos Services Éducatifs</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-green-600 mb-4">
                        <i class="fas fa-book-open text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Programme Académique</h3>
                    <p class="text-gray-600">
                        Un curriculum complet conforme aux normes nationales avec des matières fondamentales et des activités parascolaires enrichissantes.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-green-600 mb-4">
                        <i class="fas fa-laptop text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Technologie Éducative</h3>
                    <p class="text-gray-600">
                        Salle informatique moderne avec accès à internet pour initier les élèves aux technologies numériques dès le plus jeune âge.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-green-600 mb-4">
                        <i class="fas fa-utensils text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Cantine Scolaire</h3>
                    <p class="text-gray-600">
                        Service de restauration avec des repas équilibrés préparés sur place pour assurer une bonne nutrition aux élèves.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-green-600 mb-4">
                        <i class="fas fa-bus text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Transport Scolaire</h3>
                    <p class="text-gray-600">
                        Service de transport sécurisé avec des itinéraires couvrant les principaux quartiers de Yaoundé.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-green-600 mb-4">
                        <i class="fas fa-heartbeat text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Santé Scolaire</h3>
                    <p class="text-gray-600">
                        Infirmerie équipée et visites médicales régulières pour assurer le bien-être physique des élèves.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <div class="text-green-600 mb-4">
                        <i class="fas fa-futbol text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Activités Sportives</h3>
                    <p class="text-gray-600">
                        Programme varié d'activités sportives pour développer les compétences physiques et l'esprit d'équipe.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Équipe -->
    <section id="equipe" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-green-600 mb-12">Notre Équipe Pédagogique</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="teacher-card bg-white rounded-lg shadow-md overflow-hidden transition duration-500 ease-in-out">
                    <img src="/images/enseignant/pp_RAISSA.jpg" alt="Directrice" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Mme WOKMENI Raissa</h3>
                        <p class="text-green-600 mb-2">Directrice</p>
                        <p class="text-gray-600">Diplômée en Sciences de l'Éducation avec plus de 20 ans d'expérience dans l'enseignement primaire.</p>
                    </div>
                </div>
                <div class="teacher-card bg-white rounded-lg shadow-md overflow-hidden transition duration-500 ease-in-out">
                    <img src="/images/enseignant/pp_POUANSI.jpg" alt="Enseignant" class="w-full h-80 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">M. POUANSI Ismael</h3>
                        <p class="text-green-600 mb-2">Maitre du CM2</p>
                        <p class="text-gray-600">Spécialiste des méthodes pédagogiques innovantes pour rendre les mathématiques accessibles à tous.</p>
                    </div>
                </div>
                <div class="teacher-card bg-white rounded-lg shadow-md overflow-hidden transition duration-500 ease-in-out">
                    <img src="/images/enseignant/pp_BRIDGET.jpg" alt="Enseignante" class="w-full h-80 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Mme ATSA Bridget</h3>
                        <p class="text-green-600 mb-2">Maitresse du CP</p>
                        <p class="text-gray-600">Passionnée de littérature jeunesse et experte en techniques d'apprentissage de la lecture.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistiques -->
    <section id="statistiques" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-green-600 mb-12">Nos Performances Académiques</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="stats-card bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-green-600 text-5xl font-bold mb-2">98%</div>
                    <h3 class="text-lg font-semibold mb-2">Taux de réussite</h3>
                    <p class="text-gray-600">Au CEP 2024</p>
                </div>
                <div class="stats-card bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-green-600 text-5xl font-bold mb-2">85%</div>
                    <h3 class="text-lg font-semibold mb-2">Mentions</h3>
                    <p class="text-gray-600">Très Bien et Bien</p>
                </div>
                <div class="stats-card bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-green-600 text-5xl font-bold mb-2">100%</div>
                    <h3 class="text-lg font-semibold mb-2">Admission</h3>
                    <p class="text-gray-600">En 6ème</p>
                </div>
                <div class="stats-card bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-green-600 text-5xl font-bold mb-2">15</div>
                    <h3 class="text-lg font-semibold mb-2">Prix remportés</h3>
                    <p class="text-gray-600">Concours nationaux</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-green-600 mb-12">Contactez-nous</h2>
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4">Informations de contact</h3>
                        <div class="mb-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-green-600 mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Adresse</h4>
                                    <p class="text-gray-600">Rue 1234, Quartier Bastos, Yaoundé, Cameroun</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-phone-alt text-green-600 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Téléphone</h4>
                                    <p class="text-gray-600">+237 6 99 99 99 99</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-green-600 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Email</h4>
                                    <p class="text-gray-600">contact@etoilesavenir.cm</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-green-600 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Heures d'ouverture</h4>
                                    <p class="text-gray-600">Lundi - Vendredi: 7h30 - 17h30</p>
                                    <p class="text-gray-600">Samedi: 8h - 12h</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="font-semibold mb-2">Suivez-nous</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="text-green-600 hover:text-green-800"><i class="fab fa-facebook-f text-2xl"></i></a>
                                <a href="#" class="text-green-600 hover:text-green-800"><i class="fab fa-twitter text-2xl"></i></a>
                                <a href="#" class="text-green-600 hover:text-green-800"><i class="fab fa-instagram text-2xl"></i></a>
                                <a href="#" class="text-green-600 hover:text-green-800"><i class="fab fa-linkedin-in text-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-8">
                    <form class="bg-gray-100 p-6 rounded-lg">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-semibold mb-2">Sujet</label>
                            <input type="text" id="subject" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-300">
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-4">Les Étoiles de l'Avenir</h3>
                    <p class="max-w-xs">École primaire d'excellence à Yaoundé, formant les leaders de demain depuis 2015.</p>
                </div>
                <div class="mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Liens rapides</h4>
                    <ul>
                        <li class="mb-2"><a href="#accueil" class="hover:text-green-300 transition duration-300">Accueil</a></li>
                        <li class="mb-2"><a href="#apropos" class="hover:text-green-300 transition duration-300">À propos</a></li>
                        <li class="mb-2"><a href="#services" class="hover:text-green-300 transition duration-300">Services</a></li>
                        <li class="mb-2"><a href="#equipe" class="hover:text-green-300 transition duration-300">Équipe</a></li>
                        <li><a href="#contact" class="hover:text-green-300 transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                    <p class="mb-4">Abonnez-vous pour recevoir nos actualités.</p>
                    <form class="flex">
                        <input type="email" placeholder="Votre email" class="px-4 py-2 text-gray-800 rounded-l-lg focus:outline-none">
                        <button type="submit" class="bg-green-600 px-4 py-2 rounded-r-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-green-700 mt-8 pt-6 text-center">
                <p>&copy; 2023 Les Étoiles de l'Avenir. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="loginModal" class="login-modal">
        <div class="modal-content bg-white rounded-lg shadow-xl max-w-md mx-auto mt-20 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-green-600">Connexion</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700
</html>
