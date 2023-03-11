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
        Numer mieszkania: <input type="number" name="apart_num"><br>
        Numer telefonu: <input type="number" name="phone_num"><br>
        <input type="checkbox" name="regular">Czy chcesz zapisać się do programu stałego klienta i otrzymywać specjalne zniżki?<br>
        <input type="submit" name="done" value="Zatwierdź">
    </form>

    <?php
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];
    $ctr_password = $_POST['ctr_password'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $street = $_POST['street'];
    $house_num = $_POST['house_num'];
    $apart_num = $_POST['apart_num'];
    $phone_num = $_POST['phone_num'];
    ?>
</body>
</html>