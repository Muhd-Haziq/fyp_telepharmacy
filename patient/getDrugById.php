<?php

include "../dbFunctions.php";

$isFound = false;
$drug = array();

if (isset($_POST['drug_id'])) {
    
    $drugId = $_POST['drug_id'];
    
    // SQL Statement to get Drug
    $drugQuery = "SELECT * " . 
                 "FROM drug " . 
                 "WHERE drug_id = $drugId ";
    // Retrieve Drug Row
    $result = mysqli_query($link, $drugQuery) or die(mysqli_error($link));
    
    if (mysqli_num_rows($result) == 1) {
        $isFound = true;
        $drug = mysqli_fetch_assoc($result);
    }
}

echo json_encode( array("drug" => $drug, "isFound" => $isFound) );
mysqli_close($link);


