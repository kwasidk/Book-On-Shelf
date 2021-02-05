<?php
include '../Private/connection.php';

$borrowID = $_POST['id'];
$date = date('Y-m-d');
$reservation = (int)$_POST['reservation'];

$sql = 'Update tblBorrowedBooks SET enddate = :date WHERE ID = :ID';

$stmt = $conn->prepare($sql);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':ID', $borrowID);
$stmt->execute();

if ($reservation === 0 ){
    $sql = 'Select FK_BookID FROM tblBorrowedBooks WHERE ID = :ID';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $borrowID);
    $stmt->execute();
    $bookID = $stmt->fetch(PDO::FETCH_NUM)[0];

    $sql = 'SELECT ID FROM tblBorrowedBooks WHERE FK_BookID = :BookID AND startdate IS NULL and enddate is null';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':BookID', $bookID);
    $stmt->execute();
    $ID = $stmt->fetch(PDO::FETCH_NUM)[0] ?? false;

    if ($ID !== false){

        $sql = 'Update tblBorrowedBooks SET startdate = :date WHERE ID = :ID ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();

    }
    header('location: ../index.php?page=Geleendeboeken');
    exit();

} else {
    header('location: ../index.php?page=Reserveringen');

}







