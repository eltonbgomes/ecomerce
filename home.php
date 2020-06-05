<!DOCTYPE html>
<html lang="pt-br">
<?php include("head.php"); ?>
<body>
<?php
	session_start();

	if (!isset($_SESSION["logado"])) {
		header("location: login.php");
	}
	include("menu.php");
?>

</body>
</html>