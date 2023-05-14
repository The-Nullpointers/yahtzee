<script src="../js/index.js"></script>

<?php

    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $query = "SELECT * FROM yahtzee.usuarios WHERE USUARIO = '$username'";

    $user_conn = $conn->query($query);

    if($user_conn->num_rows>=1){

        $error = "(!) Este usuario ya existe";

        echo "<script>signup_error('" . $error . "');</script>";
        

    }else{
        $query = "INSERT YAHTZEE.USUARIOS VALUES ('$username', MD5('$password'), 0, 0)";

        if($user_conn = $conn->query($query) === true){
            require_once "login.php";
        }
        else{
            $error = "(!) Ha ocurrido un error inesperado";
            echo "<script>signup_error('" . $error . "');</script>";
        }
        
    }

?>