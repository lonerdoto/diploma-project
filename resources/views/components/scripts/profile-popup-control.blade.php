<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.querySelectorAll('[name="delete"]');
        const modal = document.querySelectorAll('.modal');
        const modalDelete = document.getElementById('popup-delete');
        const hideButtons = document.querySelectorAll('[data-modal-hide]');

        deleteButton.forEach(e => {
            e.addEventListener('click', function (event) {
                modalDelete.classList.remove('hidden');
            });
        })

        hideButtons.forEach(button => {
            button.addEventListener('click', function () {
                modal.forEach(e => {
                    e.classList.add('hidden')
                });
            });
        });
        modal.forEach(e => {
            e.addEventListener('mousedown', function (event) {
                if (event.target === e) {
                    e.classList.add('hidden')
                }
            });
        })
    });
</script>
