
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation and submission
            const form = document.getElementById('teacher-form');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Reset messages
                successMessage.classList.add('hidden');
                errorMessage.classList.add('hidden');

                // Get required fields
                const requiredFields = [
                    'lastname', 'firstname', 'birthdate', 'gender',
                    'phone1', 'email', 'address', 'status', 'service_date', 'class_id'
                ];

                let isValid = true;
                let firstInvalidField = null;

                // Validate required fields
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (!field.value.trim()) {
                        isValid = false;
                        if (!firstInvalidField) firstInvalidField = field;

                        // Add error class
                        field.classList.add('border-red-500');
                        field.classList.add('shake');
                        setTimeout(() => {
                            field.classList.remove('shake');
                        }, 500);
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });

                // Validate email format
                const emailField = document.getElementById('email');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailField.value && !emailRegex.test(emailField.value)) {
                    isValid = false;
                    emailField.classList.add('border-red-500');
                    emailField.classList.add('shake');
                    setTimeout(() => {
                        emailField.classList.remove('shake');
                    }, 500);
                    errorText.textContent = "Veuillez entrer une adresse email valide.";
                }

                if (!isValid) {
                    if (!errorText.textContent.includes("email")) {
                        errorText.textContent = "Veuillez remplir tous les champs obligatoires.";
                    }
                    errorMessage.classList.remove('hidden');

                    // Scroll to first invalid field
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return;
                }

                // If form is valid, show success message
                successMessage.classList.remove('hidden');
                form.reset();

                // Scroll to top to see success message
                window.scrollTo({ top: 0, behavior: 'smooth' });

                // Here you would typically send the data to the server
                // For this example, we'll just log it
                const formData = new FormData(form);
                const teacherData = {};
                formData.forEach((value, key) => {
                    teacherData[key] = value;
                });
                console.log('Teacher data to submit:', teacherData);
            });

            // Remove error class when user starts typing in a field
            const requiredFields = [
                'lastname', 'firstname', 'birthdate', 'gender',
                'phone1', 'email', 'address', 'status', 'service_date', 'class_id'
            ];

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.addEventListener('input', function() {
                        if (this.value.trim()) {
                            this.classList.remove('border-red-500');
                        }
                    });
                }
            });
        });

