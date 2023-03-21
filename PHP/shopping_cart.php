<?php
session_start();

if(isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])){
    $id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    $c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
    $q = mysqli_query($c, "SELECT id, image, name, price, qt_in_stock FROM products WHERE id = " . $_POST['product_id'] . ";");
    $product = mysqli_fetch_assoc($q);
    mysqli_close($c);

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

    header("Location: shopping_cart.php");
}
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Koszyk</title>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        //if(isempty($_SESSION['cart']))
        ?>
    </body>
</html>