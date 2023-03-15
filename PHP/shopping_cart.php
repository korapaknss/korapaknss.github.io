<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');

if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
    if(empty($cart)){
        echo "<h1>Twój koszyk jest pusty!</h1>";
    }
    else{
        echo "<h1>Twój koszyk:</h1>";
        $cart = $_SESSION['cart'];
        echo "<form action='' method='post'><ul>";
        foreach($cart as $id => $quan){
            echo "<li>Id: " . $id . " Ilość: " . $quan . "</li><input type='number' name='quantity' value='1' min='1' max='" . $quan . "'><input type='hidden' name='id' value='" . $id . "'><input type='submit' value='Usuń z koszyka'>";
        }
        echo "</ul></form>";

        if(isset($_POST['id'], $_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])){
            $prod_id = (int)$_POST['id'];
            $quantity = (int)$_POST['quantity'];
        
            if (array_key_exists($prod_id, $cart)) {
                $cart[$prod_id] -= $quantity;
            } 
            else {
                echo "<h1>Twój koszyk jest pusty!</h1>";
            }
        }

        $_SESSION['cart'] = $cart;
    }
}
?>