 // Toggle sidebar
 document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('expanded');
});

// Show options modal based on category
function showOptions(category) {
    const modal = document.getElementById('optionsModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalContent = document.getElementById('modalContent');

    // Set title and content based on category
    let title = '';
    let options = [];

    switch(category) {
        case 'students':
            title = 'Options pour les Élèves';
            options = [
                {icon: 'user-plus', text: 'Inscrire un nouvel élève', color: 'bg-blue-100 text-blue-600'},
                {icon: 'users', text: 'Liste des élèves', color: 'bg-blue-100 text-blue-600'},
                {icon: 'book', text: 'Gestion des classes', color: 'bg-blue-100 text-blue-600'},
                {icon: 'file-alt', text: 'Bulletins scolaires', color: 'bg-blue-100 text-blue-600'},
                {icon: 'calendar-alt', text: 'Emploi du temps', color: 'bg-blue-100 text-blue-600'},
                {icon: 'chart-line', text: 'Statistiques scolaires', color: 'bg-blue-100 text-blue-600'},
            ];
            break;
        case 'teachers':
            title = 'Options pour les Enseignants';
            options = [
                {icon: 'user-plus', text: 'Ajouter un enseignant', color: 'bg-purple-100 text-purple-600'},
                {icon: 'users', text: 'Liste des enseignants', color: 'bg-purple-100 text-purple-600'},
                {icon: 'calendar-alt', text: 'Planning des cours', color: 'bg-purple-100 text-purple-600'},
                {icon: 'chalkboard', text: 'Affectation aux classes', color: 'bg-purple-100 text-purple-600'},
                {icon: 'tasks', text: 'Évaluations à compléter', color: 'bg-purple-100 text-purple-600'},
                {icon: 'file-signature', text: 'Rapports pédagogiques', color: 'bg-purple-100 text-purple-600'},
            ];
            break;
        case 'admin':
            title = 'Options pour le Personnel Administratif';
            options = [
                {icon: 'user-plus', text: 'Ajouter un membre', color: 'bg-green-100 text-green-600'},
                {icon: 'users', text: 'Liste du personnel', color: 'bg-green-100 text-green-600'},
                {icon: 'file-invoice-dollar', text: 'Gestion de la comptabilité', color: 'bg-green-100 text-green-600'},
                {icon: 'envelope', text: 'Communication avec les parents', color: 'bg-green-100 text-green-600'},
                {icon: 'archive', text: 'Gestion des archives', color: 'bg-green-100 text-green-600'},
                {icon: 'building', text: 'Gestion des locaux', color: 'bg-green-100 text-green-600'},
            ];
            break;
        case 'maintenance':
            title = 'Options pour le Personnel d\'Entretien';
            options = [
                {icon: 'user-plus', text: 'Ajouter un membre', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'users', text: 'Liste du personnel', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'calendar-alt', text: 'Planning des équipes', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'clipboard-list', text: 'Tâches à effectuer', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'wrench', text: 'Maintenance des équipements', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'broom', text: 'Nettoyage des locaux', color: 'bg-yellow-100 text-yellow-600'},
            ];
            break;
    }

    modalTitle.textContent = title;

    // Clear previous content
    modalContent.innerHTML = '';

    // Add options to modal
    options.forEach(option => {
        const optionEl = document.createElement('a');
        optionEl.className = `flex items-center p-3 rounded-lg ${option.color} hover:bg-opacity-80 cursor-pointer transition`;
        optionEl.innerHTML = `
            <i class="fas fa-${option.icon} mr-3"></i>
            <span>${option.text}</span>
            <i class="fas fa-chevron-right ml-auto"></i>
        `;

        // Add click handler (in a real app, this would navigate to the specific page)
        optionEl.addEventListener('click', function() {
            alert(`Ouverture de: ${option.text}`);
            closeModal();
        });

        modalContent.appendChild(optionEl);
    });

    // Show modal
    modal.classList.remove('hidden');
}

// Close modal
function closeModal() {
    document.getElementById('optionsModal').classList.add('hidden');
}
