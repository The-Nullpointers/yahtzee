<?php
	session_start();
	if(!$_SESSION['isLoggedIn']){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>TNP - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/favicon.png">
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    
    <div class="container">
        <?php
            echo '<h1>Bienvenido, '.$_SESSION['username'] .' </h1>
            <p>Victorias: '.$_SESSION['wins'] .'</p>
            <p>Derrotas: '.$_SESSION['loses'] .'</p>'
        ?>
        <br>
        <button class="button-27" onclick="window.location.href = 'game.php'">PLAY!</button>
        <br>
        <br>
        <a href="processes/logout.php">
            <button class="button-logout">LOG OUT</button>
        </a>
    </div>
</body>
</html>
