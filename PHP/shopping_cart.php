<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');

if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
    // if(empty($cart)){
    //     echo "<h1>Twój koszyk jest pusty!</h1>";
    // }
    // else{
        echo "<h1>Twój koszyk:</h1>";
        echo "<form action='' method='post'>";
        foreach($_SESSION['cart'] as $id => $quan){
            echo "Id: " . $id . " Ilość: " . $quan . "  <input type='number' name='quantity' value='1' min='1' max='" . $quan . "'><input type='hidden' name='id' value='" . $id . "'><input type='submit' value='Usuń z koszyka'><br><br>";
        }
        echo "<input type='submit' name='clear' value='Wyczyść koszyk'>";
        echo "</form>";

        if(isset($_POST['id'], $_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])){
            $prod_id = (int)$_POST['id'];
            $quantity = (int)$_POST['quantity'];
        
            if (isset($_SESSION['cart'])) {
                $_SESSION['cart'][$prod_id] -= $quantity;
                if($_SESSION['cart'][$prod_id] == 0){
                    unset($_SESSION['cart'][$prod_id]);
                }
            }
            else {
                echo "<h1>Twój koszyk jest pusty!</h1>";
            }
        }
    //}
}
else{
    echo "<h1>Twój koszyk jest pusty!</h1>";
}
?>