// Preview de l'image uploadée
document.getElementById('profil').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('preview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Gestion du formulaire
document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Validation simple
    const requiredFields = ['matricule', 'nom', 'prenom', 'date_naissance', 'sexe', 'statut', 'nom_tuteur', 'tel1_tuteur', 'adresse', 'id_classe'];
    let isValid = true;

    requiredFields.forEach(field => {
        const element = document.getElementById(field) || document.querySelector(`input[name="${field}"]:checked`);
        if (!element || !element.value) {
            isValid = false;
            element.classList.add('border-red-500');
        } else {
            element.classList.remove('border-red-500');
        }
    });

    if (!isValid) {
        alert('Veuillez remplir tous les champs obligatoires marqués d\'un *');
        return;
    }

    // Ici, vous pourriez envoyer les données au serveur
    alert('Formulaire soumis avec succès!');
    // this.reset();
});