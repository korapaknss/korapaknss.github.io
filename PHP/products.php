<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Produkty</title>
        <meta charset="utf-8">
        <!--<link rel="stylesheet" type="text/css" href="..\CSS\style4.css">-->
    </head>

    <body>
        <table>
            <tr>
                <th>Zdjęcie</th>
                <th>Produkt</th>
                <th>Cena</th>
                <th>Ilość w magazynie</th>
            </tr>
            <?php
            $q = mysqli_query($c, "SELECT id, image, name, price, qt_in_stock FROM products;");
            while($row = mysqli_fetch_assoc($q)){
                echo "<tr><td><img src='" . $row['image'] . "' style='width: 100px;'></td><td><a href='..\PHP\product.php'>" . $row['name'] . "</a></td><td>" . $row['price'] . "</td><td>" . $row['qt_in_stock'] . "</td></tr>";
            }
            mysqli_close($c);
            ?>
        </table>
    </body>
</html>