<?php
session_start();
include '../Private/connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $book = $_POST['BoekNaam'];
    $author = $_POST['Schrijver'];
    $genre = $_POST['Genre'];
    $isbn = $_POST['ISBN'];
    $language = $_POST['Taal'];
    $pages = $_POST['Pagina'];
    $inStock = $_POST['Voorraad'];

    try{

        // insert query
        $sql = 'INSERT INTO tblBooks (BoekNaam, Schrijver, Genre, ISBN, Taal, Pagina, Voorraad) VALUE (:bookName,:author,:genre,:ISBN,:language,:page,:stock) ';

        // prepare query for execution
        $stmt = $conn->prepare($sql);

        // bind the parameters
        $stmt->bindParam(':bookName', $book);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':ISBN', $isbn);
        $stmt->bindParam(':language',$language);
        $stmt->bindParam(':page',$pages);
        $stmt->bindParam(':stock', $inStock);

        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }

    }
        // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }

}

header('location: ../index.php?page=Boektoevoegen');


?>
