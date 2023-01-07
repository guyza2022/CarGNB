<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/connect.php";
    
    $sql = "SELECT * FROM user
            WHERE user_id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    $id = $_GET['id'];
    $sql2 = "SELECT * FROM parking_lot where pl_id = ".$id."";
            
    $result2 = $mysqli->query($sql2);
    
    $parking = $result2->fetch_assoc();


    $_SESSION["booking"] = $_GET["id"];


    


    $nearbyMarkers = array();
    $marker_request = "SELECT latitude,longtitude FROM parking_place LIMIT 10";
    $marker_result = $mysqli->query($marker_request);
    while($marker=$marker_result->fetch_assoc()){
        array_push($nearbyMarkers,$marker);
    }
    
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Booking</title>
    <link rel="stylesheet" href="Booking_style.css" >
    <link rel="stylesheet" href="../root.css" >
    <link rel='stylesheet' type='text/css' href="maps.css">
    <script src="maps-web.min.js"></script>
    <script src="services-web.min.js"></script>
  </head>
  <body>
    
    <div id="box-form">
        <div id="booking-left-panel">
            <div class="booking-left-panel-overlay">
                <div class="search-panel">
                    <div class="location-bar">
                        <h3><input type="text" id="query" name="k" value="<?php echo $parking['name'];?>" /></h3>
                        
                    </div>
                    <div class="time-bar">
                        <h2>FROM</h2>
                        <div class="time-fill-bar">
                        <?php 
                        $start = explode('T',$_SESSION["starttime"]);
                        $start1 = $start[0]. ' '. $start[1].":00";
                        echo ($start1);?>
                        </div>
                        <h2>TO</h2>
                        <div class="time-fill-bar">
                        <?php 
                        $end = explode('T',$_SESSION["endtime"]);
                        $end1 = $end[0]. ' '. $end[1].":00";
                        echo ($end1);?>
                        </div>
                        </div>
                    <button onclick="search()" class="search-button"><h1>SEARCH</h1></button>
                </div>
                
                
                <div class="result-display">
                
                    
                    <?php /*
                    $sql3 = "SELECT * FROM booking, parking_lot WHERE booking.pl_id = parking_lot.pl_id AND 
                    (check_in_date NOT BETWEEN '".$start1.":00' AND '".$end1.":00') AND
                    (check_out_date NOT BETWEEN '".$start1.":00' AND '".$end1.":00');";*/

                    $sql5 = "SELECT * FROM amenities WHERE pl_id =".$id.";";
                            
                    $result5 = $mysqli->query($sql5);
                                        
                    $parking5 = $result5->fetch_assoc();
                    $x=1;

                    
                    
                    $sql3 = 'SELECT * FROM parking_lot where pl_id in (SELECT distinct parking_lot.pl_id FROM booking RIGHT JOIN parking_lot ON booking.pl_id = parking_lot.pl_id AND (
                        ("'.$start1.'"> check_in_date AND "'.$start1.'"< check_out_date) OR (
                        "'.$end1.'" > check_in_date AND "'.$end1.'" < check_out_date)))';


                    $result3 = $mysqli->query($sql3);
                  
                    while( $parking2 = $result3->fetch_assoc()){
                        $sql6 = "SELECT * FROM amenities WHERE pl_id =".$parking2['pl_id'].";";
                            
                    $result6 = $mysqli->query($sql6);
                                        
                    $parking6 = $result6->fetch_assoc();
                
                      
                        
                    echo'
                    <a href="/CarGNB/booking/booking.php?id='.$parking2['pl_id'].'&gay=1" >
                    <div class="result-display-box">
                        <div class="result-display-box-info">
                            <div class="location-image-overlay">
                            <img src="../upload/images/'.$parking2["image"].'"class="location-image">
                            <h3>4.8</h3>
                            </div>
                            <div class="location-info-overlay">
                                <div class="location-info">
                                    <h1>'.$parking2["name"].'</h1>
                                    <h2>86/22 Klong Nueng, Phrathum Thani</h2>
                                    <h3>Amenities</h1>
                                </div>
                                <div class="amenities-image-overlay">
                                    <img src="../upload/images/am/'.$parking6["image"].'"class="aminities-image">
                                    <img src="../upload/images/am/'.$parking6["image2"].'"class="aminities-image">
                                    <img src="../upload/images/am/'.$parking6["image3"].'"class="aminities-image">
                                    <h1>35THB</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    ';
                    }?>
                </div>
            </div>
        </div>




    <div id="booking-right-panel">
        <div class="booking-right-panel-overlay">
            <div class="map-panel-overlay">
                <div class="map-top">
                    <div class="nav-panel">
                        <h1>NAVIGATOR</h1>
                        <div class="nav-fill-box">
                            <h3>Select your current location</h3>
                        </div>
                        <div class="nav-fill-box">
                           
                            
                            <?php
                            echo '<h3>' .$parking['name'].'<h3>';
                            ?>

                        </div>
                    </div>
                    <div class="side-profile-panel">
                        <div class="side-profile-overlay">
                            <img src="../guy.png" class="side-profile-image">
                            <span>
                            <?php if (isset($user)): ?>
        
                                <p>Hello <?= htmlspecialchars($user["username"]) ?></p>
                                
                                <p><a href="logout.php">Log out</a></p>
                                
                                <?php else: ?>
                                
                                    <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
                                
                                <?php endif; ?>
                              <h2>Mazda2 จง2022</h2>
                            </span>
                            <h4>Balance : 20THB</h4>
                        </div>
                    </div>
                </div>
                <div class="map">
                    <div id="tt-map"></div>
                    <div id="distance"></div>
                    <script>
                        var nearbyMarkers = <?php echo json_encode($nearbyMarkers) ?>;
                    </script>
                    <script src="tt_booking.js"></script>
                    
                    <div class="book-button">
                       
                        <?php echo'
                        <a href="booking-process.php";>' ?>
                        
                        <h1>BOOK</h1></div> </a>
                </div>
            </div>
            <div class="full-info-overlay">
            <?php

               


            if (isset($_GET['gay'])) {
                
                echo '
                <div class="info-grid-overlay">
                    <div class="info-header">
                        <h2>'.$parking["name"].'</h1>
                        <h3>'.$parking["price"].' bath/hour</h2>
                        <h4>There are '.$parking["amount"].' left</h3>
                    </div>
                </div>
                <h1>Pictures</h1>
                <div class="info-grid-overlay2">
                    <div class="info-image-box">
                    <img src="../upload/images/'.$parking["image"].'" ></div>
                    <div class="info-image-box">
                    <img src="../upload/images/'.$parking["image2"].'" ></div>
                    <div class="info-image-box">
                    <img src="../upload/images/'.$parking["image3"].'" ></div>
                </div>
                <h1>Amenities</h1>
                <div class="info-grid-overlay2">
                    <div class="info-image-box">
                    <img src="../upload/images/am/'.$parking5["image"].'" ></div>
                    <div class="info-image-box">
                    <img src="../upload/images/am/'.$parking5["image2"].'" ></div>
                    <div class="info-image-box">
                    <img src="../upload/images/am/'.$parking5["image3"].'" ></div>
                </div>
                '?>

                <h1>Reviews</h1>
                <div class="review-overlay">
                <?php 
                $sql9 = "SELECT *
                FROM booking
                INNER JOIN parking_lot
                ON booking.pl_id = parking_lot.pl_id
                INNER JOIN user
                ON booking.user_id = user.user_id
                INNER JOIN reviews
                ON booking.pl_id = reviews.pl_id
                WHERE parking_lot.pl_id =".$id.";";
                $result9 = $mysqli->query($sql9);
                //print_r ($result4->fetch_assoc());
                while( $parking9 = $result9->fetch_assoc()){
                    echo '
                
                
                    <div class="review-box">
                        <img src="../guy.png" class="reviewer-profile-image">
                        <span>
                            <h3>'.$parking9["first_name"].' '.$parking9["last_name"].'</h3>
                            <h4>XXXX</h4>
                            <h5>13 NOV 2022</h5>
                        </span>
                        <div class="review-text">
                            <h3>'.$parking9["comment"].'</h3>

                        </div>
                    </div>
                    
                ';
                
        
                }
                
            }
            else{
                echo '<img src="guy.png" class="gay">';
                
        
            }
            ?>
            </div>

            </div>
        </div>
    </div>
    </div>
  </body>
</html>

