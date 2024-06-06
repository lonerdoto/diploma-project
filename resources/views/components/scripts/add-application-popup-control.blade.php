<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.querySelectorAll('[name="delete"]'),
            editButton = document.querySelectorAll('[name="edit"]'),
            addButton = document.querySelectorAll('[name="add"]'),
            modalTitle = document.querySelector('.modal-title'),
            modal = document.querySelectorAll('.modal'),
            modalDelete = document.getElementById('popup-delete'),
            modalEdit = document.getElementById('popup-edit'),
            modalAdd = document.getElementById('popup-add'),
            inputId = document.querySelector('#user-id'),
            inputIdForDelete = document.querySelector('#input-delete'),
            inputIdForName = document.querySelector('#input-name'),
            hideButtons = document.querySelectorAll('[data-modal-hide]');

        deleteButton.forEach(e => {
            e.addEventListener('click', function (event) {
                event.preventDefault()
                inputIdForDelete.value = e.id
                modalDelete.classList.remove('hidden');
            });
        })

        editButton.forEach(e => {
            e.addEventListener('click', function (event) {
                inputIdForName.value = e.parentNode.parentNode.parentNode.children[0].innerText
                modalTitle.innerText = 'Редактирование типа заявки'
                event.preventDefault()
                inputId.value = event.target.id
                inputIdForDelete.value = e.id
                modalEdit.classList.remove('hidden');
            });
        })

        addButton.forEach(e => {
            e.addEventListener('click', function () {
                modalTitle.innerText = 'Новый тип заявки'
                modalAdd.classList.remove('hidden');
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
