<?php
session_start();
include "../Private/connection.php";

$bookID = $_POST['id'];
$sql = 'SELECT Voorraad FROM tblBooks WHERE ID = :bookID';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':bookID', $bookID);
$stmt->execute();
$inStock = $stmt->fetch(PDO::FETCH_NUM)[0];

$sql = 'SELECT COUNT(*) FROM tblBorrowedBooks WHERE FK_BookID = :bookID AND startdate IS NOT NULL AND enddate is NULL';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':bookID', $bookID);
$stmt->execute();

$booksBorrowed = $stmt->fetch(PDO::FETCH_NUM)[0];

$totalInStock = $inStock - $booksBorrowed;

if ($totalInStock >= 1){
    $startDate = date('Y-m-d');
    $sql = 'INSERT INTO tblBorrowedBooks(FK_UserID, FK_BookID, startdate) VALUES (:UserID, :BookID, :startdate) ';
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':UserID', $_SESSION['userID']);
    $stmt->bindParam(':BookID', $bookID);
    $stmt->bindParam(':startdate', $startDate );
} else {
    $sql = 'INSERT INTO tblBorrowedBooks(FK_UserID, FK_BookID) VALUES (:UserID, :BookID) ';
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':UserID', $_SESSION['userID']);
    $stmt->bindParam(':BookID', $bookID);
}

$stmt->execute();
header('location: ../index.php?page=Geleendeboeken');
