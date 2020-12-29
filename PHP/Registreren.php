<?php
session_start();
include "Private/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['Email'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $straat = $_POST['Straat'];
    $huisnummer = $_POST['Huisnummer'];
    $postcode = $_POST['Postcode'];
    $woonplaats = $_POST['Woonplaats'];
    $wachtwoord = $_POST['wachtwoord'];
    $wachtwoordConfirm = $_POST['confirm_password'];
    $geboortedatum = $_POST['Geboortedatum'];
    $rol = 'Klant';

    $sql = 'INSERT INTO tblUsers (Voornaam, Tussenvoegsel, Achternaam, Email, Straat, Huisnummer, Postcode, Woonplaats, Wachtwoord, Geboortedatum, Rol) 
VALUES (:firstname,:tussenvoegsel,:lastname,:email,:straat,:huisnummer,:postcode,:woonplaats,:wachtwoord,:geboortedatum,:rol)';

    $stmt = $conn->prepare($sql);


    $stmt->bindParam(':firstname',$firstName);
    $stmt->bindParam(':tussenvoegsel',$tussenvoegsel);
    $stmt->bindParam(':lastname',$lastName);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':straat',$straat);
    $stmt->bindParam(':huisnummer',$huisnummer);
    $stmt->bindParam(':postcode',$postcode);
    $stmt->bindParam(':woonplaats',$woonplaats);
    $stmt->bindParam(':wachtwoord',$wachtwoord);
    $stmt->bindParam(':geboortedatum',$geboortedatum);
    $stmt->bindParam(':rol',$rol);


    $stmt->execute();

    header('location: ../index.php?page=Home');


}