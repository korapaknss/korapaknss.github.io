<?php
session_start();
$c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
if(isset($_SESSION['user'])){
    $q = mysqli_query($c, "SELECT * FROM clients WHERE username LIKE '" . $_SESSION['user'] . "';");
    $user = mysqli_fetch_assoc($q);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane</title>
    <link rel="stylesheet" type="text/css" href="..\CSS\style3.css">
</head>
<body>
    <header><h1>Podaj dane adresowe:</h1></header>
    <div class="reg">
        
        <form class="reg_form" action="" method="post" style="font-weight: bold;">
            <?php if (isset($_SESSION['user'])): ?>
            Imię: <input type="text" name="name" value="<?php echo $user['first_name'] ?>" required>&nbsp
            Nazwisko: <input type="text" name="surname" value="<?php echo $user['last_name'] ?>" required>&nbsp
            Kraj: <input type="text" name="country" value="<?php echo $user['country'] ?>" required>&nbsp
            Miasto: <input type="text" name="city" value="<?php echo $user['city'] ?>" required>&nbsp
            Kod pocztowy: <input type="text" name="postal_code" value="<?php echo $user['postal_code'] ?>" required><br><br>
            Ulica: <input type="text" name="street" value="<?php echo $user['street'] ?>" required>&nbsp
            Numer domu: <input type="number" name="house_num" value="<?php echo $user['house_number'] ?>" required>&nbsp
            Numer mieszkania: <input type="number" name="apart_num" value="<?php echo $user['apartment_number'] ?>" required><br><br>
            Numer telefonu: <input type="number" name="phone_num" value="<?php echo $user['phone_number'] ?>" required><br><br>
            <?php else: ?>
            Imię: <input type="text" name="name" required>&nbsp
            Nazwisko: <input type="text" name="surname" required>&nbsp
            Kraj: <input type="text" name="country" required>&nbsp
            Miasto: <input type="text" name="city" required>&nbsp
            Kod pocztowy: <input type="text" name="postal_code" required><br><br>
            Ulica: <input type="text" name="street" required>&nbsp
            Numer domu: <input type="number" name="house_num" required>&nbsp
            Numer mieszkania: <input type="number" name="apart_num" required><br><br>
            Numer telefonu: <input type="number" name="phone_num" required><br><br>
            <?php endif; ?>
            <input type="submit" name="done" value="Zatwierdź">
        </form>
        
    </div>

    <?php
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['postal_code']) && isset($_POST['street']) && isset($_POST['house_num']) && isset($_POST['apart_num']) && isset($_POST['phone_num'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $postal_code = $_POST['postal_code'];
        $street = $_POST['street'];
        $house_num = $_POST['house_num'];
        $apart_num = $_POST['apart_num'];
        $phone_num = $_POST['phone_num'];

        $postal_code_valid = preg_match( '/^([0-9]{2})(-[0-9]{3})?$/i', $postal_code);

        if(!$postal_code_valid){
            echo "<br>Podaj prawidłowy kod pocztowy!";
        }
        else if(strlen($phone_num) != 9){
            echo "<br>Podaj prawidłowy numer telefonu!";
        }
        else{
            mysqli_query($c, "INSERT INTO transactions(price, client_id) VALUES(" . $_SESSION['cart_price'] . ", " . $user['id'] . ")");
            mysqli_close($c);
            header("Location: ..\PHP\ordered.php");
        }
    }
    ?>
</body>
</html>