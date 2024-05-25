// scripts.js

// dark mode

const toggle = document.getElementById('dark');
const body = document.querySelector('body');

// Check if there is a saved preference for dark mode in localStorage
const darkModePreference = localStorage.getItem('darkMode');

// Set initial dark mode based on localStorage or default to light mode
if (darkModePreference === 'true') {
    enableDarkMode();
} else {
    enableLightMode();
}

// Toggle dark mode when the toggle button is clicked
toggle.addEventListener('click', function () {
    if (this.classList.toggle('bi-brightness-high-fill')) {
        enableLightMode();
        localStorage.setItem('darkMode', 'false'); // Save the preference in localStorage
    } else {
        enableDarkMode();
        localStorage.setItem('darkMode', 'true'); // Save the preference in localStorage
    }
});

// Function to enable dark mode
function enableDarkMode() {
    toggle.classList.add('bi-moon');
    body.style.background = 'black';
    body.style.color = 'white';
    body.style.transition = '2s';
}

// Function to enable light mode
function enableLightMode() {
    toggle.classList.remove('bi-moon');
    body.style.background = 'white';
    body.style.color = 'black';
    body.style.transition = '2s';
}




// accordition
document.addEventListener("DOMContentLoaded", function() {
    const accordionHeaders = document.querySelectorAll(".accordion-header");

    accordionHeaders.forEach(header => {
        header.addEventListener("click", function() {
            const content = this.nextElementSibling;
            content.classList.toggle("active");
        });
    });
});



