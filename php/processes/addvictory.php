<script src="../js/game.js"></script>

<?php

    $username = $_SESSION['username'];
    $username_guest = "";
    if(isset($_SESSION['username_invitado'])){
        $username_guest = $_SESSION['username_invitado'];
    }

	$query = "SELECT * FROM yahtzee.usuarios WHERE USUARIO = '$username'";

    $user_conn = $conn->query($query);


    if(isset($_POST['player1Won']) && isset($_POST['player2Won'])){
        $total1 = $_POST['player1Won'];
        $total2 = $_POST['player2Won'];
    }


    if($user_conn->num_rows>=1){

        if($total1){
            echo $total1;
            echo $total2;
            echo "test";

            $query = "UPDATE usuarios SET victorias = victorias + 1 WHERE USUARIO = '$username'";

            if($conn->query($query) === true){
                $_SESSION['wins']++;
                if($username_guest != ""){

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


        } else if ($total2){

            $query = "UPDATE usuarios SET derrotas = derrotas + 1 WHERE USUARIO = '$username'";
            $_SESSION['loses']++;
            if($conn->query($query) === true){

                if($username_guest != ""){

                    $query = "UPDATE usuarios SET derrotas = derrotas + 1 WHERE USUARIO = '$username_guest'";
                    if ($conn->query($query) === true) {
                        $_SESSION['username_invitado'] = "";
                        echo "<script>showWinner('" . $username_guest . "');</script>";
                    } else {
                        console.log("ERROR: NO SE PUDO ACTUALIZAR LAS VICTORIAS DEL JUGADOR 2");
                    }
    
                } else {
                    $x = "invitado"
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