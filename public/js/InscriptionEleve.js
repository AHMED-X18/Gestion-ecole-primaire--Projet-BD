// Preview de l'image
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

// Validation avant soumission
document.getElementById('registrationForm').addEventListener('submit', function(e) {
    // Validation
    const requiredFields = {
        'nom': 'input',
        'prenom': 'input', 
        'date_naissance': 'input',
        'sexe': 'radio',
        'statut': 'select',
        'nom_tuteur': 'input',
        'tel1_tuteur': 'input',
        'adresse': 'input',
        'id_classe': 'select',
        'terms': 'checkbox'
    };

    let isValid = true;

    for (const [field, type] of Object.entries(requiredFields)) {
        let element;
        switch(type) {
            case 'radio':
                element = document.querySelector(`input[name="${field}"]:checked`);
                break;
            case 'checkbox':
                element = document.getElementById(field);
                isValid = element.checked && isValid;
                break;
            default:
                element = document.getElementById(field);
        }

        if ((!element || !element.value) && type !== 'checkbox') {
            isValid = false;
            element?.classList.add('border-red-500');
        }
    }

    if (!isValid) {
        e.preventDefault();
        alert('Veuillez remplir tous les champs obligatoires');
    }
    
    // Si validé, le formulaire se soumet normalement
});