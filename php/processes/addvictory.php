<script src="../js/game.js"></script>

<?php

    session_start();
    require_once "connect.php";
    $username = $_SESSION['username'];
    $username_guest = "";
    if(isset($_SESSION['username_invitado'])){
        $username_guest = $_SESSION['username_invitado'];
    }

	$query = "SELECT * FROM yahtzee.usuarios WHERE USUARIO = '$username'";

    $user_conn = $conn->query($query);

    $total1 = $_POST['variable1'];
    $total2 = $_POST['variable2'];

    echo "Total 1 : $total1";
    echo "Total 2 : $total2";


    if ($user_conn->num_rows>=1) {

        if ($total1 == 'true') {

            $query = "UPDATE usuarios SET victorias = victorias + 1 WHERE USUARIO = '$username'";

            if ($conn->query($query) === true) {
                $_SESSION['wins']++;
                if ($username_guest != "") {

                    $query = "UPDATE usuarios SET derrotas = derrotas + 1 WHERE USUARIO = '$username_guest'";
                    if ($conn->query($query) === true) {
                        $_SESSION['username_invitado'] = "";
                        echo "<script>showWinner('" . $username . "');</script>";
                        
                    } else {
                        console.log("ERROR: NO SE PUDO ACTUALIZAR LAS DERROTAS DEL JUGADOR 2");
                    }
    
                } else {
                    echo "<script>showWinner('" . $username . "');</script>";
                }
            }
            else {
                console.log("ERROR: NO SE PUDO ACTUALIZAR LAS VICTORIAS DEL JUGADOR 1");
            }


        } elseif ($total2 == 'true') {

            $query = "UPDATE usuarios SET derrotas = derrotas + 1 WHERE USUARIO = '$username'";
            $_SESSION['loses']++;
            if ($conn->query($query) === true) {

                if ($username_guest != "") {

                    $query = "UPDATE usuarios SET derrotas = derrotas + 1 WHERE USUARIO = '$username_guest'";
                    if ($conn->query($query) === true) {
                        $_SESSION['username_invitado'] = "";
                        echo "<script>showWinner('" . $username_guest . "');</script>";
                    } else {
                        console.log("ERROR: NO SE PUDO ACTUALIZAR LAS VICTORIAS DEL JUGADOR 2");
                    }
    
                } else {
                    $x = "invitado";
                    echo "<script>showWinner('". $x ."');</script>";
                }
            }
            else {
                console.log("ERROR: NO SE PUDO ACTUALIZAR LAS DERROTAS DEL JUGADOR 1");
            }
            


            

        } else {
            echo "<script>showTie();</script>";
        }

    }

?>