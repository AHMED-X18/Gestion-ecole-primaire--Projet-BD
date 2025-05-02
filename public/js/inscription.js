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
document.getElementById('form').addEventListener('submit', function(e) {
    // Validate password match
    const password = document.getElementById('motdepasse').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        e.preventDefault();
        alert('Les mots de passe ne correspondent pas');
        return false;
    }

    // Validate terms checkbox
    if (!document.getElementById('terms').checked) {
        e.preventDefault();
        alert('Veuillez accepter les conditions d\'utilisation');
        return false;
    }

    // Si toutes les validations passent, le formulaire se soumettra normalement
    // Vous pouvez ajouter ici d'autres validations si nécessaire
    return true;
});