<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);

        document.querySelectorAll('.custom-select').forEach(function(customSelect) {
            const trigger = customSelect.querySelector('.custom-select-trigger');
            const options = customSelect.querySelectorAll('.custom-option');

            const hiddenInputValue = customSelect.querySelector('input:not([name$="id"])');
            const hiddenInputId = customSelect.querySelector('input[name$="id"]');

            const paramNameValue = hiddenInputValue.getAttribute('name');
            const paramValue = urlParams.get(paramNameValue);

            const selectedOption = paramValue;

            options.forEach(option => {
                if (option.getAttribute('data-value') === selectedOption) {
                    option.classList.add('selected');
                    trigger.textContent = option.textContent;
                    hiddenInputValue.value = option.getAttribute('data-value');
                    hiddenInputId.value = option.id;
                }
            });

            trigger.addEventListener('click', function () {
                customSelect.classList.toggle('open');
            });

            options.forEach(option => {
                option.addEventListener('click', function () {
                    options.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    trigger.textContent = this.textContent;
                    hiddenInputValue.value = this.getAttribute('data-value');
                    hiddenInputId.value = this.id;
                    customSelect.classList.remove('open');
                });
            });

            document.addEventListener('click', function (e) {
                if (!customSelect.contains(e.target)) {
                    customSelect.classList.remove('open');
                }
            });
        });
    });
</script>
