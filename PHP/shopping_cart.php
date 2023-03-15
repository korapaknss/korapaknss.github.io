<?php
session_start();
echo "<h1>Twój koszyk:</h1>";

if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    print_r($cart);
    echo "<ul>";
    for($i=0 ; $i<count($cart) ; $i++){
        echo "<li>" . $cart[15];
    }
}
?>