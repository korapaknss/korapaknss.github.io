<?php
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');

$q = mysqli_query($c, "SELECT name, price, qt_in_stock FROM products;");
echo "<ul>";
while($row = mysqli_fetch_assoc($q)){
    echo "<li>" . $row['name'] . " " . $row['price'] . "zł " . $row['qt_in_stock'] . "</li><input type='submit' name='add' value='Dodaj do koszyka'><li></li>";
}
echo "</ul>";
?>