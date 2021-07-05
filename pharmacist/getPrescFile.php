<?php

include "../dbFunctions.php";

$isEmpty = true;
$fileName = "";

if ( isset($_POST['room_id']) ) {
            
    // Get the filename in Room
    $roomId = $_POST['room_id'];

    $query = "SELECT prescription_doc " .
             "FROM consultation " .
             "WHERE room_id = $roomId ";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if (mysqli_num_rows($result) == 1) {
        $isEmpty = false;
        $fileName = mysqli_fetch_assoc($result)['prescription_doc'];
    }
   
}

echo json_encode( array("isEmpty" => $isEmpty, "fileName" => $fileName) );
mysqli_close($link);

