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
        Hasło musi mieć długość od 8 do 20 znaków i zawierać jedną wielką literę oraz znak specjalny<br>
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

        session_start();
        $_SESSION['log_check'] = $login;

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        $q_em = mysqli_query($c, "SELECT * FROM clients WHERE email = '$email';");
        $q_lo = mysqli_query($c, "SELECT * FROM clients WHERE username = '$login';");
        if(mysqli_num_rows($q_em) > 0){
            echo "<br>Podany adres email jest już w użyciu!";
        }
        else if(mysqli_num_rows($q_lo) > 0){
            echo "<br>Nazwa użytkownika jest zajęta!";
        }
        else if(strlen($password) >= 8 && strlen($password) >= 8 && $uppercase && $lowercase && $number && $specialChars){
            if($password == $ctr_password){
                mysqli_query($c, "INSERT INTO clients(username, email, password) VALUES('$login', '$email', '$password');");
                header("Location: address_data.php");
            }
            else{
                echo "<br>Hasła nie są takie same!";
            }
        }
        else{
            echo "<br>Hasło jest niepoprawne!";
        }
        mysqli_close($c);
    }
    
    
    ?>
</body>
</html>