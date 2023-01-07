<?php

session_start();

if (isset($_SESSION["host_id"])) {
    
    $mysqli = require __DIR__ . "/connect.php";
    
    $sql = "SELECT * FROM host
            WHERE host_id = {$_SESSION["host_id"]}";
            
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
    <link rel="stylesheet" href="upload_style.css" >
    <link rel='stylesheet' type='text/css' href="maps.css">
    <script src="maps-web.min.js"></script>
    <script src="services-web.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
          <a href="/cargnb/host/host.php" >
            <h3>Dashboard</h3>
          </a>
          <a href="/cargnb/account_host/account.php">
            <h3>Account</h3>
          </a>
          <a href="/cargnb/parking_place/parking_place.php"class="active" >
            <h3>Parking Place</h3>
          </a>
          <a href="/cargnb/upload/upload.php" >
            <h3>Lots Manager</h3>
          </a>
          <a href="/cargnb/support_host/support_host.php">
            <h3>Support</h3>
          </a>
          <a href="/cargnb/login/logout.php">
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
            <input type="text" id="query" name="k" value="">
            <div id="search-map"></div>
            <script src="select_map.js"></script>
            <button type="button" onclick="search()" name="search"><h1>SEARCH</h1></button>
            <input type="text" required id="lat" name="latitude">
            <input type="text" required id="lng" name="longtitude">            

            <br>
            <br>

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
