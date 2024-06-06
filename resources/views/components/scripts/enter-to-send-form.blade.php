<script>
    document.getElementById('table-search-users').addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            document.getElementById('table-search-users').submit();
        }
    });
</script>
