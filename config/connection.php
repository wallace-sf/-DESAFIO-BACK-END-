<?php	
	if(!isset($seguranca)){exit;}//SE NÃO HOUVER VARIÁVEL DE SEGURANÇA ENCERRA A LEITURA DA PÁGINA

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_desafio";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Change character set to utf8
	mysqli_set_charset($conn,"utf8");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>
