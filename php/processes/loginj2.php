<script src="../js/game.js"></script>

<?php

    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $query = "SELECT * FROM yahtzee.usuarios WHERE USUARIO = '$username' AND CONTRASENA = MD5('$password')";

    $user_conn = $conn->query($query);

    if($user_conn->num_rows>=1){

        $row = $user_conn->fetch_array(MYSQLI_ASSOC);
        
        if($_SESSION['username'] == $row['USUARIO']){
            $error = "(!) El jugador ingresado ya existe como Jugador 1";
            echo "<script>login_error('" . $error . "');</script>";
            echo "<script>showLoginElements();</script>";
        }
        else{
            $_SESSION['username_invitado'] = $row['USUARIO'];
            echo "<script>login_success('" . $username . "');</script>";
            echo "<script>hideLoginElements();</script>";
        }

    }else{
        $error = "(!) Los credenciales son incorrectos";
        echo "<script>login_error('" . $error . "');</script>";
    }

?>