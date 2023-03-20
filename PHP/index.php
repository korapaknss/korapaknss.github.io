<?php
session_start();
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKLEP KOMPUTEROWY</title>
    <link rel="stylesheet" type="text/css" href="..\CSS\style.css">
</head>
<body>
    <header>
        <div class="topnav" id="myTopnav">
        <h2 class="brand">DELIMITER</h2>
          <?php
          if(!isset($_SESSION['user'])){
            echo "<a href='..\PHP\login.php'>Logowanie</a>";
          }
          else{
            echo "
            <div class='dropdown'>
            <button class='dropbtn'>".$user."
              <i class='fa fa-caret-down'></i>
            </button>
            <div class='dropdown-content'>
              <a href='#'>Link 1</a>
              <a href='#'>Link 2</a>
              <a href='..\PHP\logout.php'>Wyloguj się</a>
            </div>
            </div>
            ";
          }
          ?>
          <a href="..\PHP\shopping_cart.php">Koszyk</a>
          <a href="..\HTML\assembly.html">Składanie</a>
          <div class="dropdown">
            <button class="dropbtn">Produkty
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="..\PHP\products.php">Link 1</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </div>
          <a href="..\HTML\aboutus.html">O nas</a>
          <a href="..\HTML\contact.html">Kontakt</a>
          <a href="..\PHP\index.php">Strona Główna</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <script src="..\JS\menu.js"></script>
    </header>
    <main>
        <p class="featured_products">Wyróżnione produkty</p>
        <div class="border">
        <div class="slideshow-container">
          <div class="mySlides fade">
            <img src="..\images\cooling.jpg" style="width:100%">
          </div>
          
          <div class="mySlides fade">
            <img src="..\images\mouse.jpg" style="width:100%">
          </div>
          
          <div class="mySlides fade">
            <img src="..\images\monitor.jpg" style="width:100%">
          </div>
          </div>
        </div>
          <br>
          
          <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span>
            <script src="..\JS\featured.js"></script>
          </div>
    </main>
    <footer>
        <form class="contact_main">
          <p style="font-weight: bold;">Dane kontaktowe:</p>
          Telefon: <a class="cont_main_atrb" href="tel:+48 451 751 166">+48 451 751 166</a><br>
          E-mail: <a class="cont_main_atrb" href="mailto:deli@miter.pl">deli@miter.pl</a><br>
          Adres: <a target="_blank" class="cont_main_atrb" href="https://www.google.com/maps/place/Trocka+11,+03-563+Warszawa/@52.2750362,21.0534875,17z/data=!3m1!4b1!4m6!3m5!1s0x471ece9d984e5427:0x6ff3f3c1437bc46e!8m2!3d52.2750329!4d21.0556762!16s%2Fg%2F11h8y4tx0w">Warszawa, ul. Trocka 11</a><br><br>
          <a class="cont_main_atrb" href="statute.html">Regulamin</a><br>
          <a class="cont_main_atrb" href="statute.html">Polityka prywatności</a><br>
          <a class="cont_main_atrb" href="statute.html">Aktualności</a><br>
        </form>
    </footer>
</body>
</html>