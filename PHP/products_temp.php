<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');

$q = mysqli_query($c, "SELECT id, name, price, qt_in_stock FROM products;");
echo "<form action='' method='post'><ul>";
while($row = mysqli_fetch_assoc($q)){
    echo "<li>" . $row['name'] . " " . $row['price'] . "zł " . $row['qt_in_stock'] . "</li><input type='submit' name='" . $row['id'] . "' value='Dodaj do koszyka'><li></li>";
}
echo "</ul></form>";

while($row1 = mysqli_fetch_assoc($q)){
    $id = $row1['id'];
    if(isset($_POST['2'])){
        echo "Wybrałeś coś!";
    }
}
?>