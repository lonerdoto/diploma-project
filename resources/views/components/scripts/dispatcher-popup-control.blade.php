<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.querySelectorAll('[name="delete"]');
        const editButton = document.querySelectorAll('[name="edit"]');
        const addButton = document.querySelectorAll('[name="add"]');

        const modal = document.querySelectorAll('.modal');
        const modalDelete = document.getElementById('popup-delete');
        const modalEdit = document.getElementById('popup-edit');
        const modalAdd = document.getElementById('popup-add');

        const descriptionText = document.querySelectorAll('#description');
        const descriptionPopupText = document.getElementById('description-text');
        const descriptionTextArea = document.getElementById('textarea-description');
        const modalDescription = document.getElementById('popup-description');


        const inputIdForEdit = document.querySelector('#user-id')
        const inputIdForDelete= document.querySelector('#input-delete')

        const customSelect = document.getElementById('select-status');
        const hideButtons = document.querySelectorAll('[data-modal-hide]');

        descriptionText.forEach(e => {
            e.addEventListener('click', function (event) {
                descriptionPopupText.innerText = event.target.innerText
                modalDescription.classList.remove('hidden');
            });
        })

        deleteButton.forEach(e => {
            e.addEventListener('click', function (event) {
                event.preventDefault()
                inputIdForDelete.value = e.id
                modalDelete.classList.remove('hidden');
            });
        })

        editButton.forEach(e => {
            e.addEventListener('click', function (event) {
                let fields = [];
                let i = -1;
                const target = e.parentNode.parentNode.parentNode
                for (let j = 2; j < 10; j++) {
                    fields.push(target.children[j].innerText)
                }
                const status = target.children[10].innerText

                document.querySelectorAll('input').forEach(e => {
                    if (e.getAttribute('data-bs-for') === "edit") {
                        i++
                        e.value = fields[i]
                    }
                })
                for (let i of customSelect) {
                    if (i.getAttribute('name') === status) {
                        i.selected = true
                    }
                }
                event.preventDefault()
                inputIdForEdit.value = event.target.id
                modalEdit.classList.remove('hidden');
            });
        })

        addButton.forEach(e => {
            e.addEventListener('click', function () {
                modalAdd.classList.remove('hidden');
            });
        })

        hideButtons.forEach(button => {
            button.addEventListener('click', function () {
                modal.forEach(e => {
                    e.classList.add('hidden')
                    saveScrollPosition();
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
