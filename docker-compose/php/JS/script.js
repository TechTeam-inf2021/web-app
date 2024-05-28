
const toggle = document.getElementById('dark');
const body = document.querySelector('body');
const a = document.querySelectorAll('nav ul li a');
const navbar = document.querySelector('nav');
const trello_logo = document.querySelector('label');
const footer = document.querySelector('footer');

// dark mode
let background_dark_mode = "rgb(8, 217, 207)";
let color_dark_mode = "rgb(9, 30, 66)";

// light mode
let background_light_mode = "rgb(9, 30, 66)";
let color_light_mode = "rgb(8, 217, 207)";

const accordion_content = document.querySelectorAll('.accordion-content');

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
    body.style.background = color_dark_mode;
    body.style.color = 'rgb(211, 236, 245)';
    body.style.transition = '2s';

    navbar.style.background = background_dark_mode;
    navbar.style.transition = '2s';

    trello_logo.style.color = color_dark_mode;
    trello_logo.style.transition = '2s';


    a.forEach(anchor => {
        anchor.style.color = color_dark_mode;
        anchor.style.transition = '2s';
    });
    
    footer.style.background = background_dark_mode;
    footer.style.color = color_dark_mode;
    footer.style.transition = '2s';    

    accordion_content.forEach(anchor => {
        anchor.style.color = color_dark_mode;
        anchor.style.transition = '2s';
        anchor.style.background = background_dark_mode;
    });

}

// Function to enable light mode
function enableLightMode() {
    toggle.classList.remove('bi-moon');
    body.style.background = 'rgb(211, 236, 245)';
    body.style.color = '#020202';
    body.style.transition = '2s';
    navbar.style.background = background_light_mode;
    navbar.style.transition = '2s';

    trello_logo.style.color = color_light_mode;
    trello_logo.style.transition = '2s';
    a.forEach(anchor => {
        anchor.style.color = color_light_mode;
        anchor.style.transition = '2s';
    });

    footer.style.background = background_light_mode;
    footer.style.color = color_light_mode;
    footer.style.transition = '2s';

    accordion_content.forEach(anchor => {
        anchor.style.color = color_light_mode;
        anchor.style.transition = '2s';
        anchor.style.background = background_light_mode;
    });
}


a.forEach(anchor => {
    anchor.addEventListener('mouseover', function() {
        this.style.color = 'white';

        this.style.transition = '0.5s';
    });
    
    anchor.addEventListener('mouseout', function() {
        this.style.color = ''; // Reset to default color
        this.style.transition = '0.5s';
    });
});


const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const isVisible = content.style.display === 'block';

            document.querySelectorAll('.accordion-content').forEach(item => item.style.display = 'none');

            if (!isVisible) {
                content.style.display = 'block';
            }
        });
    });