<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/connect.php";
    
    $sql = "SELECT * FROM user
            WHERE user_id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    
}
    ?>


    


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Host</title>
    <link rel="stylesheet" href="host_style.css" >
    <link rel="stylesheet" href="../root.css" >
    <link rel="stylesheet" href="../left_panel_style.css" >
    <link rel="stylesheet" href="../right_panel_style.css" >
    <link rel="stylesheet" href="../sidebar_style.css" >
    <link rel="stylesheet" href="upload_syle.css" >
  </head>
  <body>
    <div id="box-form">
      <div id="left-panel">
        <div class="profile">
          <img src="guy.png" class="img-box">
          <span style = "text-align: left;">
          <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["username"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
        <?php else: ?>
        
            <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
        <?php endif; ?>
        </div>
        <div class="left-overlay">
          
        <span>
          <ul>
            <li> <a href="">Member <br> Gold</a></li>
            <li> <a href="">Balance <br> 20 THB</a></li>
            <li> <a href=""> Points <br>781</a></li>
        </ul>
        </span>
        <div class="sidebar">
        <a href="/CarGNB/main/index.php">
            <h3>Dashboard</h3>
          </a>
          <a href="/CarGNB/TopUp/TopUp.php">
            <h3>Wallet</h3>
          </a>
          <a href="/CarGNB/account/account.php">
            <h3>Account</h3>
          </a>
          <a href="#">
            <h3>Vehicles</h3>
          </a>
          <a href="/CarGNB/support/support.php" class="active">
            <h3>Support</h3>
          </a>
          <a href="/CarGNB/login/logout.php" >
            <h3>Logout</h3>
          </a>
          
        </div>
        </div>
      </div>
    
      <div id="right-panel">
        <div class="right-overlay">
          <h1>Support Request</h1>
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="txt_field">
              <input type="text" required id="name" name="name">
              <span></span>
              <label>Title</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="price" name="price">
              <span></span>
              <label>Description</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="size" name="size">
              <span></span>
              <label>Telephone</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="amount" name="amount">
              <span></span>
              <label>E-mail</label>
            </div>
            
            
              Select Image Files to Upload:
              <input type="file" name="files[]" multiple >
              <input type="submit" name="submit" value="UPLOAD">
          </form>
          
        </div>



        <div class="history-overlay">
          <h1>History</h1>
          <p>15 last transaction</p>
          <div class="history">
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Lot</th>
                <th>Hours</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>27 August 2022</td>
                <td>Premium</td>
                <td>2.5</td>
                <td>75THB</td>
              </tr>
              <tr>
                <td>27 August 2022</td>
                <td>Premium</td>
                <td>2.5</td>
                <td>75THB</td>
              </tr>
              <tr>
                <td>27 August 2022</td>
                <td>Premium</td>
                <td>2.5</td>
                <td>75THB</td>
              </tr>
            </tbody>
          </table>
        </div>
        <form method="post">
          
        </form>
      </div>
    </div>

  </body>
</html>
