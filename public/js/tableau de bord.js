function showOptions(category) {
    const modal = document.getElementById('optionsModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalContent = document.getElementById('modalContent');

    let title = '';
    let options = [];

    switch(category) {
        case 'students':
            title = 'Options pour les Élèves';
            options = [
                {icon: 'user-plus', text: 'Inscrire un nouvel élève', routeKey: 'create', color: 'bg-blue-100 text-blue-600'},
                {icon: 'users', text: 'Liste des élèves', routeKey: 'list', color: 'bg-blue-100 text-blue-600'},
                {icon: 'book', text: 'Gestion des classes', routeKey: 'classes', color: 'bg-blue-100 text-blue-600'},
                {icon: 'file-alt', text: 'Bulletins scolaires', routeKey: 'bulletins', color: 'bg-blue-100 text-blue-600'},
                {icon: 'calendar-alt', text: 'Emploi du temps', routeKey: 'schedule', color: 'bg-blue-100 text-blue-600'},
                {icon: 'chart-line', text: 'Statistiques scolaires', routeKey: 'stats', color: 'bg-blue-100 text-blue-600'},
            ];
            break;
        case 'teachers':
            title = 'Options pour les Enseignants';
            options = [
                {icon: 'user-plus', text: 'Ajouter un enseignant', routeKey: 'create', color: 'bg-purple-100 text-purple-600'},
                {icon: 'users', text: 'Liste des enseignants', routeKey: 'list', color: 'bg-purple-100 text-purple-600'},
                {icon: 'calendar-alt', text: 'Planning des cours', routeKey: 'schedule', color: 'bg-purple-100 text-purple-600'},
                {icon: 'chalkboard', text: 'Affectation aux classes', routeKey: 'classes', color: 'bg-purple-100 text-purple-600'},
                {icon: 'tasks', text: 'Évaluations à compléter', routeKey: 'evaluations', color: 'bg-purple-100 text-purple-600'},
                {icon: 'file-signature', text: 'Rapports pédagogiques', routeKey: 'reports', color: 'bg-purple-100 text-purple-600'},
            ];
            break;
        case 'admin':
            title = 'Options pour le Personnel Administratif';
            options = [
                {icon: 'user-plus', text: 'Ajouter un membre', routeKey: 'create', color: 'bg-green-100 text-green-600'},
                {icon: 'users', text: 'Liste du personnel', routeKey: 'list', color: 'bg-green-100 text-green-600'},
                {icon: 'file-invoice-dollar', text: 'Gestion de la comptabilité', routeKey: 'accounting', color: 'bg-green-100 text-green-600'},
                {icon: 'envelope', text: 'Communication avec les parents', routeKey: 'communication', color: 'bg-green-100 text-green-600'},
                {icon: 'archive', text: 'Gestion des archives', routeKey: 'archives', color: 'bg-green-100 text-green-600'},
                {icon: 'building', text: 'Gestion des locaux', routeKey: 'facilities', color: 'bg-green-100 text-green-600'},
            ];
            break;
        case 'maintenance':
            title = 'Options pour le Personnel d\'Entretien';
            options = [
                {icon: 'user-plus', text: 'Ajouter un membre', routeKey: 'create', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'users', text: 'Liste du personnel', routeKey: 'list', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'calendar-alt', text: 'Planning des équipes', routeKey: 'schedule', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'clipboard-list', text: 'Tâches à effectuer', routeKey: 'tasks', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'wrench', text: 'Maintenance des équipements', routeKey: 'equipment', color: 'bg-yellow-100 text-yellow-600'},
                {icon: 'broom', text: 'Nettoyage des locaux', routeKey: 'cleaning', color: 'bg-yellow-100 text-yellow-600'},
            ];
            break;
    }

    modalTitle.textContent = title;
    modalContent.innerHTML = '';

    options.forEach(option => {
        const optionEl = document.createElement('a');
        optionEl.className = `flex items-center p-3 rounded-lg ${option.color} hover:bg-opacity-80 cursor-pointer transition`;
        optionEl.href = appRoutes[category][option.routeKey]; // Utilisation de la route
        optionEl.innerHTML = `
            <i class="fas fa-${option.icon} mr-3"></i>
            <span>${option.text}</span>
            <i class="fas fa-chevron-right ml-auto"></i>
        `;
        modalContent.appendChild(optionEl);
    });

    modal.classList.remove('hidden');
}