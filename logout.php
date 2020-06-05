<?php 
	session_start();
	if(isset($_SESSION['logado'])){
		session_destroy();
		header("Location:login.php");
	}else{
		echo "Não foi possível destruir a sessão.";
	}
?>
