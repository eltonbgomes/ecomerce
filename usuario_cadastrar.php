<!DOCTYPE html>
<html lang="pt-br">

<?php include("head.php"); ?>

<body>
	<?php
		session_start();
		
		$page = "usuario_cadastrar";

		if(isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"])){
			include_once("conecta.php");

			$nome = mysqli_real_escape_string($con1, trim($_POST["nome"]));
			$login = mysqli_real_escape_string($con1, trim($_POST["login"]));
			$senha = md5(mysqli_real_escape_string($con1, trim($_POST["senha"])));
			$sql="insert into usuario (nome, login, senha) values('$nome', '$login', '$senha')";

			mysqli_select_db($con1, $database_conexao1);
			$Recordset1 = mysqli_query($con1,$sql) or die(mysqli_error($con1));

			header("Location:login.php");
		}
	?>

	<div class="container mt-4 mb-4">
		<div class="col-md-5">
			<form class="form"  method="POST" action="usuario_cadastrar.php">
				<div class="form-group">
					<div> <a href="#"><img src="images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
				</div>
				<p>Campos com <font color="red"> * </font>são de preenchimento obrigatório</p>
				<hr>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12 mt-2">
							<label>Nome:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="nome" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12 mt-2">
							<label>Login:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="login" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12 mt-2">
							<label>Senha<font color="red"> * </font></label>
							<input type="password" class="form-control" name="senha" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-12 mt-2">
							<button type="submit" class="btn btn-black">Cadastrar</button>
							<a class="btn btn-secondary" href="index.php">Cancelar</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</body>
</html>
