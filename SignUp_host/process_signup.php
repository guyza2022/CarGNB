<?php

$mysqli = require __DIR__ . "/connect.php";

if (empty($_POST["username"])) {
    die("Userame is required") ;
    
}
    
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

$sql = "INSERT INTO host (username , email, password_hash, create_date)
VALUES (?, ?, ?, NOW()) ";



$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["username"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {
    header("Location: Signup2.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}