function login_error() {
    var paragraph = document.getElementById("login_error");
    paragraph.innerHTML = "(!) Los Credenciales son incorrectos";
}

function login_success(username){
    var paragraph = document.getElementById("jug2");
    paragraph.innerHTML = "El jugador 2 es: " + username;
}