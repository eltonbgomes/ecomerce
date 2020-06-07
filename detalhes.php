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
      <div class="center_title_bar">Motorola 156 MX-VL</div>
      <div class="prod_box_big">
        <div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">
          <div class="product_img_big"> <a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="images/laptop.gif" alt="" border="0" /></a>
            <div class="thumbs"> <a href="#" title="header=[Thumb1] body=[&nbsp;] fade=[on]"><img src="images/thumb1.gif" alt="" border="0" /></a> <a href="#" title="header=[Thumb2] body=[&nbsp;] fade=[on]"><img src="images/thumb1.gif" alt="" border="0" /></a> <a href="#" title="header=[Thumb3] body=[&nbsp;] fade=[on]"><img src="images/thumb1.gif" alt="" border="0" /></a> </div>
          </div>
          <div class="details_big_box">
            <div class="product_title_big">My Cinema-U3000/DVBT, USB 2.0 TV BOX External, White</div>
            <div class="specifications"> Disponibilitate: <span class="blue">In stoc</span><br />
              Garantie: <span class="blue">24 luni</span><br />
              Tip transport: <span class="blue">Mic</span><br />
              Pretul include <span class="blue">TVA</span><br />
            </div>
            <div class="prod_price_big"><span class="reduce">350$</span> <span class="price">270$</span></div>
            <a href="#" class="addtocart">add to cart</a> <a href="#" class="compare">compare</a> </div>
        </div>
        <div class="bottom_prod_box_big"></div>
      </div>
      <div class="center_title_bar">Produtos Similares</div>

<?php include("produtos.php"); ?>
<?php include("home_bottom.php"); ?>
