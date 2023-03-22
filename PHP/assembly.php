<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKLEP KOMPUTEROWY</title>
    <link rel="stylesheet" type="text/css" href="..\CSS\style2.css">
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
        <div class="img-comp-container">
            <div class="img-comp-img">
              <img src="..\images\build.jpg" width="800" height="450px">
            </div>
            <div class="img-comp-img img-comp-overlay">
              <img src="..\images\parts.jpg" width="800" height="450px">
            </div>
        </div>
        <div class="text_ass">
          <h1>Spełniamy twoje marzenia!</h1>
          <p>Kupiłeś części, lecz nie wiesz co z nimi zrobić? A może nie masz czasu na zabawę z kablami? Nie martw się! Zrobimy to za Ciebie! Oferujemy darmowe składanie w przypadku zakupu całego zestawu części w naszym sklepie! Wystarczy, że w koszyku zaznaczysz opcję "Składanie w salonie"!</p>
          <p>Zestaw powinien składać się z: <b>obudowy, płyty głównej, zasilacza, procesora, chłodzenia CPU, karty graficznej, przynajmniej jednego dysku oraz przynajmniej jednej kości RAM!</b></p>
          <p>Gwarantujemy staranne wykonanie oraz zapakowanie! W przypadku uszkodzeń spowodowanych w trakcie przesyłki zwrócimy CI twoje pieniądze! Dodatkowo w przypadku problemów z komputerem za zakup przy pomocy tej opcji zyskujesz <b>35% zniżki</b> na serwisowanie twojego urządzenia w naszym salonie!</p>
          <p>Dlatego nie maranuj czasu i spróbuj już dziś!</p><br><br><br>
          <p class="small_txt">*(W przypadku zaznaczenia opcji, lecz nie posiadaniu w koszyku wystarczającej ilości części do złożenia całego urządzenia przesłane zostaną same części!)</p>
        </div>
        <script src="..\JS\compare.js"></script>
            <script>
                initComparisons();
            </script>  
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
    <script>
        initComparisons();
    </script>
</body>
</html>