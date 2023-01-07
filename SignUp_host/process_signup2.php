<?php

$mysqli = require __DIR__ . "/connect.php";

if (empty($_POST["first_name"])) {
    die("Firstname is required") ;
    
}
        
 if (empty($_POST["last_name"])) {
    die("Lastname is required") ;
    
}
    
if (strlen($_POST["citizen_id"]) < 13) {
    die("Citizen ID must be 13 characters");
    
}
$sql2 = "SELECT * FROM host ORDER BY host_id DESC LIMIT 1";
$result = $mysqli->query($sql2);
$user = $result->fetch_assoc();

//$sql = "INSERT INTO user (first_name, mid_name, last_name, citizen_id)
//VALUES (?, ?, ?, ?) ";
$sql = "UPDATE host SET first_name = ?, mid_name = ?, last_name = ?, citizen_id = ? WHERE host_id = $user[host_id]";
print_r ($sql);
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST["first_name"],
                  $_POST["mid_name"],
                  $_POST["last_name"],
                  $_POST["citizen_id"]);
                  
if ($stmt->execute()) {

    header("Location: Signup3.html");
    exit;
    
} 