<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - École Primaire de Yaoundé</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #2e7d32;
            --secondary-color: #ffffff;
            --accent-color: #81c784;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(46, 125, 50, 0.85);
            z-index: 0;
        }

        .form-container {
            background-color: var(--secondary-color);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 2.5rem;
            width: 100%;
            max-width: 600px;
            position: relative;
            z-index: 1;
            transform: translateY(0);
            transition: transform 0.3s ease;
            margin: 2rem;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .form-container h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .form-container h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
            border-radius: 3px;
        }

        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
            outline: none;
            background-color: #fff;
        }

        .radio-group {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.5rem;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            color: #555;
            font-weight: normal;
        }

        .radio-group input[type="radio"] {
            width: auto;
            accent-color: var(--primary-color);
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.85rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        button[type="submit"]:hover {
            background-color: #1b5e20;
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #1b5e20;
            text-decoration: underline;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .form-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-header img {
            height: 80px;
            margin-bottom: 1rem;
        }

        .password-strength {
            height: 4px;
            background-color: #eee;
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            background-color: #ff5252;
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .password-hint {
            font-size: 0.75rem;
            color: #666;
            margin-top: 0.25rem;
            display: none;
        }

        @media (max-width: 640px) {
            .form-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .radio-group {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <img src="https://via.placeholder.com/80x80?text=Logo+École" alt="Logo École Primaire de Yaoundé" class="school-logo">
            <h2>Inscription à l'École Primaire de Yaoundé</h2>
            <p class="text-gray-600">Remplissez le formulaire pour créer votre compte</p>
        </div>

        <form id="registrationForm">
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
                    <input type="text" id="prenom" name="prenom" required placeholder="Votre prénom">
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="dateNaissance"><i class="fas fa-calendar-alt mr-1"></i> Date de naissance</label>
                <input type="date" id="dateNaissance" name="dateNaissance" required>
            </div>

            <div class="form-group">
                <label><i class="fas fa-venus-mars mr-1"></i> Sexe</label>
                <div class="radio-group">
                    <label><input type="radio" name="sexe" value="Homme" required> <i class="fas fa-male"></i> Homme</label>
                    <label><input type="radio" name="sexe" value="Femme"> <i class="fas fa-female"></i> Femme</label>
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
                    <option value="parent">Parent d'élève</option>
                    <option value="enseignant">Enseignant</option>
                    <option value="administratif">Personnel administratif</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="adresse"><i class="fas fa-map-marker-alt mr-1"></i> Adresse</label>
                <input type="text" id="adresse" name="adresse" required placeholder="Votre adresse complète">
                <div class="input-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="dateService"><i class="fas fa-calendar-check mr-1"></i> Date d'inscription</label>
                <input type="date" id="dateService" name="dateService" required>
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
                <input type="password" id="motdepasse" name="motdepasse" required placeholder="Créez un mot de passe sécurisé">
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
                <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Confirmez votre mot de passe">
                <div class="input-icon toggle-confirm-password" style="cursor: pointer;">
                    <i class="fas fa-eye"></i>
                </div>
                <div id="passwordMatchMessage" class="text-xs mt-1"></div>
            </div>

            <div class="form-group">
                <label for="profil"><i class="fas fa-camera mr-1"></i> Photo de profil (optionnel)</label>
                <div class="flex items-center">
                    <label for="profil" class="cursor-pointer bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg border border-gray-300 transition-colors duration-200">
                        <i class="fas fa-upload mr-2"></i> Choisir un fichier
                    </label>
                    <span id="fileName" class="ml-2 text-sm text-gray-500">Aucun fichier sélectionné</span>
                    <input type="file" id="profil" name="profil" accept="image/*" class="hidden">
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
            Vous avez déjà un compte ? <a href="#" class="font-semibold">Connectez-vous ici</a>
        </p>
    </div>

    <script>
        // Toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('motdepasse');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Toggle confirm password visibility
        document.querySelector('.toggle-confirm-password').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const icon = this.querySelector('i');

            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Password strength indicator
        document.getElementById('motdepasse').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            const passwordHint = document.getElementById('passwordHint');

            // Reset
            strengthBar.style.width = '0%';
            strengthBar.style.backgroundColor = '#ff5252';

            if (password.length > 0) {
                passwordHint.style.display = 'block';

                // Calculate strength
                let strength = 0;

                // Length
                if (password.length >= 8) strength += 25;
                if (password.length >= 12) strength += 15;

                // Contains numbers
                if (/\d/.test(password)) strength += 20;

                // Contains lowercase and uppercase
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 20;

                // Contains special chars
                if (/[^a-zA-Z0-9]/.test(password)) strength += 20;

                // Update strength bar
                strengthBar.style.width = strength + '%';

                // Change color based on strength
                if (strength > 60) {
                    strengthBar.style.backgroundColor = '#ffc107'; // Yellow
                }
                if (strength > 80) {
                    strengthBar.style.backgroundColor = '#4caf50'; // Green
                }
            } else {
                passwordHint.style.display = 'none';
            }
        });

        // Check password match
        document.getElementById('confirmPassword').addEventListener('input', function() {
            const password = document.getElementById('motdepasse').value;
            const confirmPassword = this.value;
            const messageElement = document.getElementById('passwordMatchMessage');

            if (confirmPassword.length === 0) {
                messageElement.textContent = '';
                messageElement.className = 'text-xs mt-1';
            } else if (password !== confirmPassword) {
                messageElement.textContent = 'Les mots de passe ne correspondent pas';
                messageElement.className = 'text-xs mt-1 text-red-500';
            } else {
                messageElement.textContent = 'Les mots de passe correspondent';
                messageElement.className = 'text-xs mt-1 text-green-500';
            }
        });

        // Show selected file name
        document.getElementById('profil').addEventListener('change', function() {
            const fileNameElement = document.getElementById('fileName');
            if (this.files.length > 0) {
                fileNameElement.textContent = this.files[0].name;
            } else {
                fileNameElement.textContent = 'Aucun fichier sélectionné';
            }
        });

        // Form submission
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validate password match
            const password = document.getElementById('motdepasse').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Les mots de passe ne correspondent pas');
                return;
            }

            // Validate terms checkbox
            if (!document.getElementById('terms').checked) {
                alert('Veuillez accepter les conditions d\'utilisation');
                return;
            }

            // If all validations pass, show success message
            alert('Inscription réussie ! Un email de confirmation a été envoyé.');
            this.reset();
            document.getElementById('fileName').textContent = 'Aucun fichier sélectionné';
            document.getElementById('passwordStrengthBar').style.width = '0%';
            document.getElementById('passwordMatchMessage').textContent = '';
        });
    </script>
</body>
</html>
