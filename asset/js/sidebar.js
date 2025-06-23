document.addEventListener('DOMContentLoaded', function() {
    // Highlight active menu item based on current URL
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') && currentPath.includes(link.getAttribute('href'))) {
            link.classList.add('active');
            // Expand parent collapse if exists
            const parentCollapse = link.closest('.collapse');
            if (parentCollapse) {
                parentCollapse.classList.add('show');
                const parentTrigger = document.querySelector(`[data-bs-target="#${parentCollapse.id}"]`);
                parentTrigger.classList.remove('collapsed');
            }
        }
    });
});