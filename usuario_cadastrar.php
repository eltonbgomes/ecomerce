<?php
	session_start();
	
	$page = "usuario_cadastrar";

	if(isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"])){
		include_once("conecta.php");

		$nome = mysqli_real_escape_string($con1, trim($_POST["nome"]));
		$login = mysqli_real_escape_string($con1, trim($_POST["login"]));
		$rg = mysqli_real_escape_string($con1, trim($_POST["rg"]));
		$cpf = mysqli_real_escape_string($con1, trim($_POST["cpf"]));
		$data_nascimento = mysqli_real_escape_string($con1, trim($_POST["data_nascimento"]));
		$cep = mysqli_real_escape_string($con1, trim($_POST["cep"]));
		$endereco = mysqli_real_escape_string($con1, trim($_POST["endereco"]));
		$numero = mysqli_real_escape_string($con1, trim($_POST["numero"]));
		$complemento = mysqli_real_escape_string($con1, trim($_POST["complemento"]));
		$bairro = mysqli_real_escape_string($con1, trim($_POST["bairro"]));
		$cidade = mysqli_real_escape_string($con1, trim($_POST["cidade"]));
		$estado = mysqli_real_escape_string($con1, trim($_POST["estado"]));
		$email = mysqli_real_escape_string($con1, trim($_POST["email"]));
		$telefone = mysqli_real_escape_string($con1, trim($_POST["telefone"]));
		$celular = mysqli_real_escape_string($con1, trim($_POST["celular"]));
		$senha = md5(mysqli_real_escape_string($con1, trim($_POST["senha"])));

		$sql="insert into usuario (created_at, nome, login, rg, cpf, data_nascimento, cep, endereco, numero, complemento, bairro, cidade, estado, email, telefone, celular, senha) values(NOW(), '$nome', '$login', '$rg', '$cpf', '$data_nascimento', '$cep', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$email', '$telefone', '$celular', '$senha')";

		mysqli_select_db($con1, $database_conexao1);
		$Recordset1 = mysqli_query($con1,$sql) or die(mysqli_error($con1));

		header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include("head.php"); ?>

<body>

	<div class="container mt-4 mb-4">
		<div class="col-md-12">
			<form class="form"  method="POST" action="usuario_cadastrar.php">
				<div class="form-group">
					<div> <a href="#"><img src="images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
				</div>
				<p>Campos com <font color="red"> * </font>são de preenchimento obrigatório</p>
				<hr>
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
						<div class="col-md-4 mt-2">
							<label>RG:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="rg" maxlength="14" required>
						</div>
						<div class="col-md-4 mt-2">
							<label>CPF:<font color="red"> * </font></label><br>
							<input type="text" class="form-control cpf" id="cpf" name="cpf" maxlength="14" required>
						</div>
						<div class="col-md-4 mt-2">
							<label>Data de nascimento:<font color="red"> * </font></label><br>
							<input type="date" class="form-control "name="data_nascimento" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2 mt-2">
							<label>CEP:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="cep" id="cep" maxlength="10" onkeydown="javascript: fMasc(this, mCEP );" required>
						</div>
						<div class="col-md-8 mt-2">
							<label>Endereço:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="endereco" id="rua" required>
						</div>
						<div class="col-md-2 mt-2">
							<label>Número:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="numero" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-5 mt-2">
							<label>Complemento:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="complemento" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Bairro:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="bairro" id="bairro" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Cidade:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="cidade" id="cidade" required>
						</div>
						<div class="col-md-1 mt-2">
							<label>UF:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="estado" id="uf" required>
						</div>
					</div>
				</div>

				<img id="espereOk" style="display: none;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);transform: -webkit-translate(-50%, -50%);transform: -moz-translate(-50%, -50%);transform: -ms-translate(-50%, -50%);color:darkred; z-index: 9999;" class="float:right" src="images/_preloader.jpg">

				<div class="form-group">
					<div class="row">
						<div class="col-md-6 mt-2">
							<label>email:<font color="red"> * </font></label><br>
							<input type="email" class="form-control "name="email" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Telefone:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="telefone" maxlength="13" onkeydown="javascript: fMasc(this, mTEL );" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Celular:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="celular" maxlength="14" onkeydown="javascript: fMasc(this, mTEL );" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 mt-2">
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

	<script src='vendor/js/mask.cpf.js'></script>
	<script src='vendor/js/mask.js'></script>
	<script src='vendor/js/busca.cep.js'></script>

</body>
</html>
