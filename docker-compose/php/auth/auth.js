document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const simplepushKeyInput = document.getElementById('simplepush_key');

    usernameInput.addEventListener('input', function() {
        if (usernameInput.value.length > 12) {
            usernameInput.setCustomValidity('Το όνομα χρήστη πρέπει να είναι έως 12 χαρακτήρες');
        } else {
            usernameInput.setCustomValidity('');
        }
    });
ψλεαρ
    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.length > 16) {
            passwordInput.setCustomValidity('Ο κωδικός πρέπει να είναι έως 16 χαρακτήρες');
        } else {
            passwordInput.setCustomValidity('');
        }
    });

    simplepushKeyInput.addEventListener('input', function() {
        if (simplepushKeyInput.value.length != 6) {
            simplepushKeyInput.setCustomValidity('Το Simplepush.io Key πρέπει να είναι ακριβώς 6 χαρακτήρες');
        } else {
            simplepushKeyInput.setCustomValidity('');
        }
    });

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault(); 
        }
    });
});

windows.onload=function() {
    const err_msg = document.querySelector('.err_msg');
    err_msg.style.display = 'none';
}