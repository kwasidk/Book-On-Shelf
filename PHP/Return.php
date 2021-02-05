<?php
include '../Private/connection.php';

$borrowID = $_POST['id'];
$date = date('Y-m-d');

$sql = 'Update tblBorrowedBooks SET enddate = :date WHERE ID = :ID';

$stmt = $conn->prepare($sql);

$stmt->bindParam(':date', $date );
$stmt->bindParam(':ID', $borrowID);

$stmt->execute();


header('location: ../index.php?page=Geleendeboeken');






