  // Fonction de recherche
  document.getElementById('searchInput').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const personnelCards = document.querySelectorAll('.personnel-card');

    personnelCards.forEach(card => {
        const name = card.querySelector('h3').textContent.toLowerCase();
        const posteSection = card.closest('.poste-section');

        if (name.includes(searchTerm)) {
            card.style.display = 'block';
            posteSection.style.display = 'block';
        } else {
            card.style.display = 'none';

            // Masquer la section si aucun résultat n'est trouvé
            const visibleCards = posteSection.querySelectorAll('.personnel-card[style="display: block"]');
            if (visibleCards.length === 0) {
                posteSection.style.display = 'none';
            }
        }
    });
});

// Simulation de chargement des données
document.addEventListener('DOMContentLoaded', function() {
    // Ici vous pourriez faire un appel API pour récupérer les données réelles
    // Pour l'exemple, nous utilisons des données statiques

    // Vous pourriez ajouter ici un indicateur de chargement
    // const loadingIndicator = document.createElement('div');
    // loadingIndicator.className = 'text-center py-8';
    // loadingIndicator.innerHTML = '<i class="fas fa-spinner fa-spin text-2xl text-blue-500"></i><p class="mt-2">Chargement des données...</p>';
    // document.getElementById('personnelContainer').appendChild(loadingIndicator);

    // Puis après le chargement des données, vous remplaceriez le contenu
    // setTimeout(() => {
    //     loadingIndicator.remove();
    //     // Ajouter les données dynamiquement
    // }, 1500);
});
