<?php

include "../dbFunctions.php";

$isUploaded = false;

if ( $_FILES['presc']['size'] != 0 && isset($_POST['room_id']) ) {
    
    $fileArr = $_FILES['presc'];
//    echo "<pre/>";
//    print_r($fileArr);
//    echo "<pre/>";
    
    $fileName = basename($fileArr['name']); 
    $path = "../prescFiles/$fileName";
    
    // (1) Move File from Temp Location to Path Specified
    $isMoved = move_uploaded_file($fileArr['tmp_name'], $path);

    if ($isMoved) {
        
        // (2) Insert File Name to Consulation Table
        $roomId = $_POST['room_id'];
        
        $insertQuery = "UPDATE consultation "
                     . "SET prescription_doc = '$fileName' "
                     . "WHERE room_id = $roomId ";
        
        $status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));
        
        if ($status) {
            $isUploaded = true;
        }
    }
   
}

echo json_encode( array("isUploaded" => $isUploaded) );
mysqli_close($link);
