<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');

$q = mysqli_query($c, "SELECT id, name, price, qt_in_stock FROM products;");
echo "<form action='' method='post'><ul>";
$i = 0;
while($row = mysqli_fetch_assoc($q)){
    $i = $row['id'];
    strval($i);
    echo "<li>" . $row['name'] . " " . $row['price'] . "zł " . $row['qt_in_stock'] . "</li><input type='submit' name='" . $i . "' value='Dodaj do koszyka'><li></li>";
}
echo "</ul></form>";

while($row1 = mysqli_fetch_assoc($q)){
    if(isset($_POST['3'])){
        echo "Wybrałeś 3!";
    }
}
?>