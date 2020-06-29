<?php

$hostname_conexao1 = "localhost";
$database_conexao1 = "Ecommercephp";
$username_conexao1 = "root";
$password_conexao1 = "";

$con1 = mysqli_connect($hostname_conexao1, $username_conexao1, $password_conexao1);
if (!$con1){
	die("Connection error: " . mysqli_connect_error());
}

mysqli_query($con1, "SET NAMES 'utf8'");
mysqli_query($con1, 'SET character_set_connection=utf8');
mysqli_query($con1, 'SET character_set_client=utf8');
mysqli_query($con1, 'SET character_set_results=utf8');
?>
