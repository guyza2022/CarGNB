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
    <link rel="stylesheet" href="../host_style.css" >
    <link rel="stylesheet" href="../root.css" >
    <link rel="stylesheet" href="../left_panel_style.css" >
    <link rel="stylesheet" href="../right_panel_style.css" >
    <link rel="stylesheet" href="../sidebar_style.css" >
    <link rel="stylesheet" href="../upload_style.css" >
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
          </span>
        </div>
        <div class="left-overlay">
          
        <span>
          <ul>
            <li> <a href="">Member <br> Gold</a></li>
            <li> <a href="">Balance <br> 20 THB</a></li>
            <li> <a href="">Points <br>781</a></li>
        </ul>
        </span>
        <div class="sidebar">
          <a href="">
            <h3>Dashboard</h3>
          </a>
          <a href="#">
            <h3>Account</h3>
          </a>
          <a href="#" class="active">
            <h3>Parking Place</h3>
          </a>
          <a href="#">
            <h3>Lots Manager</h3>
          </a>
          <a href="#">
            <h3>Support</h3>
          </a>
          <a href="#">
            <h3>Logout</h3>
          </a>
          
        </div>
        </div>
      </div>
    
      <div id="right-panel">
      <div class="right-overlay">
          <h1>Add Parking Place</h1>
          <form action="ul.php" method="post" enctype="multipart/form-data">
            <div class="txt_field">
              <input type="text" required id="name" name="name">
              <span></span>
              <label>Name</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="price" name="address">
              <span></span>
              <label>Address</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="size" name="province">
              <span></span>
              <label>Province</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="width" name="district">
              <span></span>
              <label>District</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="length" name="city">
              <span></span>
              <label>City</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="height" name="postcode">
              <span></span>
              <label>Postcode</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="amount" name="latitude">
              <span></span>
              <label>Latitude</label>
            </div>

            <div class="txt_field">
              <input type="text" required id="floor" name="longtitude">
              <span></span>
              <label>Longtitude</label>
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
