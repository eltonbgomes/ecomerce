<?php
	session_start();
	$page = "cliente_cadastrar";
	
	if(isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"])){
		include_once("conecta.php");

		$nome = mysqli_real_escape_string($con1, trim($_POST["nome"]));
		$login = mysqli_real_escape_string($con1, trim($_POST["login"]));
		$cpf = mysqli_real_escape_string($con1, trim($_POST["cpf"]));
		$data_nascimento = mysqli_real_escape_string($con1, trim($_POST["data_nascimento"]));
		$email = mysqli_real_escape_string($con1, trim($_POST["email"]));
		$celular = mysqli_real_escape_string($con1, trim($_POST["celular"]));
		$senha = md5(mysqli_real_escape_string($con1, trim($_POST["senha"])));

		$sql="insert into cliente (created_at, nome, login, cpf, data_nascimento, email, celular, senha) values(NOW(), '$nome', '$login', '$cpf', '$data_nascimento', '$email', '$celular', '$senha')";

		mysqli_select_db($con1, $database_conexao1);
		mysqli_query($con1,$sql) or die(mysqli_error($con1));
		$_SESSION["id"] = mysqli_insert_id($con1);

		header("Location:cliente_upload_foto.php");
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
						<a href="#"><img src="default-profile.jpg" alt="" border="0" width="140" height="140" align="right"/></a>
					</div>
				</div>
			</div>
			<p>Campos com <font color="red"> * </font>são de preenchimento obrigatório</p>
			<hr>
			
			<form class="form"  method="POST" id="formcliente" action="cliente_cadastrar.php">
				<div class="form-group">
					<div class="row">
						<div class="col-md-8 mt-2">
							<label>Nome:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="nome" required>
						</div>
						<div class="col-md-4 mt-2">
							<label>Login:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="login" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3 mt-2">
							<label>CPF:<font color="red"> * </font></label><br>
							<input type="text" class="form-control cpf" id="cpf" name="cpf" maxlength="14" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Data de nascimento:<font color="red"> * </font></label><br>
							<input type="date" class="form-control "name="data_nascimento" required>
						</div>
						<div class="col-md-6 mt-2">
							<label>email:<font color="red"> * </font></label><br>
							<input type="email" class="form-control "name="email" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3 mt-2">
							<label>Celular:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="celular" maxlength="14" onkeydown="javascript: fMasc(this, mTEL );" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Senha:<font color="red"> * </font></label>
							<input type="password" class="form-control" name="senha" required>
						</div>
					</div>
				</div>
			</form>


			<div class="form-group">
				<div class="row">
					<div class="col-md-12 mt-2">
						<button type="submit" form="formcliente" class="btn btn-black" id="submit-all">
							Cadastrar
						</button>
						<a class="btn btn-secondary" href="index.php">Cancelar</a>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script src='vendor/js/mask.cpf.js'></script>
	<script src='vendor/js/mask.js'></script>
	<script src='vendor/js/busca.cep.js'></script>

</body>
</html>
