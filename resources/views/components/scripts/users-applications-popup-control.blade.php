<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.querySelectorAll('[name="delete"]');
        const editButton = document.querySelectorAll('[name="edit"]');
        const addButton = document.querySelectorAll('[name="add"]');
        const modalTitle = document.querySelector('.modal-title')
        const descriptionText = document.querySelectorAll('#description');
        const descriptionPopupText = document.getElementById('description-text');
        const descriptionTextArea = document.getElementById('textarea-description');


        const modal = document.querySelectorAll('.modal');
        const modalDelete = document.getElementById('popup-delete');
        const modalEdit = document.getElementById('popup-edit');
        const modalAdd = document.getElementById('popup-add');
        const modalDescription = document.getElementById('popup-description');

        const applicationIdInput = document.querySelector('#application-id');
        const inputIdForDelete = document.querySelector('#input-delete');
        const selectStatus = document.querySelector('#select-status');
        const hideButtons = document.querySelectorAll('[data-modal-hide]');

        deleteButton.forEach(e => {
            e.addEventListener('click', function (event) {
                event.preventDefault()
                inputIdForDelete.value = e.id
                modalDelete.classList.remove('hidden');
            });
        })
        descriptionText.forEach(e => {
            e.addEventListener('click', function (event) {
                descriptionPopupText.innerText = event.target.innerText
                modalDescription.classList.remove('hidden');
            });
        })

        editButton.forEach(e => {
            e.addEventListener('click', function (event) {
                const status = e.parentNode.parentNode.parentNode.children[5].innerText,
                    description = e.parentNode.parentNode.parentNode.children[3].innerText

                for (let i of selectStatus) {
                    if (i.getAttribute('name') === status) {
                        i.selected = true
                    }
                }
                descriptionTextArea.value = description
                applicationIdInput.value = event.target.id
                event.preventDefault()
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
