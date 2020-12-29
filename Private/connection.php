<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=bookonshelf", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Je bent verbonden :-)";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>