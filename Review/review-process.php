<?php
session_start();
$mysqli = require __DIR__ . "/connect.php";



$sql = " INSERT INTO reviews(comment,rating,pl_id) VALUES ('{$_POST['comment']}',{$_POST['rate']},{$_SESSION['pl_id']});";

$result = $mysqli->query($sql);


?>