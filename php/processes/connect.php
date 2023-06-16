<?php
	$servername = "localhost";
	$username = "YAHTZEE_DBA";
	$password = "root123";
	$database = "YAHTZEE";
	
	$conn = new mysqli($servername, $username, $password, $database);

	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
?>