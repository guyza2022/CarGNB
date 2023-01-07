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
    <link rel="stylesheet" href="host_style.css" >
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
          <a href="" class="active">
            <h3>Dashboard</h3>
          </a>
          <a href="/cargnb/account_host/account.php">
            <h3>Account</h3>
          </a>
          <a href="/cargnb/parking_place/parking_place.php" >
            <h3>Parking Place</h3>
          </a>
          <a href="/cargnb/upload/upload.php">
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
          <h1>Hi, Add new space??:)</h1>
          <p>Here is your Dashboard</p>
          <p>17:41 Rangsit, Pathumthani, Thailand</p>
          <p> Clear Sky 20% Raining</p>
          <div class="parking-place-slot">
            <div class="place-slot active">
              <h1>My Home</h1>
            </div>
            <div class="place-slot">
              <h1>My Home2</h1>
            </div>
            <div class="place-slot">
              <h1>My Restaurant</h1>
            </div>
          </div>
          <h2>Avaliable Parking Space</h2>
          <div class="slot">
            <div class="slot-box">
              <h1>Premium</h1>
              <img src="guy.png" class="location-image">
              <div class="book-btn">
                <h1>5 AVAILABLE</h1>
              </div>
            </div>
            <div class="slot-box">
              <h1>Normal</h1>
              <img src="guy.png" class="location-image">
              <div class="book-btn">
                <h1>5 AVAILABLE</h1>
              </div>
            </div>
            <div class="slot-box">
              <h1>Motorcycle</h1>
              <img src="guy.png" class="location-image">
              <div class="book-btn">
                <h1>5 AVAILABLE</h1>
              </div>
            </div>
            <div class="slot-box">
              <h1>Covered</h1>
              <img src="guy.png" class="location-image">
              <div class="book-btn">
                <h1>5 AVAILABLE</h1>
              </div>
            </div>
          </div>


          <h2>Booked Parking Space</h2>
          <div class="booked-slot-overlay">
            <div class="booked-slot">
              <div class="booked-name-number">
                <h1>Premium</h1>
                <div class="booked-number">
                  <h1>5</h1>
                </div>
              </div>
              <div class="time-panel">
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="booked-slot">
              <div class="booked-name-number">
                <h1>Normal</h1>
                <div class="booked-number">
                  <h1>5</h1>
                </div>
              </div>
              <div class="time-panel">
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
                <div class="time-slot">
                  <div class="time-box">
                    <h1>12.00</h1>
                  </div>
                  <div class="time-box">
                    <h1>14.00</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="button" class="button_active" value="MANANGE" onclick="location.href='/CarGNB/Search/index.html';" />
            
          
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
