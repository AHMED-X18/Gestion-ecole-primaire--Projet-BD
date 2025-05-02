<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - École Les Étoiles de l'Avenir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <img src="https://via.placeholder.com/80x80?text=Logo+École" alt="Logo École Primaire de Yaoundé" class="school-logo">
            <h2>Inscription à l'École Les Étoiles de l'Avenir</h2>
            <p class="text-gray-600">Remplissez le formulaire pour créer votre compte</p>
        </div>

        <form id="form" action ="{{route("store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="nom"><i class="fas fa-user mr-1"></i> Nom</label>
                    <input type="text" id="nom" name="nom" required placeholder="Votre nom">
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="prenom"><i class="fas fa-user mr-1"></i> Prénom</label>
                    <input type="text" id="prenom" name="prénom" required placeholder="Votre prénom">
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="dateNaissance"><i class="fas fa-calendar-alt mr-1"></i> Date de naissance</label>
                <input type="date" id="dateNaissance" name="date_naissance" required>
            </div>

            <div class="form-group">
                <label><i class="fas fa-venus-mars mr-1"></i> Sexe</label>
                <div class="radio-group">
                    <label><input type="radio" name="sexe" value="Homme" required> <i class="fas fa-male"></i> Homme</label>
                    <label><input type="radio" name="sexe" value="Femme" required> <i class="fas fa-female"></i> Femme</label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="tel1"><i class="fas fa-phone mr-1"></i> Téléphone 1</label>
                    <input type="tel" id="tel1" name="tel1" required placeholder="6XX XXX XXX">
                    <div class="input-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tel2"><i class="fas fa-phone-alt mr-1"></i> Téléphone 2 (optionnel)</label>
                    <input type="tel" id="tel2" name="tel2" placeholder="6XX XXX XXX">
                    <div class="input-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="statut"><i class="fas fa-user-tag mr-1"></i> Statut</label>
                <select id="statut" name="statut" required>
                    <option value="">--Choisir votre statut--</option>
                    <option value="Directeur">Directeur</option>
                    <option value="Secretaire">Secretaire</option>
                    <option value="Tresorier">Tresorier</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="adresse"><i class="fas fa-map-marker-alt mr-1"></i> Addresse</label>
                <input type="text" id="adresse" name="addresse" required placeholder="Votre adresse complète">
                <div class="input-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="dateService"><i class="fas fa-calendar-check mr-1"></i> Date de prise de service</label>
                <input type="date" id="dateService" name="date_service" required>
            </div>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope mr-1"></i> Email</label>
                <input type="email" id="email" name="email" required placeholder="votre@email.com">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="motdepasse"><i class="fas fa-lock mr-1"></i> Mot de passe</label>
                <input type="password" id="motdepasse" name="password" required placeholder="Créez un mot de passe sécurisé">
                <div class="input-icon toggle-password" style="cursor: pointer;">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="password-strength">
                    <div class="password-strength-bar" id="passwordStrengthBar"></div>
                </div>
                <div class="password-hint" id="passwordHint">
                    Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.
                </div>
            </div>

            <div class="form-group">
                <label for="confirmPassword"><i class="fas fa-lock mr-1"></i> Confirmer le mot de passe</label>
                <input type="password" id="confirmPassword" name="password_confirmation" required placeholder="Confirmez votre mot de passe">
                <div class="input-icon toggle-confirm-password" style="cursor: pointer;">
                    <i class="fas fa-eye"></i>
                </div>
                <div id="passwordMatchMessage" class="text-xs mt-1"></div>
            </div>

            <div class="form-group">
                <label for="profil"><i class="fas fa-camera mr-1"></i> Photo de profil</label>
                <div class="flex items-center">
                    <label for="profil" class="cursor-pointer bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg border border-gray-300 transition-colors duration-200">
                        <i class="fas fa-upload mr-2"></i> Choisir un fichier
                    </label>
                    <span id="fileName" class="ml-2 text-sm text-gray-500">Aucun fichier sélectionné</span>
                    <input type="file" id="profil" name="profil" accept="image/*" class="hidden" required>
                </div>
            </div>

            <div class="form-group flex items-start">
                <input type="checkbox" id="terms" name="terms" required class="mt-1 mr-2">
                <label for="terms" class="text-sm">J'accepte les <a href="#" class="text-green-600 hover:underline">conditions d'utilisation</a> et la <a href="#" class="text-green-600 hover:underline">politique de confidentialité</a> de l'école</label>
            </div>

            <button type="submit">
                <i class="fas fa-user-plus mr-2"></i> S'inscrire
            </button>
        </form>

        <p class="login-link">
            Vous avez déjà un compte ? <a href="{{ route('login') }}" class="font-semibold">Connectez-vous ici</a>
        </p>
    </div>

    <script src="{{ asset('js/inscription.js') }}"></script>
</body>
</html>
