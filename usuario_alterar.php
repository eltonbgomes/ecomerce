<?php
	$erro = FALSE;
	session_start();
	if(isset($_SESSION["logado"])  && $_SESSION["logado"] == TRUE ){

		include_once("conecta.php");
		$id = $_SESSION["id"];

		if (isset($_POST["nome"]) && isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
			$page = "usuario_cadastrar";

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

			echo $nome;

			$sql_up="update usuario set updated_at=NOW(), nome='$nome', login='$login', rg='$rg', cpf='$cpf', data_nascimento='$data_nascimento', cep='$cep', endereco='$endereco', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', email='$email', telefone='$telefone', celular='$celular', senha='$senha' where id='$id'";

			mysqli_select_db($con1, $database_conexao1);
			$Recordset1 = mysqli_query($con1,$sql_up) or die(mysqli_error($con1));

			header("Location:index.php");
		}

		$sql_sel = "Select nome, login, rg, cpf, data_nascimento, cep, endereco, numero, complemento, bairro, cidade, estado, email, telefone, celular from usuario where id='$id'";

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
					<div> <a href="#"><img src="images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
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
							<label>RG:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="rg" maxlength="14"value="<?php echo $row1["rg"]; ?>"  required>
						</div>
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
						<div class="col-md-2 mt-2">
							<label>CEP:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="cep" id="cep" maxlength="10" onkeydown="javascript: fMasc(this, mCEP );" value="<?php echo $row1["cep"]; ?>" required>
						</div>
						<div class="col-md-8 mt-2">
							<label>Endereço:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="endereco" id="rua" value="<?php echo $row1["endereco"]; ?>" required>
						</div>
						<div class="col-md-2 mt-2">
							<label>Número:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="numero" value="<?php echo $row1["numero"]; ?>" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-5 mt-2">
							<label>Complemento:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="complemento" value="<?php echo $row1["complemento"]; ?>" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Bairro:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="bairro" id="bairro" value="<?php echo $row1["bairro"]; ?>" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Cidade:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="cidade" id="cidade" value="<?php echo $row1["cidade"]; ?>" required>
						</div>
						<div class="col-md-1 mt-2">
							<label>UF:<font color="red"> * </font></label><br>
							<input type="text" class="form-control" name="estado" id="uf" value="<?php echo $row1["estado"]; ?>" required>
						</div>
					</div>
				</div>

				<img id="espereOk" style="display: none;position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);transform: -webkit-translate(-50%, -50%);transform: -moz-translate(-50%, -50%);transform: -ms-translate(-50%, -50%);color:darkred; z-index: 9999;" class="float:right" src="images/_preloader.jpg">

				<div class="form-group">
					<div class="row">
						<div class="col-md-6 mt-2">
							<label>email:<font color="red"> * </font></label><br>
							<input type="email" class="form-control "name="email" value="<?php echo $row1["email"]; ?>" required>
						</div>
						<div class="col-md-3 mt-2">
							<label>Telefone:<font color="red"> * </font></label><br>
							<input type="text" class="form-control "name="telefone" maxlength="13" onkeydown="javascript: fMasc(this, mTEL );" value="<?php echo $row1["telefone"]; ?>" required>
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
