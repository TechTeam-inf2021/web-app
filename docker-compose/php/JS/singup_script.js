const darkModePreference = localStorage.getItem('darkMode');
const toggle = document.getElementById('dark');
const body = document.querySelector('body');
const footer = document.querySelector('footer');
let background_dark_mode = "rgb(8, 217, 207)";
let color_dark_mode = "rgb(9, 30, 66)";
let background_light_mode = "rgb(9, 30, 66)";
let color_light_mode = "rgb(8, 217, 207)";
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

    footer.style.background = background_dark_mode;
    footer.style.color = color_dark_mode;
    footer.style.transition = '2s';    



}

// Function to enable light mode
function enableLightMode() {
    toggle.classList.remove('bi-moon');
    body.style.background = 'rgb(211, 236, 245)';
    body.style.color = '#020202';
    body.style.transition = '2s';
    footer.style.background = background_light_mode;
    footer.style.color = color_light_mode;
    footer.style.transition = '2s';
}