// script.js
document.addEventListener('DOMContentLoaded', function() {
    console.log('Tibet theme scripts loaded.');

    // Dark mode functionality
    const darkModeToggle = document.querySelector('.dark-mode-toggle input');
    const body = document.body;

    // Check for saved user preference, if any
    const savedDarkMode = localStorage.getItem('darkMode');
    if (savedDarkMode === 'true') {
        body.classList.add('dark-mode');
        darkModeToggle.checked = true;
    } else if (savedDarkMode === null && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        // If no saved preference, check system preference
        body.classList.add('dark-mode');
        darkModeToggle.checked = true;
    }

    // Listen for toggle changes
    darkModeToggle.addEventListener('change', function() {
        if (this.checked) {
            body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'true');
        } else {
            body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', 'false');
        }
    });

    // Listen for system preference changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
        if (localStorage.getItem('darkMode') === null) {
            if (e.matches) {
                body.classList.add('dark-mode');
                darkModeToggle.checked = true;
            } else {
                body.classList.remove('dark-mode');
                darkModeToggle.checked = false;
            }
        }
    });
});