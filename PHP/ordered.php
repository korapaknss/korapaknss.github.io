<?php
session_start();
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamówienie złożone!</title>
</head>
<body>
    <h1>Twoje zamówienie zostało złożone!</h1>
    <h3><a href="..\PHP\index.php">Powrót na stronę główną</a></h3>
</body>
</html>