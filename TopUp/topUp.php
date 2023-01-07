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
    <title>TopUp</title>
    <link rel="stylesheet" href="topUp_style.css" >
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
        <a href="/CarGNB/main/index.php">
            <h3>Dashboard</h3>
          </a>
          <a href="/CarGNB/TopUp/TopUp.php" class="active">
            <h3>Wallet</h3>
          </a>
          <a href="/CarGNB/account/account.php">
            <h3>Account</h3>
          </a>
          <a href="#">
            <h3>Vehicles</h3>
          </a>
          <a href="/CarGNB/support/support.php" >
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
          <div class ="first_coloum">
            <h1>WALLET</h1>
            <div class = "balance">
              <p>CURRENT BALANCE</p> 
              <p>20 THB</p>
            </div>
          </div>
          <div class="second-column">
            <div class="money">
              <button type="button"> 20
              </button>
              <button type="button"> 50
              </button>
              <button type="button"> 100
              </button>
             <br>
              <button type="button"> 200
              </button>
              <button type="button"> 500
              </button>
              <button type="button"> 1000
              </button>
            </div>
          </div>
          <input type="submit" value="PAY NOW">
          <img src="guy.png" class="qr">
        </div>

        <div class="news-overlay">
          
          <div class="recent-orders">
            <h2> Recent Payment</h2>
            <table>
                <thead>
                     <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th></th>
                     </tr>
                </thead>
                <tbody>
                     <tr>
                      <td>27 August 2022</td>
                      <td>1000</td>
                      <td>Cash</td>
                      <td class="warning" >Pending</td>
                      <td class="primary" >Details</td>
                    </tr>
                    <tr>
                      <td>23 August 2022</td>
                      <td>50</td>
                      <td>Credit Card</td>
                      <td class="warning" >Completed</td>
                      <td class="primary" >Details</td>
                     </tr>
                    <tr>
                      <td>18 August 2022</td>
                      <td>20</td>
                      <td>Mobile Banking</td>
                      <td class="warning" >Completed</td>
                      <td class="primary" >Details</td>
                    </tr>
                </tbody>
            </table>
             <a href="#">Show All</a>
        </div>
        
        
        </div>

        <form method="post">
          
        </form>
      </div>
    </div>

  </body>
</html>

