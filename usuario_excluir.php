<?php
	session_start();
	if(isset($_SESSION["logado"])  && $_SESSION["logado"] == TRUE ){
		include_once("conecta.php");
		session_destroy();
		$id = $_SESSION["id"];

		$sql= "delete from usuario where id='$id'";

		mysqli_select_db($con1, $database_conexao1);
		$Recordset1 = mysqli_query($con1,$sql) or die(mysqli_error($con1));
		header("Location:index.php");
	}
?>
