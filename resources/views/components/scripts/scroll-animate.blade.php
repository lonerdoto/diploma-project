<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            threshold: 0.005
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('animate-left')) {
                        entry.target.classList.add('animate-slide-in-left');
                    } else if (entry.target.classList.contains('animate-right')) {
                        entry.target.classList.add('animate-slide-in-right');
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const elementsToAnimate = document.querySelectorAll('.animate-left, .animate-right');
        elementsToAnimate.forEach(element => {
            observer.observe(element);
        });
    });
</script>
