function login_error() {
    var paragraph = document.getElementById("login_error");
    paragraph.innerHTML = "(!) Los Credenciales son incorrectos";
    var paragraph = document.getElementById("signup_error");
    paragraph.innerHTML = "";
}

function signup_error(message) {
    var paragraph = document.getElementById("login_error");
    paragraph.innerHTML = "";
    var paragraph = document.getElementById("signup_error");
    paragraph.innerHTML = message;
}