document.addEventListener('DOMContentLoaded', function() {
    // Variables
    let currentDate = new Date();
    let selectedDate = null;
    let events = {}; // Objet pour stocker les événements par date (clé: dateKey, valeur: tableau d'événements)

    // Éléments DOM
    const monthYearElement = document.getElementById('month-year');
    const calendarDaysElement = document.getElementById('calendar-days');
    const prevMonthButton = document.getElementById('prev-month');
    const nextMonthButton = document.getElementById('next-month');
    const todayButton = document.getElementById('today-btn');
    const selectedInfoElement = document.getElementById('selected-info');
    const selectedDateTextElement = document.getElementById('selected-date-text');
    const clearSelectionButton = document.getElementById('clear-selection');
    const addEventButton = document.getElementById('add-event');
    const eventModal = document.getElementById('event-modal');
    const closeModalButton = document.getElementById('close-modal');
    const cancelEventButton = document.getElementById('cancel-event');
    const saveEventButton = document.getElementById('save-event');
    const eventDateInput = document.getElementById('event-date');
    const eventTitleInput = document.getElementById('event-title');
    const eventDescriptionInput = document.getElementById('event-description');

    // Initialisation
    renderCalendar();

    // Événements
    prevMonthButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    todayButton.addEventListener('click', () => {
        currentDate = new Date();
        renderCalendar();
    });

    clearSelectionButton.addEventListener('click', clearSelection);

    addEventButton.addEventListener('click', openEventModal);

    closeModalButton.addEventListener('click', closeEventModal);

    cancelEventButton.addEventListener('click', closeEventModal);

    saveEventButton.addEventListener('click', saveEvent);

    // Fonctions
    function renderCalendar() {
        // Mettre à jour le titre du mois/année
        const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                            "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        monthYearElement.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

        // Calculer les jours à afficher
        const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        const daysInMonth = lastDayOfMonth.getDate();
        const startingDayOfWeek = firstDayOfMonth.getDay(); // 0 (dimanche) à 6 (samedi)

        // Calculer les jours du mois précédent à afficher
        const prevMonthLastDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();
        const prevMonthDaysToShow = startingDayOfWeek;

        // Calculer les jours du mois suivant à afficher
        const totalCalendarDays = 42; // 6 semaines
        const nextMonthDaysToShow = totalCalendarDays - (daysInMonth + prevMonthDaysToShow);

        // Générer le HTML du calendrier
        let calendarHTML = '';

        // Jours du mois précédent
        for (let i = prevMonthDaysToShow; i > 0; i--) {
            const day = prevMonthLastDay - i + 1;
            calendarHTML += `
                <div class="calendar-day other-month bg-gray-100 rounded-lg p-2 text-center text-gray-400">
                    ${day}
                </div>
            `;
        }

        // Jours du mois courant
        const today = new Date();
        for (let i = 1; i <= daysInMonth; i++) {
            const date = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
            const isToday = date.toDateString() === today.toDateString();
            const isSelected = selectedDate && date.toDateString() === selectedDate.toDateString();
            const dateKey = formatDateKey(date);
            const hasEvent = events[dateKey] && events[dateKey].length > 0;

            calendarHTML += `
                <div class="calendar-day ${isToday ? 'today' : 'bg-white hover:bg-blue-50'}
                    ${isSelected ? 'selected-day' : ''} rounded-lg p-2 text-center cursor-pointer transition"
                    data-date="${dateKey}">
                    <div class="font-medium">${i}</div>
                    ${hasEvent ? '<div class="h-1 w-1 bg-blue-500 rounded-full mx-auto mt-1"></div>' : ''}
                </div>
            `;
        }

        // Jours du mois suivant
        for (let i = 1; i <= nextMonthDaysToShow; i++) {
            calendarHTML += `
                <div class="calendar-day other-month bg-gray-100 rounded-lg p-2 text-center text-gray-400">
                    ${i}
                </div>
            `;
        }

        calendarDaysElement.innerHTML = calendarHTML;

        // Ajouter les événements aux jours
        document.querySelectorAll('.calendar-day[data-date]').forEach(dayElement => {
            dayElement.addEventListener('click', () => {
                const dateKey = dayElement.getAttribute('data-date');
                selectDate(dateKey);
            });
        });
    }

    function selectDate(dateKey) {
        const [year, month, day] = dateKey.split('-').map(Number);
        selectedDate = new Date(year, month - 1, day);

        // Mettre à jour l'affichage
        document.querySelectorAll('.calendar-day').forEach(day => {
            day.classList.remove('selected-day');
        });

        const selectedDayElement = document.querySelector(`.calendar-day[data-date="${dateKey}"]`);
        if (selectedDayElement) {
            selectedDayElement.classList.add('selected-day');
        }

        // Afficher les infos de la date sélectionnée
        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        selectedDateTextElement.textContent = selectedDate.toLocaleDateString('fr-FR', dateOptions);
        selectedInfoElement.classList.remove('hidden');

        // Faire défiler pour voir la sélection si nécessaire
        selectedDayElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

        // Afficher les événements existants pour cette date
        displayEvents(dateKey);
    }

    function clearSelection() {
        selectedDate = null;
        selectedInfoElement.classList.add('hidden');
        document.querySelectorAll('.calendar-day').forEach(day => {
            day.classList.remove('selected-day');
        });
    }

    function openEventModal() {
        if (!selectedDate) return;

        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        eventDateInput.value = selectedDate.toLocaleDateString('fr-FR', dateOptions);
        eventTitleInput.value = '';
        eventDescriptionInput.value = '';

        eventModal.classList.remove('hidden');
    }

    function closeEventModal() {
        eventModal.classList.add('hidden');
    }

    function saveEvent() {
        const title = eventTitleInput.value.trim();
        const description = eventDescriptionInput.value.trim();

        if (!title) {
            alert("Veuillez entrer un titre pour l'événement");
            return;
        }

        const dateKey = formatDateKey(selectedDate);

        if (!events[dateKey]) {
            events[dateKey] = [];
        }

        events[dateKey].push({
            title,
            description,
            createdAt: new Date()
        });

        closeEventModal();
        renderCalendar();
        selectDate(dateKey); // Re-sélectionner la date pour afficher les événements

        // Afficher une notification
        alert("Événement enregistré avec succès!");
    }

    function displayEvents(dateKey) {
        // Ajouter une logique pour afficher les événements dans selectedInfoElement si besoin
        const eventsForDate = events[dateKey] || [];
        // Vous pourriez ajouter une liste d'événements ici, par exemple :
        // selectedInfoElement.innerHTML += `<p>Événements : ${eventsForDate.map(e => e.title).join(', ')}</p>`;
    }

    function formatDateKey(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
});
