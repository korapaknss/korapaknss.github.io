<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
$q = mysqli_query($c, "SELECT id, image, name, price, qt_in_stock FROM products WHERE id = " . $_GET['id'] . ";");
$product = mysqli_fetch_assoc($q);
?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <title>Produkt</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1><?php echo $prodcut['name'] ?></h1>
    </body>
</html>

<?php

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