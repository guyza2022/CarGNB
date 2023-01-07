<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "cargnb");
  include_once 'connect.php'; 

  // Initialize message variable
  $msg = "";
  $x=0;

  // If upload button is clicked ...
  if(isset($_POST['submit'])){ 
    // File upload configuration 
    $targetDir = "images/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "'$fileName.',"; 
                    $x++;
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        $insertValuesSQL .= "NOW(),";
       
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 


        
      
        if(!empty($insertValuesSQL) && $x == 3){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $db->query("INSERT INTO parking_lot (image,image2,image3, uploaded_on, name,price,size,width,length,height,amount,floor,vehicle_type,pp_id) 
            VALUES ($insertValuesSQL,'{$_POST["name"]}',{$_POST["price"]},{$_POST["size"]},{$_POST["width"]},{$_POST["length"]},
            {$_POST["height"]},{$_POST["amount"]},{$_POST["floor"]},'{$_POST["vehicle_type"]}','{$_POST["place"]}');"); 
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
echo $statusMsg;

    $sql2 = "SELECT pl_id FROM parking_lot order by pl_id desc limit 1";
    
    $result2 = $mysqli->query($sql2);
    
    $new = $result2->fetch_assoc();
    

@$sql = " INSERT INTO amenities(image,image2,image3,pl_id) VALUES ('{$_POST['c']}', '{$_POST['p']}', '{$_POST['u']}', {$new['pl_id']});";

$result = $mysqli->query($sql);



 
?>