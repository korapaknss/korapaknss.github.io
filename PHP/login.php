<!DOCTYPE html>
<html lang="pl">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logowanie</title>
</head>
<body>
    <header>
        <h1>Logowanie do Sklepu</h1>
    </header>
    <form action="..\PHP\login.php" method="post">
        Nazwa użytkownika lub email: <input type="text" name="login"><br>
        Hasło: <input type="password" name="password"><br>
        <input type="submit" name="login" value="Zaloguj się!">
    </form>
    <p>Nie masz konta? <a href="register.php">Zarejestruj się!</a></p>

    <?php
    if(isset($_POST['login']) && isset($_POST['password'])){
        $c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
        $login = $_POST['login'];
        $password = $_POST['password'];

        $q_lo = mysqli_query($c, "SELECT * FROM clients WHERE username = '$login';");
        $q_lo1 = mysqli_query($c, "SELECT * FROM clients WHERE email = '$login';");
        if(mysqli_num_rows($q_lo) > 0){
            if(mysqli_query($c, "SELECT * FROM clients WHERE username = '$login' AND password = '$password';")){
                echo "<br>Pomyślnie zalogowano!";
            }
            else{
                echo "<br>Niepoprawne hasło!";
            }
        }
        else if(mysqli_num_rows($q_lo1) > 0){
            if(mysqli_query($c, "SELECT * FROM clients WHERE email = '$login' AND password = '$password';")){
                echo "<br>Pomyślnie zalogowano!";
            }
            else{
                echo "<br>Niepoprawne hasło!";
            }
        }
        else{
            echo "<br>Niepoprawna nazwa użytkownika lub email";
        }
    }
    ?>
</body>
</html>