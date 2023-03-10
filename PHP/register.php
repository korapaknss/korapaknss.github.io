<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <header><h1>Rejestracja do Sklepu</h1></header>
    <form action="..\PHP\register.php" method="post">
        <h3>Dane konta:</h3>
        Nazwa użytkownika: <input type="text" name="login" required><br>
        Imię: <input type="text" name="name" required><br>
        Nazwisko: <input type="text" name="surname" required><br>
        Data urodzenia: <input type="date" name="birthdate" required><br>
        Email: <input type="email" name="email" required><br>
        Hasło: <input type="password" name="password" required><br>
        Powtórz hasło: <input type="password" name="ctr_password" required><br>
        <input type="submit" name="register" value="Zarejestruj się!">
    </form>

    <?php
    $c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');

    $login = $_POST['login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ctr_password = $_POST['ctr_password'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $street = $_POST['street'];
    $house_num = $_POST['house_num'];
    $apart_num = $_POST['apart_num'];
    $phone_num = $_POST['phone_num'];

    if(mysqli_query($c, 'SELECT email FROM clients WHERE email = $email;' == $email)){
        echo "Podany adres email jest już w użyciu!";
    }


    mysqli_close($c);
    ?>
</body>
</html>