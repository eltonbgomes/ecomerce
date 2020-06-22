

<?php 
  $link= "produtos.xml"; 
  $xml = simplexml_load_file($link) -> produtos;

  foreach($xml-> produto as $produto){ 
   echo '<div class="prod_box">
              <div class="top_prod_box"></div>
                <div class="center_prod_box">
                  <div class="product_title">
                    <a href="detalhes.php">'.$produto->nome.'</a>
                  </div>
            <div class="product_img">
              <a href="detalhes.php">
                <img src="images/'.$produto->imagem.'" alt="" border="0" height="150px" width="150px"/>
                </a>
            </div>

          <div class="prod_price">
            <span class="price">'.$produto->preco.'</span>
          </div>

        </div>
        <div class="bottom_prod_box"></div>
        <div class="prod_details_tab"> <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="detalhes.php" class="prod_details">detalhes</a> </div>
      </div>';
  }
      

    ?>






      