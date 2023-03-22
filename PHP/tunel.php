<?php
session_start();
if (isset($_POST['clear'])){
    unset($_SESSION['cart']);
    header("Location: ..\PHP\shopping_cart.php");
}
else if(isset($_POST['placeorder'])){
    header("Location: ..\PHP\order.php");
}
?>