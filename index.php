<?php
  session_start();

  if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
    $_SESSION["wellcome"] = "Bem vindo ".$_SESSION["nome"];
  }else{
    $_SESSION["wellcome"] = "Bem vindo";
  }

?>
<!-- parte superior e lateral esquerda da pagina -->
<?php include("home_top.php"); ?>
      <div class="center_title_bar">Últimos produtos</div>

<!-- produtos da pagina -->
<?php include("produtos.php"); ?>      

<!-- parte lateral direita e inferior da pagina -->
<?php include("home_bottom.php"); ?>
