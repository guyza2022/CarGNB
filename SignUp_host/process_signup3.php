<?php

$mysqli = require __DIR__ . "/connect.php";

if (empty($_POST["facebook"])) {
    die("Facebook is required") ;
    
}
        
 if (empty($_POST["instagram"])) {
    die("Instagram is required") ;
    
}
    
if (strlen($_POST["telephone"]) < 10) {
    die("Phone number is invalid");
    
}

$sql2 = "SELECT * FROM host ORDER BY host_id DESC LIMIT 1";
$result = $mysqli->query($sql2);
$user = $result->fetch_assoc();
//$sql = "INSERT INTO user (facebook, instagram, telephone, address)
//VALUES (?, ?, ?, ?) ";
$sql = "UPDATE host SET facebook = ?, instagram = ?, telephone = ?, address = ? WHERE host_id = $user[host_id]";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST["facebook"],
                  $_POST["instagram"],
                  $_POST["telephone"],
                  $_POST["address"]);
                  
if ($stmt->execute()) {

    header("Location: ../Login_host/Login.php");
    exit;
    
} 