<!DOCTYPE html>
<html lang="pl">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logowanie</title>
        <link rel="stylesheet" type="text/css" href="..\CSS\style3.css">
</head>
<body>
    <header>
        <h1>Logowanie do Sklepu</h1>
    </header>
    <div class="log">
    <form class="log_form" action="" method="post">
        Nazwa użytkownika lub email: <input type="text" name="login" required><br><br>
        Hasło: <input type="password" name="password" required><br><br><br>
        <input class="press" type="submit" name="log" value="Zaloguj się!">
    <p>Nie masz konta? <a href="register.php">Zarejestruj się!</a></p>
    </form>
    </div>
    <?php
    if(isset($_POST['login']) && isset($_POST['password'])){
        $c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');
        $login = $_POST['login'];
        $password = $_POST['password'];

        $q_lo = mysqli_query($c, "SELECT * FROM clients WHERE username = '$login';");
        $q_lo1 = mysqli_query($c, "SELECT * FROM clients WHERE email = '$login';");
        $q_pas = mysqli_query($c, "SELECT * FROM clients WHERE username = '$login' AND password = '$password';");
        $q_pas1 = mysqli_query($c, "SELECT * FROM clients WHERE email = '$login' AND password = '$password';");
        if(mysqli_num_rows($q_lo) > 0){
            if(mysqli_num_rows($q_pas) > 0){
                session_start();
                $_SESSION['user'] = $login;
                header('Location: ..\PHP\index.php');
            }
            else{
                echo "<br>Niepoprawne hasło!";
            }
        }
        else if(mysqli_num_rows($q_lo1) > 0){
            if(mysqli_num_rows($q_pas1) > 0){
                session_start();
                $_SESSION['user'] = $login;
                header('Location: ..\PHP\index.php');
            }
            else{
                echo "<br>Niepoprawne hasło!";
            }
        }
        else{
            echo "<br>Niepoprawna nazwa użytkownika lub email";
        }
        mysqli_close($c);
    }
    ?>
</body>
</html>