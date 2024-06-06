<script>
    document.addEventListener('DOMContentLoaded', function () {
        const phoneDisplay = document.getElementById('phone-display');
        const phoneForm = document.getElementById('phone-form');
        const directorNameDisplay = document.getElementById('director-name-display');
        const directorNameForm = document.getElementById('director-name-form');
        const departmentDisplay = document.getElementById('department-display');
        const departmentForm = document.getElementById('department-form');

        function toggleDisplay(displayElement, formElement) {
            displayElement.addEventListener('click', function () {
                if (formElement.style.display === 'none' || formElement.style.display === '') {
                    formElement.style.display = 'block';
                } else {
                    formElement.style.display = 'none';
                }
            });
        }

        function hideFormOnClickOutside(formElement) {
            document.addEventListener('click', function (event) {
                if (!formElement.contains(event.target) && !event.target.matches('svg') && !event.target.closest('svg')) {
                    formElement.style.display = 'none';
                }
            });
        }

        toggleDisplay(phoneDisplay, phoneForm);
        hideFormOnClickOutside(phoneForm);

        toggleDisplay(directorNameDisplay, directorNameForm);
        hideFormOnClickOutside(directorNameForm);

        toggleDisplay(departmentDisplay, departmentForm);
        hideFormOnClickOutside(departmentForm);
    })
</script>
