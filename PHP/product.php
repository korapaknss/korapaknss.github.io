<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
$q = mysqli_query($c, "SELECT id, image, name, price, qt_in_stock FROM products WHERE id = " . $_GET['id'] . ";");
$product = mysqli_fetch_assoc($q);
mysqli_close($c);
?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <title>Produkt</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <img src="<?php echo $product['image'] ?>">
        <h1><?php echo $product['name'] ?></h1>
        <h4><?php echo $product['price'] ?> zł</h4>
        <h4>Ilość w magazynie: <?php echo $product['qt_in_stock'] ?></h4>
        <form action="shopping_cart.php" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?php $product['qt_in_stock'] ?>" required>
            <input type="hidden" name="product_id" value="<?php $product['id'] ?>">
            <input type="submit" value="Dodaj do koszyka">
        </form>
    </body>
</html>