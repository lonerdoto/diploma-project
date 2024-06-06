<script>
    const showFlash = (response) => {
        const flash = document.createElement('div')
        flash.classList.add('flash')
        if (typeof response.message !== 'undefined') {
            flash.innerText = response.message
        } else {
            flash.innerText = response.success
        }
        body.insertAdjacentElement('afterbegin', flash)
        setTimeout(() => {
            document.querySelector('.flash').remove();
        }, 3000)
    }
</script>
