<script src="../js/error_j2.js"></script>

<?php

    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $query = "SELECT * FROM yahtzee.usuarios WHERE USUARIO = '$username' AND CONTRASENA = MD5('$password')";

    $user_conn = $conn->query($query);

    if($user_conn->num_rows>=1){

        $row = $user_conn->fetch_array(MYSQLI_ASSOC);

        $_SESSION['username_invitado'] = $row['USUARIO'];
        
        echo "<script>login_success('" . $username . "');</script>";

    }else{
        echo "<script>login_error();</script>";
    }

    ?>