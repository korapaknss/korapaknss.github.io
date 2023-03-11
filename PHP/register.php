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
    <form action="" method="post">
        <h3>Dane konta:</h3>
        <h4>Nazwa użytkownika:</h4> <input type="text" name="login" required><br>
        <h4>Email:</h4> <input type="email" name="email" required><br>
        <h4>Hasło:</h4>
        <h6>Hasło musi składać się z co najmniej 8 znaków i zawierać jedną wielką literę oraz znak specjalny</h6>
        <input type="password" name="password" required>
        <h4>Powtórz hasło:</h4> <input type="password" name="ctr_password" required><br>
        <input type="submit" name="register" value="Zarejestruj się!">
    </form>

    <?php
    if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])){
        $c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ctr_password = $_POST['ctr_password'];

        $q_em = mysqli_query($c, "SELECT * FROM clients WHERE email = '$email';");
        $q_lo = mysqli_query($c, "SELECT * FROM clients WHERE username = '$login';");
        echo mysqli_num_rows($q_lo);
        echo mysqli_num_rows($q_em);
        if(mysqli_num_rows($q_em) > 0){
            echo "<br>Podany adres email jest już w użyciu!";
        }
        else if(mysqli_num_rows($q_lo) > 0){
            echo "<br>Nazwa użytkownika jest zajęta!";
        }
        else if($password == $ctr_password){
            mysqli_query($c, "INSERT INTO clients(username, email, password) VALUES('$login', '$email', '$password');");
            echo "<br>Pomyślnie dodano użytkownika!";
        }
        else{
            echo "<br>Hasła nie są takie same!";
        }
        mysqli_close($c);
    }
    
    // $name = $_POST['name'];
    // $surname = $_POST['surname'];
    // $birthdate = $_POST['birthdate'];
    // $ctr_password = $_POST['ctr_password'];
    // $country = $_POST['country'];
    // $city = $_POST['city'];
    // $postal_code = $_POST['postal_code'];
    // $street = $_POST['street'];
    // $house_num = $_POST['house_num'];
    // $apart_num = $_POST['apart_num'];
    // $phone_num = $_POST['phone_num'];
    ?>
</body>
</html>