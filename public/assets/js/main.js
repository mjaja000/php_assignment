/* public/assets/js/main.js */

// Wait for the document to load before running scripts
document.addEventListener('DOMContentLoaded', function() {
    // Toggle mobile navigation menu
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    
    if(menuToggle) {
        menuToggle.addEventListener('click', function() {
            // Toggle the display of navigation links on mobile
            navLinks.style.display = (navLinks.style.display === 'flex') ? 'none' : 'flex';
        });
    }
    
    // Additional JavaScript functions can be added here
});
