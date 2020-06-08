<?php
  session_start();

  if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
    $_SESSION["wellcome"] = "Bem vindo ".$_SESSION["nome"];
  }else{
    $_SESSION["wellcome"] = "Bem vindo";
  }

?>

<?php include("home_top.php"); ?>
    <!-- end of left content -->
<?php include("contato_body.php"); ?>
    <!-- end of center content -->
<?php include("home_bottom.php"); ?>