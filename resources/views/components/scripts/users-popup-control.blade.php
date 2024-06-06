<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.querySelectorAll('[name="delete"]');
        const editButton = document.querySelectorAll('[name="edit"]');
        const addButton = document.querySelectorAll('[name="add"]');
        const modalTitle = document.querySelector('.modal-title')

        const modal = document.querySelectorAll('.modal');
        const modalDelete = document.getElementById('popup-delete');
        const modalEdit = document.getElementById('popup-edit');
        const modalAdd = document.getElementById('popup-add');

        const usernameTitle = document.querySelector('.user-name')
        const inputId = document.querySelector('#user-id')
        const inputIdForDelete = document.querySelector('#input-delete')
        const inputIdForName = document.querySelector('#input-name')
        const selectIdForRole = document.querySelector('#select-role')
        const selectIdForDepartment = document.querySelector('#input-department')
        const selectIdForPhone = document.querySelector('#input-phone')
        const selectIdForDirectorName = document.querySelector('#input-director-name')
        const hideButtons = document.querySelectorAll('[data-modal-hide]');

        deleteButton.forEach(e => {
            e.addEventListener('click', function (event) {
                event.preventDefault()
                inputIdForDelete.value = e.id
                modalDelete.classList.remove('hidden');
            });
        })

        editButton.forEach(e => {
            e.addEventListener('click', function (event) {
                const username = e.parentNode.parentNode.parentNode.children[0].children[0].children[1].children[0].innerText, // Username
                    // email = e.parentNode.parentNode.parentNode.children[0].children[1].children[1].innerText // Email
                    department = e.parentNode.parentNode.parentNode.children[1].innerText,
                    userId = event.target.id,// User Id
                    role = e.parentNode.parentNode.parentNode.children[2].id, // Role
                    phone = e.parentNode.parentNode.parentNode.children[3].innerText, // Phone
                    directorName = e.parentNode.parentNode.parentNode.children[4].innerText // Director Name

                usernameTitle.innerText = username
                inputId.value = userId
                inputIdForName.value = username
                for (let i of selectIdForRole) {
                    if (i.getAttribute('name') === role) {
                        i.selected = true
                    }
                }
                selectIdForDepartment.value = department
                selectIdForPhone.value = phone
                selectIdForDirectorName.value = directorName

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
