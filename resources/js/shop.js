document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[name="search"]');

    // Optional: Auto-submit search form on input
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function () {
            this.form.submit();
        }, 500));
    }

    // Debounce function to avoid firing search on every keystroke
    function debounce(func, wait) {
        let timeout;
        return function () {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, arguments), wait);
        };
    }

    // Optional: Product card hover effect
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('shadow-lg');
        });
        card.addEventListener('mouseleave', () => {
            card.classList.remove('shadow-lg');
        });
    });

    // Example: Toast message (if you want to show "Added to cart" or similar)
    const toastTrigger = document.querySelector('.toast-trigger');
    if (toastTrigger) {
        showToast('Added to cart!');
    }

    function showToast(message) {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.className = 'position-fixed bottom-0 end-0 m-3 p-2 bg-success text-white rounded shadow';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }
});
