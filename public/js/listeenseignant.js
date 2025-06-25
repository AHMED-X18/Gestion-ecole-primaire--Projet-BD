
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    const teacherItems = document.querySelectorAll('#teachers-list > div');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        teacherItems.forEach(item => {
            const teacherName = item.querySelector('h4').textContent.toLowerCase();
            if (teacherName.includes(searchTerm)) {
                item.style.display = 'grid';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Filter by level
    const levelFilter = document.querySelector('select');
    levelFilter.addEventListener('change', function() {
        const selectedLevel = this.value;

        teacherItems.forEach(item => {
            const levels = item.querySelectorAll('.specialty-chip');
            let hasLevel = false;

            if (selectedLevel === 'Tous les niveaux') {
                item.style.display = 'grid';
                return;
            }

            levels.forEach(level => {
                if (level.textContent === selectedLevel) {
                    hasLevel = true;
                }
            });

            item.style.display = hasLevel ? 'grid' : 'none';
        });
    });

    // Animation for teacher cards
    teacherItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });
});
