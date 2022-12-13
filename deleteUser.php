<?php
include "../controller/database.php";
$stmt = $conn->prepare("DELETE FROM user WHERE id=:id");
$stmt->bindValue(':id', $_GET['userid'], PDO::PARAM_INT);
$stmt->execute(); 
header('Location: index.php');


