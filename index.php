<?php
  session_start();

  $_SESSION["wellcome"] = "Bem vindo"; //pensar em como corrigir isso, ele só pode definir a primeira vez
  if (isset($_GET['login'])){
      $_SESSION["wellcome"] .= " ".$_SESSION["nome"];
      $login = $_GET['login'];
  }else{
      $login = FALSE;
  }
?>

<?php include("home_top.php"); ?>
      <div class="center_title_bar">Últimos produtos</div>
<?php include("produtos.php"); ?>      
<?php include("produtos.php"); ?>
      <div class="center_title_bar">Produtos Recomendados</div>
<?php include("produtos.php"); ?>
<?php include("home_bottom.php"); ?>
