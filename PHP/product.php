<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
?>

<?php
$q = mysqli_query($c, "SELECT id, name, price, qt_in_stock FROM products;");
while($row = mysqli_fetch_assoc($q)){
    echo "<div>" . $row['name'] ."<br>". " Cena: " . $row['price'] . "zł <br> Ilość w magazynie: " . $row['qt_in_stock'] . "<br><input type='number' name='quantity' value='1' min='1' max='" . $row['qt_in_stock'] . "'><input type='hidden' name='id' value='" . $row['id'] . "'> <input class='addtocart' type='submit' value='Dodaj do koszyka'></div><br>";
}
mysqli_close($c);
?>

<?php
if(isset($_POST['id'], $_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])){
    $id = (int)$_POST['id'];
    $quantity = (int)$_POST['quantity'];

    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id] += $quantity;
        } 
        else {
            $_SESSION['cart'][$id] = $quantity;
        }
    } 
    else {
        $_SESSION['cart'] = array($id => $quantity);
    }
}
?>