<?php
session_start();
error_reporting(E_ALL);

//
include '../Private/connection.php';
//
$sql = 'SELECT * FROM users';
$sth = $conn->prepare($sql);
$sth->execute();
//
//if($rsUser = $sth->fetch(PDO::FETCH_ASSOC)){
//    if ($_POST['password'] == $rsUser['Wachtwoord']) {
//        $_SESSION['ingelogd'] = 'Beheerder';
////        header('location: ../index.php?page=dashbord');
//    } else {
//        $_SESSION['Melding'] = 'Gegevens kloppen niet, probeer het opnieuw!';
////        header('location: ../index.php?page=Home');
//    }
//
//} else {
//    $_SESSION['Melding'] = 'Gebruikers naam en of wachtwoord onbekend';
////    header('location: ../index.php?page=Home');
//
//}

echo 'Hello World';


?>



