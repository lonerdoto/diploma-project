<script>
    const form = document.querySelector('.form-control')
    const formTitle = document.querySelector('.form-header').innerText
    const body = document.querySelector('body')
    const nameInput = document.querySelector('input[name="name"]');


    const createLInvalidLabel = () => {
        let newElement = document.createElement('label')
        newElement.innerText =  "Только кириллица и пробел"
        newElement.htmlFor = "name"
        newElement.classList.add('error-label')

        document.getElementsByName(`name`)[0].classList.add('is-invalid')
        document.getElementsByName(`name`)[0].insertAdjacentElement('afterend', newElement);
    }
    const showInvalid = (response) => {
        if(response === 'name') {
            createLInvalidLabel()
        } else {
            if (response.success !== "Не удалось войти") {
                const inputs = document.querySelectorAll('input')
                const customInput = document.querySelector('.custom-select-trigger')
                const labels = document.querySelectorAll('label')
                inputs.forEach(e => {
                    e.classList.remove('is-invalid')
                })
                if(customInput !== null) {
                    customInput.classList.remove('is-invalid')
                }
                labels.forEach(e => {
                    if (e.getAttribute('name') !== 'file-label') {
                        e.remove()
                    }
                })
                response = Object.entries(response.errors)
                response.forEach(e => {
                    let newElement = document.createElement('label')
                    newElement.innerText =  e[1][0]
                    newElement.htmlFor = e[0]
                    newElement.classList.add('error-label')
                    if(e[0] === 'files.0' || e[0] === 'files') {
                        document.getElementsByName('file-input')[0].classList.add('is-invalid')
                        newElement.id = 'files-input'
                        document.getElementsByName('file-input')[0].insertAdjacentElement('afterend', newElement);
                    }
                    if(e[0] !== 'files') {
                        if(document.getElementsByName(`${e[0]}`)[0].getAttribute('name') === 'type') {
                            document.querySelector('.custom-select-trigger').classList.add('is-invalid')
                        }
                        document.getElementsByName(`${e[0]}`)[0].classList.add('is-invalid')
                        document.getElementsByName(`${e[0]}`)[0].insertAdjacentElement('afterend', newElement);
                    }
                })
            }
        }
    }
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form)
        if (formTitle === 'Регистрация') {
            try {
                await fetch('{{route('register_process')}}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {
                        if(data.redirect_url) {
                            window.location.href = data.redirect_url
                        } else {
                            showInvalid(data)
                        }
                    })
            } catch (error) {
                console.log(error)
            }
        } else if (formTitle === 'Вход') {
            try {
                await fetch('{{route('login_process')}}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {
                        if(data.redirect_url) {
                            window.location.href = data.redirect_url
                        } else {
                            if(data.success) {
                                showFlash(data)
                            }
                            showInvalid(data)
                        }
                    })
            } catch (error) {
                console.log(error)
            }
        } else {
                try {
                    await fetch('{{route('createApplication')}}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            if(data.redirect_url) {
                                window.location.href = data.redirect_url
                            } else {
                                if(data.success) {
                                    showFlash(data)
                                }
                                showInvalid(data)
                            }
                        })
                } catch (error) {
                    console.log(error)
                }
        }
    })
</script>
