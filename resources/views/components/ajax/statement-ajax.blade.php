<script>
    const form = document.querySelector('.form-control')
    const formTitle = document.querySelector('.form-header').innerText
    const body = document.querySelector('body')
    const showInvalid = (response) => {
        const inputs = document.querySelectorAll('input')
        const labels = document.querySelectorAll('label')
        inputs.forEach(e => {
            e.classList.remove('is-invalid')
        })
        labels.forEach(e => e.remove())
        response = Object.entries(response.errors)
        response.forEach(e => {
            let newElement = document.createElement('label')
            newElement.innerText = e[1][0]
            newElement.htmlFor = e[0]
            newElement.classList.add('error-label')
            document.getElementsByName(`${e[0]}`)[0].classList.add('is-invalid')
            document.getElementsByName(`${e[0]}`)[0].insertAdjacentElement('afterend', newElement);
        })
    }
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form)
            try {
                await fetch('{{route('create_statement')}}', {
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
    })

</script>
