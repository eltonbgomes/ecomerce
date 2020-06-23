<?php
	session_start();
	if(isset($_SESSION["logado"])  && $_SESSION["logado"] == TRUE ){
		include_once("conecta.php");
		$id = $_SESSION["id"];

		$sql_sel = "Select nome, foto from usuario where id='$id'";

		mysqli_select_db($con1,$database_conexao1);
		$Recordset1 = mysqli_query($con1,$sql_sel) or die(mysqli_error($con1));
		$row1 = mysqli_fetch_assoc($Recordset1);

		if ($row1["foto"]) {
			unlink("files/".$row1["foto"]);
		}

		echo "dss";

		$sql_up="update usuario set updated_at=NOW(), foto='' where id='$id'";

		mysqli_select_db($con1, $database_conexao1);
		$Recordset1 = mysqli_query($con1,$sql_up) or die(mysqli_error($con1));

		header("Location:usuario_upload_foto.php");
	}else{
		echo "Usuário não logado";
	}
?>
