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
            <li> <a href=""> Points <br>781</a></li>
        </ul>
        </span>
        <div class="sidebar">
          <a href="/cargnb/host/host.php" >
            <h3>Dashboard</h3>
          </a>
          <a href="/cargnb/account_host/account.php">
            <h3>Account</h3>
          </a>
          <a href="/cargnb/parking_place/parking_place.php" >
            <h3>Parking Place</h3>
          </a>
          <a href="/cargnb/upload/upload.php" class="active">
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
          <h1>Upload</h1>
          <form action="ul.php" method="post" enctype="multipart/form-data">
            <div class="txt_field">
              <input type="text" required id="name" name="name">
              <span></span>
              <label>Name</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="price" name="price">
              <span></span>
              <label>Price</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="size" name="size">
              <span></span>
              <label>Size</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="width" name="width">
              <span></span>
              <label>Width</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="length" name="length">
              <span></span>
              <label>Lenght</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="height" name="height">
              <span></span>
              <label>Height</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="amount" name="amount">
              <span></span>
              <label>Amount</label>
            </div>

            <div class="txt_field">
              <input type="text" required id="floor" name="floor">
              <span></span>
              <label>floor</label>
            </div>
            <div class="txt_field">
              <input type="text" required id="vehicle_type" name="vehicle_type">
              <span></span>
              <label>Vehicle Type</label>
            </div>
            <label for="Amenities">Choose an amenities: </label>
            <br>
            <input type="checkbox" id="c" name="c" value="cctv.jpg"> 
            <label for="c"> Has CCTV?</label><br>
            <input type="checkbox" id="p" name="p" value="privacy.png">
            <label for="p"> Has private parking space?</label><br>
            <input type="checkbox" id="u" name="u" value="umbella.jpg">
            <label for="u"> Is it indoor?</label>
            <label for="cars">Choose a car:</label><br>
            <br>

            <?php
            $sql2 = "SELECT * FROM parking_place";
            
            $result2 = $mysqli->query($sql2);

           
            
            
            ?>

            <label for="place">Choose your place:</label>
            <select name="place" id="place">
              <?php
            while( $place = $result2->fetch_assoc()){
              echo' <option value='.$place["pp_id"].'>'.$place["name"].'</option> ';
              
            }
              ?>
              
            </select>
            <br>
            <br>
            <br>
            
            
              Select Image Files to Upload (3 images):
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
