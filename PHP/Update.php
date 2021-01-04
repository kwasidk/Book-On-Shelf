<?php

    $id= isset($_POST['id']) ? $_POST['id'] : die('ERROR: Record ID niet gevonden.');


    include '../Private/connection.php';


    try {

        $sql = "SELECT * FROM tblBooks WHERE ID = ? LIMIT 0,1";
        $stmt = $conn->prepare( $sql );
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $bookName = $row['BoekNaam'];
        $author = $row['Schrijver'];
        $genre = $row['Genre'];
        $isbn = $row['ISBN'];
        $language = $row['Taal'];
        $pages = $row['Pagina'];
        $stock = $row['Voorraad'];

        $updateBook = $conn->prepare('Update tblBooks Set BoekNaam = :BoekNaam, Schrijver = :Schrijver, Genre = :Genre, ISBN = :ISBN, Taal = :Taal, Pagina = :Pagina, Voorraad = :Voorraad WHERE ID = :id');

        $updateBook->execute(array(
            ':id'=>$id,
            ':BoekNaam' => $_POST['BoekNaam'],
            ':Schrijver'=> $_POST['Schrijver'],
            ':Genre'=>$_POST['Genre'],
            ':ISBN'=>$_POST['ISBN'],
            ':Taal'=>$_POST['Taal'],
            ':Pagina'=>$_POST['Pagina'],
            ':Voorraad'=>$_POST['Voorraad']
        ));
    }

    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }

    header('location: ../index.php?page=boekenoverzicht');