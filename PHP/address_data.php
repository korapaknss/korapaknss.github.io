<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <header><h1>Rejestracja do Sklepu</h1></header>
    <form action="" method="post">
        <h3>Dane adresowe:</h3>
        Imię: <input type="text" name="name" required><br>
        Nazwisko: <input type="text" name="surname" required><br>
        Data urodzenia: <input type="date" name="birthdate" required><br>
        Kraj: <input type="text" name="country" required><br>
        Miasto: <input type="text" name="city" required><br>
        Kod pocztowy: <input type="text" name="postal_code" required><br>
        Ulica: <input type="text" name="street" required><br>
        Numer domu: <input type="number" name="house_num" required><br>
        Numer mieszkania: <input type="number" name="apart_num" required><br>
        Numer telefonu: <input type="number" name="phone_num" required><br>
        <input type="checkbox" name="regular">Czy chcesz zapisać się do programu stałego klienta i otrzymywać specjalne zniżki?<br>
        <input type="submit" name="done" value="Zatwierdź">
    </form>

    <?php
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthdate']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['postal_code']) && isset($_POST['street']) && isset($_POST['house_num']) && isset($_POST['apart_num']) && isset($_POST['phone_num'])){
        $c = mysqli_connect('localhost', 'root', '', 'sklep_komputerowy');

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $birthdate = $_POST['birthdate'];
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

        mysqli_query($c, "INSERT INTO clients(first_name, last_name, birthdate, country, city, postal_code, street, house_num, apart_num, phone_num) VALUES('$name', '$surname', '$birthdate', '$country', '$city', '$postal_code', '$street', '$house_num', '$apart_num', '$phone_num');");
    }
    ?>
</body>
</html>