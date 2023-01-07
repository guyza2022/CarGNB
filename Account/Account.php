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
    <title>Account</title>
    <link rel="stylesheet" href="Account_style.css" >
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
          <a href="/CarGNB/TopUp/TopUp.php" >
            <h3>Wallet</h3>
          </a>
          <a href="/CarGNB/account/account.php" class="active">
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
          <h1>Account Info</h1>
          <div class="image-name">
              <img src="../guy.png">
              <h3>user id: <?php echo $user['user_id']; ?></h3>
          </div>
          <h1>Edit Info</h1>
          <div class="edit-overlay">
          <form action = "account-process.php" method="post" novalidate>
          <div class="info-edit">
          </label><input type="hidden" required id="user_id" name="user_id" class="edit-text" value=<?php echo $user['user_id']; ?> readonly>
            <input type="text" required id="username" name="username" class="edit-text" placeholder="Username" value=<?php echo $user['username']; ?>>
            <input type="text" required id="middlename" name="email" class="edit-text" placeholder="E-mail" value=<?php echo $user['email']; ?>>
            <input type="password" required id="password" name="password" class="edit-text" placeholder="Password">
            <input type="password" required id="confirm-password" name="conpassword" class="edit-text" placeholder="Confirm password">
            <input type="text" required id="firstname" name="first_name" class="edit-text" placeholder="Firstname" value="<?php echo $user['first_name']; ?>">
            <input type="text" required id="lastname" name="last_name" class="edit-text" placeholder="Lastname" value=<?php echo $user['last_name']; ?>>
            <input type="text" required id="facebook" name="facebook" class="edit-text" placeholder="Facebook" value="<?php echo $user['facebook']; ?>">
            <input type="text" required id="instagram" name="instagram" class="edit-text" placeholder="Instagram" value="<?php echo $user['instagram']; ?>">
            <input type="text" required id="telephone" name="telephone" class="edit-text" placeholder="Telephone" value="<?php echo $user['telephone']; ?>">
            <input type="text" required id="address" name="address" class="edit-text" placeholder="Address" value="<?php echo $user['address']; ?>">
            <br>
            <?php
          if(@$_GET['s']){
            echo "  Successful";
          }
          ?>
          </div>
          <input type="submit" value="Apply">
          </form>
         
          </div>
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

      
      </div>
    </div>

  </body>
</html>

