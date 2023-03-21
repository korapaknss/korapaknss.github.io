<?php
session_start();

if(isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])){
    $id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    $c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
    $q = mysqli_query($c, "SELECT id, image, name, price, qt_in_stock FROM products WHERE id = " . $_POST['id'] . ";");
    $product = mysqli_fetch_assoc($q);
    mysqli_close($c);

    if($product && $quantity > 0){
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
}

if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;

if ($products_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));

    $pdo = new PDO('mysql:host=localhost;dbname=sklep_komputerowy;charset=utf8', 'root', '');
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Koszyk</title>
        <meta charset="utf-8">
    </head>

    <body>
        <h1>Twój koszyk:</h1>
        <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Produkt</td>
                    <td>Cena</td>
                    <td>Ilość</td>
                    <td>W sumie</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Twój koszyk jest pusty!</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="..\PHP\product.php?&id=<?=$product['id']?>">
                            <img src="<?=$product['image']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="..\PHP\product.php?&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="..\PHP\shopping_cart.php?&remove=<?=$product['id']?>" class="remove">Usuń</a>
                    </td>
                    <td class="price"><?=$product['price']?> zł</td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['qt_in_stock']?>" required>
                    </td>
                    <td class="price"><?=$product['price'] * $products_in_cart[$product['id']]?> zł</td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Suma</span>
            <span class="price"><?=$subtotal?> zł</span>
        </div>
    </form>
    </body>
</html>