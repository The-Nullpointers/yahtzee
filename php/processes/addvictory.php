<?php
    require_once "php/connect.php";
	$query = "SELECT * FROM yahtzee.usuarios WHERE USUARIO = '$username'";

    $user_conn = $conn->query($query);

    $total1= $_POST['total1'];
    $total2= $_POST['total2'];

    if($total1<$total2){
        if($user_conn->num_rows>=1){
            $jugadorGanador=$_SESSION['username_invitado'];
            $error = "(!) Usuario 2 ganador";

            echo "<script>signup_error('" . $error . "');</script>";
            $valorActual = $fila['victorias'];
            $nuevoValor = $valorActual + 1;

            $query = "UPDATE yahtzee.usuarios SET victorias = $nuevoValor WHERE usuarios = $jugadorGanador";
        }
    }
    if($total1>$total2){
        if($user_conn->num_rows>=1){
            $jugadorGanador=$_SESSION['username'];
            $error = "(!) Usuario 1 ganador";
    
            echo "<script>signup_error('" . $error . "');</script>";
            $valorActual = $fila['victorias'];
            $nuevoValor = $valorActual + 1;
    
            $query = "UPDATE yahtzee.usuarios SET victorias = $nuevoValor WHERE usuarios = $jugadorGanador";
        }
    }

    
?>