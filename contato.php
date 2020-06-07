<?php
  session_start();

  $wellcome = "Bem vindo";
  if (isset($_GET['login'])){
      $wellcome .= " ".$_SESSION["nome"];
      $login = $_GET['login'];
  }else{
      $login = FALSE;
  }
?>

<?php include("home_top.php"); ?>
    <!-- end of left content -->
<?php include("contato_body.php"); ?>
    <!-- end of center content -->
<?php include("home_bottom.php"); ?>