<script>
    const input = document.querySelector('#files');
    const label = document.querySelector('#file-name');
    input.addEventListener('change', function () {
        document.getElementsByName('file-input')[0].classList.remove('is-invalid')
        if (document.querySelector('#files-input')) {
            document.querySelector('#files-input').remove()
        }

        let files = this.files
        let str = ''
        for (let i = 0; i < files.length; i++) {
            str += files[i].name + " | "
        }
        if (str) {
            label.innerText = str
        }
    })
</script>
