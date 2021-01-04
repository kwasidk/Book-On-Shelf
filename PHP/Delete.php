<?php

include '../Private/connection.php';


// get record ID
// isset() is a PHP function used to verify if a value is there or not
$id = $_POST['id'];

// delete query
$sql = "DELETE FROM tblBooks WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

$stmt->execute();
header('Location: index.php?page=boekenoverzicht');

