<script>
    function saveScrollPosition() {
        localStorage.setItem('scrollPosition', window.scrollY);
    }

    function restoreScrollPosition() {
        const scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition !== null) {
            window.scrollTo(0, parseInt(scrollPosition, 10));
        }
    }

    window.addEventListener('beforeunload', saveScrollPosition);
    window.addEventListener('load', restoreScrollPosition);
</script>
