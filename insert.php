<?php
	//exemplo
	include_once("conexao1.php");

	$nome = mysqli_real_escape_string($con1, trim($_POST["nome"])); 
	$telefone = mysqli_real_escape_string($con1, trim($_POST["telefone"]));

	$sql="INSERT INTO cliente (nome, telefone) VALUES ('$nome','$telefone')";
	$Result1 = mysqli_query($con1, $sql) or die(mysqli_error($con1));

	header("Location: index.php?msg=ok");
	exit;
?>
