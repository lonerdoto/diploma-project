<script>
    function deleteInvalidOnInput(input) {
        if(document.querySelector('label[for="' + input.name + '"]') !== null) document.querySelector('label[for="' + input.name + '"]').remove();
        input.classList.remove('is-invalid')
    }
</script>
