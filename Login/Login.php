<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/connect.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["user_id"];
            
            header("Location: ../../cargnb/Main/index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href="Login_style.css">
  </head>
 

  <body>
    <div class="box-form">
      <div class="left">
        <div class="overlay">
        <h1>Car GNB</h1>
        <p style="margin-left: 1em">Easy parking life</p>
        <span>
          <p>Are you a host?</p>
          <a href="/CarGNB/Login_host/login.php"><i class="fa fa-facebook" aria-hidden="true"></i> YES</a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> NO </a>
        </span>
        </div>
      </div>
    
      <div class="center">
        <h1>Log in</h1>

        <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

        <form method="post">
        <div class="txt_field">
            <input type="text" required id="email" name="email"
            >
            
            <label>Email Address</label>
          </div>
          <div class="txt_field">
            <input type="password" required id="password" name="password">
            
            <label>Password</label>
          </div>
          <div class="pass"><span style = "font-size: 11px;">Forgot Password?</span></div>
          <button>Log in</button>
      
         
          <div class="signup_link">
            New to CarGNB? <span style = "font-size: 14px;"><a href="Signup.html">Sign up</a></span>
          </div>
        </form>
      </div>
    </div>

  </body>
</html>
