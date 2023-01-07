<?php
$mysqli = require __DIR__ . "/connect.php";
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
    
 }
    
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
    
}
    
if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter") ;
    
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}
    
if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

 if ($_POST["password"] !== $_POST["conpassword"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST[ "password" ] , PASSWORD_DEFAULT) ;




$sql = "UPDATE user SET username = ?, first_name = ?, last_name = ?, email = ?, password_hash = ?,facebook = ?,
instagram = ?,telephone = ?, address = ? WHERE user_id = {$_POST['user_id']}";
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssssss",
                  $_POST["username"],
                  $_POST["first_name"],
                  $_POST["last_name"],
                  $_POST["email"],
                  $password_hash,
                  $_POST["facebook"],
                  $_POST["instagram"],
                  $_POST["telephone"],
                  $_POST["address"],);
                  
if ($stmt->execute()) {

    header("Location: ../account/account.php?s=1");
    exit;
}
?>