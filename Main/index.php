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
    <title>Main</title>
    <link rel="stylesheet" href="main_style.css" >
    <link rel="stylesheet" href="../root.css" >
    <link rel="stylesheet" href="../left_panel_style.css" >
    <link rel="stylesheet" href="../right_panel_style.css" >
    <link rel="stylesheet" href="../sidebar_style.css" >
  
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
          <a href="/CarGNB/main/index.php" class="active">
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
          <a href="/CarGNB/support/support.php">
            <h3>Support</h3>
          </a>
          <a href="/CarGNB/login/logout.php">
            <h3>Logout</h3>
          </a>
          
        </div>
        </div>
      </div>
    
      <div id="right-panel">
        <div class="right-overlay">
          <h1>Hi, Where to park today?:)</h1>
          <p>Here is your Dashboard</p>
          <p>17:41 Rangsit, Pathumthani, Thailand</p>
          <p> Clear Sky 20% Raining</p>
          <h2>Your Favorite</h2>
          <div class="slot">
            <div class="slot-box">
              <h1>City Park</h1>
              <img src="guy.png" class="location-image">
              <div class="book-btn">
                <h1>BOOK NOW</h1>
              </div>
            </div>
            <div class="slot-box">
              <h1>Future Park</h1>
              <img src="guy.png" class="location-image">
              <div class="book-btn">
                <h1>BOOK NOW</h1>
              </div>
            </div>
            <div class="slot-box">
              <h1>Central Ladphrao</h1>
              <img src="guy.png" class="location-image">
              <div class="book-btn">
                <h1>BOOK NOW</h1>
              </div>
            </div>
          </div>
          <h2>Recent</h2>
          <div class="slot">
          <?php
             $sql3 = "SELECT * FROM booking,parking_lot WHERE booking.user_id = {$_SESSION["user_id"]} AND booking.pl_id = parking_lot.pl_id";
             $result3 = $mysqli->query($sql3);
             /*$sql4 = "SELECT * FROM booking WHERE booking.user_id = {$_SESSION["user_id"]}";
             $result4 = $mysqli->query($sql4);
             $parking3 = $result4->fetch_assoc();*/
             while( $parking2 = $result3->fetch_assoc()){
              
              echo '
            <div class="slot-box">
              <h1>'.$parking2["name"].'</h1>
              <img src="../upload/images/'.$parking2["image"].'" class="location-image">
              <div class="rate-btn">
              <a href="/CarGNB/review/review.php?pl_id='.$parking2['pl_id'].'" >
              
                <h1>RATE</h1>
            </a>
              </div>
            </div>
            ';
             }
            ?>
          </div>
          <input type="button" class="button_active" value="BOOK NOW" onclick="location.href='/CarGNB/Search/search.php?k=.&start=2022-11-23T12%3A47&end=2022-11-23T13%3A47';" />
            
          
        </div>

        <div class="news-overlay">
          <h1>Traffic News</h1>
          <p> Need not to know</p>
          <div class="news-slot">
            <div class="news-slot-box double-news-box1">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
            <div class="news-slot-box">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
            <div class="news-slot-box">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
            <div class="news-slot-box">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
            <div class="news-slot-box">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
            <div class="news-slot-box double-news-box2">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
            <div class="news-slot-box">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
            <div class="news-slot-box">
              <h1>Dinosaur Attack</h1>
              <h3>Traffic Jam Sukhumvit</h3>
            </div>
          </div>
        </div>

      </div>
    </div>

  </body>
</html>
