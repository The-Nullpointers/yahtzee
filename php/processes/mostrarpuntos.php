<?php
    require_once "php/connect.php";
	$query="SELECT * FROM yahtzee.usuarios WHERE USUARIO = '$username'";
	$consulta1=$mysqli->query($query);
	while($fila=$consulta1->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		    <td>".$fila['Name']."</td>
		    <td>".$fila['Victories']."</td>
		</tr>";
	}
?>