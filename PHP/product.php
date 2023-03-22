<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
$q = mysqli_query($c, "SELECT id, image, name, price, qt_in_stock FROM products WHERE id = " . $_GET['id'] . ";");
$product = mysqli_fetch_assoc($q);
mysqli_close($c);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt</title>
    <link rel="stylesheet" type="text/css" href="..\CSS\style6.css">
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
              <a href='..\PHP\logout.php'>Wyloguj się</a>
            </div>
            </div>
            ";
          }
          ?>
          <a href="..\PHP\shopping_cart.php">Koszyk</a>
          <a href="..\PHP\assembly.php">Składanie</a>
          <a href="..\PHP\products.php">Produkty</a>
          <a href="..\PHP\contact.php">Kontakt</a>
          <a href="..\PHP\index.php">Strona Główna</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <script src="..\JS\menu.js"></script>
    </header>
    <main>
        <img src="<?php echo $product['image'] ?>">
        <h1><?php echo $product['name'] ?></h1>
        <h4><?php echo $product['price'] ?> zł</h4>
        <h4>Ilość w magazynie: <?php echo $product['qt_in_stock'] ?></h4>
        <form action="shopping_cart.php" method="post">
            <input class="quan" type="number" name="quantity" value="1" min="1" max="<?php echo $product['qt_in_stock'] ?>" required>
            <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
            <input class="butt" type="submit" value="Dodaj do koszyka">
        </form>
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