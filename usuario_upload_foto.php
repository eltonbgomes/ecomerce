<?php
	session_start();
	include_once("conecta.php");
	if (!isset($_SESSION["mensagem"])) {
		$_SESSION["mensagem"] = "";
	}
	$id = $_SESSION["id"];

	$sql_sel = "Select nome, foto from usuario where id='$id'";

	mysqli_select_db($con1,$database_conexao1);
	$Recordset1 = mysqli_query($con1,$sql_sel) or die(mysqli_error($con1));
	$row1 = mysqli_fetch_assoc($Recordset1);

	if(isset($_POST['gravar']) && isset($_FILES['imagem'])){
		$imagem = $_FILES['imagem']['name']; // Nome original da imagem

		$dir = "files"; // Diretório das imagens	
		$salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor

		move_uploaded_file($_FILES['imagem']['tmp_name'],$salva ); // Este comando move o arquivo do diretório temporário para o caminho especificado acima

		$info_imagem = pathinfo($salva); // Resgatando extensão do arquivo recém-baixado

		$nova_imagem = md5(time().rand(1000,5000)).".".$info_imagem['extension']; // Nome da imagem redimensionada

		// *** Include the class
		require_once "resize.php"; 

		// *** 1) Initialise / load image
		$resizeObj = new resize($salva);

		// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
		$resizeObj -> resizeImage(200, 200, 'crop');
		/* Especificando que a nova imagem terá 200 px de largura e altura. E utilizando a opção CROP, que é considerada a melhor
		pois, recorta a imagem na medida sem distorção
		Se quizer ver outras opções, visite o site do desenvolvedor de resize2.php (http://www.jarrodoberto.com/articles/2011/09/image-resizing-made-easy-with-php)

		*/

		// *** 3) Save image
		$resizeObj -> saveImage($dir."/".$nova_imagem, 100);

		// O arquivo-base é removido
		unlink($salva);

		if ($row1["foto"]) {
			unlink("files/".$row1["foto"]);
		}

		$sql_up="update usuario set updated_at=NOW(), foto='$nova_imagem' where id='$id'";

		mysqli_select_db($con1, $database_conexao1);
		$Recordset1 = mysqli_query($con1,$sql_up) or die(mysqli_error($con1));

		$_SESSION["mensagem"] = "<br><p>UPLOAD REALIZAD0 COM SUCESSO</p><br>";

		header("Location:usuario_upload_foto.php");
	}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include("head.php"); ?>

<body>
	<div class="container mt-4 mb-4">
		<div class="col-md-12">
			<div class="form-group">
				<div class="row">
					<div class="col-md-6 mt-2">
						<a href="#"><img src="images/logo.png" alt="" border="0" width="237" height="140" align="left" /></a>
					</div>
					<div class="col-md-6 mt-2">
						<?php
							if ($row1["foto"]) {
								$foto = $row1["foto"];
								echo '<img src="files/'.$foto.'" class="img-thumbnail"  style="height:140px;" align="right"/>';
							} else {
								echo '<img src="default-profile.jpg" alt="" border="0" width="140" height="140" align="right"/>';
							}
						?>
					</div>
				</div>
			</div>
			<p><?php echo $row1["nome"]; ?> seu cadastro foi realizado ou alterado com sucesso! Aqui é possível salvar ou alterar uma foto de perfil.</p>
			<hr>

			<div class="form-group">
				<div class="row">
					<div class="col-md-6 mt-2">
						<label>Foto de perfil:</label>
						<form action="usuario_upload_foto.php" method="post" enctype="multipart/form-data">
							<input type="file" name="imagem" id="imagem" class="btn btn-light"/>
							<input type="submit" name="gravar" value="Enviar arquivo" id="gravar" class="btn btn-black"/>
							<a class="btn btn-secondary" href="index.php">Cancelar envio de foto</a>
						</form>
						<?php if ($_SESSION["mensagem"] != "") {
							echo $_SESSION["mensagem"];
							echo '<a class="btn btn-secondary" href="login.php">Voltar para página de login</a>';
						} ?>
					</div>
				</div>
			</div>

</body>
</html>