// ~~~~~~~~~~ Show or hide password ~~~~~~~~~~

let togglePassword = document.querySelector('#togglePassword');
let password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute between text and password
    let type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});