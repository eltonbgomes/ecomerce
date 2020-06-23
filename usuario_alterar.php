<?php
	$erro = FALSE;
	session_start();
	$page = "usuario_alterar";

	if(isset($_SESSION["logado"])  && $_SESSION["logado"] == TRUE ){

		include_once("conecta.php");
		$id = $_SESSION["id"];

		if (isset($_POST["nome"]) && isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {

			$nome = mysqli_real_escape_string($con1, trim($_POST["nome"]));
			$login = mysqli_real_escape_string($con1, trim($_POST["login"]));
			$cpf = mysqli_real_escape_string($con1, trim($_POST["cpf"]));
			$data_nascimento = mysqli_real_escape_string($con1, trim($_POST["data_nascimento"]));
			$email = mysqli_real_escape_string($con1, trim($_POST["email"]));
			$celular = mysqli_real_escape_string($con1, trim($_POST["celular"]));
			$senha = md5(mysqli_real_escape_string($con1, trim($_POST["senha"])));

			$sql_up="update usuario set updated_at=NOW(), nome='$nome', login='$login', cpf='$cpf', data_nascimento='$data_nascimento', email='$email', celular='$celular', senha='$senha' where id='$id'";

			mysqli_select_db($con1, $database_conexao1);
			$Recordset1 = mysqli_query($con1,$sql_up) or die(mysqli_error($con1));

			header("Location:index.php");
		}

		$sql_sel = "Select nome, login, cpf, data_nascimento, email, celular, foto from usuario where id='$id'";

		mysqli_select_db($con1,$database_conexao1);
		$Recordset1 = mysqli_query($con1,$sql_sel) or die(mysqli_error($con1));
		$row1 = mysqli_fetch_assoc($Recordset1);
		$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

	}else{
		$erro = TRUE;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include("head.php"); ?>

<body>

	<div class="container mt-4 mb-4">
		<div class="col-md-12">

			<?php if ($erro == FALSE) { ?>

				<form class="form"  method="POST" action="usuario_alterar.php">
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
								echo '<a class="btn btn-secondary" href="usuario_upload_foto.php">Alterar foto</a>';
								echo '<a class="btn btn-secondary" href="usuario_foto_excluir.php">Excluir foto</a>';
							} else {
								echo '<img src="default-profile.jpg" alt="" border="0" width="140" height="140" align="right"/>';
								echo '<a class="btn btn-secondary" href="usuario_upload_foto.php">Alterar foto</a>';
							}
						?>
						</div>

					</div>
				</div>
				<p>Campos com <font color="red"> * </font>são de preenchimento obrigatório</p>
				<hr>
				<div class="form-group">
					<div class="row">
						<div class="col-md-8 mt-2">
							<label>Nome:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="nome" value="<?php echo $row1["nome"]; ?>" required>
						</div>
						<div class="col-md-4 mt-2">
							<label>Login:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="login" value="<?php echo $row1["login"]; ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-4 mt-2">
							<label>CPF:<font color="red"> * </font></label><br>
							<input type="text" class="form-control cpf" id="cpf" name="cpf" maxlength="14" value="<?php echo $row1["cpf"]; ?>" required>
						</div>
						<div class="col-md-4 mt-2">
							<label>Data de nascimento:<font color="red"> * </font></label><br>
							<input type="date" class="form-control "name="data_nascimento" value="<?php echo $row1["data_nascimento"]; ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 mt-2">
							<label>email:<font color="red"> * </font></label><br>
							<input type="email" class="form-control "name="email" value="<?php echo $row1["email"]; ?>" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Celular:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="celular" maxlength="14" onkeydown="javascript: fMasc(this, mTEL );" value="<?php echo $row1["celular"]; ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 mt-2">
							<label>Nova Senha:<font color="red"> * </font></label>
							<input type="password" class="form-control" name="senha" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12 mt-2">
							<button type="submit" class="btn btn-black">Alterar</button>
							<a class="btn btn-secondary" href="index.php">Cancelar</a>
							<button class="btn btn-danger" onclick="alerta_usuario_excluir()">Excluir Conta</button>
						</div>
					</div>
				</div>
			</form>

			<?php }else{ ?>
				<h3>VOCÊ NÃO ESTÁ LOGADO</h3>
				<a class="btn btn-black" href="login.php">Entrar</a>
				<a class="btn btn-secondary" href="index.php">Cancelar</a>
			<?php } ?>

		</div>
	</div>

	<script src='vendor/js/mask.cpf.js'></script>
	<script src='vendor/js/mask.js'></script>
	<script src='vendor/js/busca.cep.js'></script>

</body>
</html>
