<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Electronix Store</title>
  <link rel="shortcut icon" href="images/icon.ico" >
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>
<div id="main_container">
  <div class="top_bar">
    <div class="top_search">
      <div class="search_text"><a href="#">Advanced Search</a></div>
      <input type="text" class="search_input" name="search" />
      <input type="image" src="images/search.gif" class="search_bt"/>
    </div>
    <div class="languages">
      <div class="lang_text">Languages:</div>
      <a href="#" class="lang"><img src="images/brazil.png" alt="" border="0" /></a><a href="#" class="lang"><img src="images/en.gif" alt="" border="0" /></a>
    </div>
    <div class="languages">
      <div class="lang_text"><?php echo $_SESSION["wellcome"]; ?></div>
    </div>
  </div>
  <div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
    <div class="oferte_content">
      <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
      <div class="oferta">
        <div class="oferta_content"> <img src="images/laptop.png" width="94" height="92" alt="" border="0" class="oferta_img" />
          <div class="oferta_details">
            <div class="oferta_title">Samsung GX 2004 LM</div>
            <div class="oferta_text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
            <a href="detalhes.php" class="details">detalhes</a> </div>
        </div>
        <div class="oferta_pagination"> <span class="current">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> </div>
      </div>
      <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
    </div>
    <!-- end of oferte_content-->
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        <li><a href="index.php" class="nav1"> Home</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav2">Produtos</a></li>
        <li class="divider"></li>
        <!-- <li><a href="#" class="nav3">Specials</a></li>
        <li class="divider"></li> -->
        <li><a href="usuario_alterar.php" class="nav4">Minha Conta</a></li>
        <li class="divider"></li>
        <li><a href="login.php" class="nav4">Entrar</a></li>
        <li class="divider"></li>
        <li><a href="logout.php" class="nav4">Sair</a></li>
        <li class="divider"></li>
        <li><a href="shopping-cart.html" class="nav5">Meus pedidos</a></li>
        <li class="divider"></li>
        <li><a href="contato.php" class="nav6">Contato</a></li>
        <li class="divider"></li>
        <li class="currencies">Moeda
          <select>
            <option>Real</option>
            <option>US Dollar</option>
          </select>
        </li>
      </ul>
      <div class="right_menu_corner"></div>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Categorias</div>
      <ul class="left_menu">
        <li class="odd"><a href="#">Processadores</a></li>
        <li class="even"><a href="#">Placa-mãe</a></li>
        <li class="even"><a href="#">Memória RAM</a></li>
        <li class="odd"><a href="#">Fontes</a></li>
        <li class="even"><a href="#">Coolers</a></li>
        <li class="odd"><a href="#">Disco rígidos</a></li>
        <li class="even"><a href="#">SSD</a></li>
        <li class="even"><a href="#">Gabinetes</a></li>
        <li class="odd"><a href="#">Desktops</a></li>
        <li class="even"><a href="#">Laptops &amp; Notebooks</a></li>
        <li class="odd"><a href="#">SmartTV</a></li>
        <li class="even"><a href="#">SmartPhone</a></li>
        <li class="odd"><a href="#">Câmaras</a></li>
      </ul>
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="detalhes.php">Motorola 156 MX-VL</a></div>
        <div class="product_img"><a href="detalhes.php"><img src="images/laptop.png" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">R$ 350</span> <span class="price">R$ 270</span></div>
      </div>
      <div class="title_box">Newsletter</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">join</a> </div>
      <div class="banner_adds"> <a href="#"><img src="images/bann2.jpg" alt="" border="0" /></a> </div>
    </div>
    <div class="center_content">
    <!-- end of left content -->
