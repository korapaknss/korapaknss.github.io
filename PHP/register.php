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