<?php 
session_start();
$mysqli = require __DIR__ . "/connect.php";
                        $start = explode('T',$_SESSION["starttime"]);
                        $start1 = $start[0]. ' '. $start[1].":00";
                        echo ($start1);?>
                        </div>
                        <h2>TO</h2>
                        <div class="time-fill-bar">
                        <?php 
                        $end = explode('T',$_SESSION["endtime"]);
                        $end1 = $end[0]. ' '. $end[1].":00";
                        echo ($end1);
$sql = " INSERT INTO booking(pl_id,user_id,booking_date,check_in_date,check_out_date) 
VALUES ('{$_SESSION["booking"]}',{$_SESSION["user_id"]},NOW(),'".$start1."','".$end1."');";

$result = $mysqli->query($sql);

                        
                        
                        ?>