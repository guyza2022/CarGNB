


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Main</title>
  
    <link rel="stylesheet" href="main_style.css" >
    
    
  </head>
  <body>
    <div id="box-form">
      <div id="left-panel">
        <div class="profile">
          <img src="guy.png" class="img-box">
          <span style = "text-align: left;">
            <h1>Boonyakorn</h1>
            <h1>Rathasamuth</h1>
            <h2>Mazda2 จง2022</h2>
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
        <h1>Vehicle</h1>
        <div class="vehicle-type">
          <button type="button"> Mazda2
          </button>
          <button type="button"> Mazda69
          </button>
          <button type="button"> Mazda6969
          </button>
        </div>
        

        </div>
      </div>
    
      <div id="right-panel">
        <div class="right-overlay">
          <h1>CHOOSE YOUR LOCATION</h1>
          <p display:inline>BOOK FOR Mazda2</p>
          

          <form action="" method="GET" name="">
            <div class="txt_field">
              
              <td><input type="text" required name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" /></td>
              
              <label>Find Location Here...</label>
            </div>
           
            <div class="Duration">
              <div class="time_field">
                <input type="datetime-local" name = "start">
               
                <label>Start</label>
              </div>
              <div class="time_field">
                <input type="datetime-local" required name = "end">
                
                <label>End</label>
              </div>
             
          </div>
      
          <td><input type="submit" name="" value="Search" /></td>
            
          
          </form>
        </div>

        
      
      </div>
    </div>

  </body>
</html>

<?php

if(isset($_GET['k']) && $_GET['k'] != ''){
$k = trim($_GET['k']);


$search_string = "SELECT * FROM parking_lot WHERE ";
$display_words = "";
					

$name = explode(' ', $k);		


foreach ($name as $word){
	$search_string .= "name LIKE '%".$word."%' OR ";
	$display_words .= $word.' ';
}

$search_string = substr($search_string, 0, strlen($search_string)-4);
$display_words = substr($display_words, 0, strlen($display_words)-1);


$conn  = require __DIR__ . "/connect.php";

//$result=$mysqli->query($q)

$query = mysqli_query($conn, $search_string);
$result_count = mysqli_num_rows($query);


echo '<div class="right"><b><u>'.number_format($result_count).'</u></b> results found</div>';
echo 'Your search for <i>"'.$display_words.'"</i><hr />';




if ($result_count > 0){

	
	echo '<table class="search">';

	
	while ($row = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td><h3><a href="/CarGNB/booking/booking.php?id='.$row['pl_id'].'">'.$row['name'].'</a></h3></td>
		</tr>
		<tr>
			<td>'.$row['price'].'</td>
		</tr>
		<tr>
			<td><i>'.$row['size'].'</i></td>
		</tr>';
    

	}
	
	
	echo '</table>';


}
else
	echo 'There were no results for your search. Try searching for something else.';

}

echo $_GET['start'];
session_start();
            
            session_regenerate_id();
            
            $_SESSION["starttime"] = $_GET['start'];
            $_SESSION["endtime"] = $_GET['end'];


?>

