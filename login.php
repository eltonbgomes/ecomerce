<?php
session_start();
$_SESSION["logado"] = FALSE; //pensar em como corrigir isso, ele só pode definir como falso a primeira vez

$erro = FALSE;

if(isset($_POST["login"]) && isset($_POST["senha"]) && $_SESSION["logado"] == FALSE){
    include_once("conecta.php");

    $login = mysqli_real_escape_string($con1, trim($_POST["login"]));

    $senha = mysqli_real_escape_string($con1, trim($_POST["senha"]));

    $sql="select nome, login from usuario where login = '$login' and senha = md5('$senha')";

    mysqli_select_db($con1, $database_conexao1);
    $Recordset1 = mysqli_query($con1,$sql) or die(mysqli_error($con1));
    $row1 = mysqli_fetch_assoc($Recordset1);
    $totalRows_Recordset1 = mysqli_num_rows($Recordset1);

    if($totalRows_Recordset1 == 1){
        $_SESSION["nome"] = $row1["nome"];
        $_SESSION["login"] = $row1["login"];
        $_SESSION["logado"] = TRUE;
        header ("location: index.php?login=TRUE");
        exit;
    }else{
        $erro = TRUE;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include("head.php"); ?>

<body>

    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="post" action="login.php">
                    <div class="form-group">
                        <div> <a href="#"><img src="images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
                    </div>
                    <?php if ($_SESSION["logado"] == False){ ?>
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" class="form-control" name="login" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" placeholder="Senha">
                        </div>
                    <?php }else{ ?>
                        <h3>VOCÊ ESTÁ LOGADO</h3>
                    <?php } ?>
                    <?php if ($erro == TRUE){ ?>
                        <div class="ml-2 mr-2 alert alert-danger">Usuário e senha não encontrado</div>
                    <?php } ?>
                    <button type="submit" class="btn btn-black">Login</button>
                    <a class="btn btn-secondary" href="usuario_cadastrar.php">Register</a>
                    <a class="btn btn-light" href="index.php">Voltar</a>
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="#">Esqueci a senha?</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>