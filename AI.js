document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const navLinks = document.querySelector(".nav-links");
    const darkModeToggle = document.getElementById("dark-mode-toggle");
    const body = document.body;

    mobileMenuButton.addEventListener("click", function () {
        navLinks.classList.toggle("active");
    });

    // Check if the user has a preference for dark mode
    const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    //set dark mode to the user's preference
    darkModeToggle.checked = prefersDarkMode;
    
    // function to toggle dark mode
    function toggleDarkMode() {
        if (darkModeToggle.checked) {
            body.classList.add('dark-mode');
        } else {
            body.classList.remove('dark-mode');
        }
    }
    
    // handle dark mode toggle
    darkModeToggle.addEventListener('change', toggleDarkMode);
    
    //initially set dark mode based on user's preference
    toggleDarkMode();
});