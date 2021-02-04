<?php
include '../Private/connection.php';

$borrowID = $_POST['id'];

$sql = 'DELETE FROM tblBorrowedBooks WHERE ID = :ID ';

$stmt = $conn->prepare($sql);


$stmt->bindParam(':ID', $borrowID);

$stmt->execute();

header('location: index.php?page=Geleendeboeken');





