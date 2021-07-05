<?php

include "../dbFunctions.php";

$isEmpty = true;
$drugs = array();
    
// SQL Statement to get Drugs
$drugsQuery = "SELECT * " . 
             "FROM drug " . 
             "WHERE drug_type = 'Over-the-counter' ";

// Retrieve Drug Rows
$result = mysqli_query($link, $drugsQuery) or die(mysqli_error($link));

if ($row = mysqli_fetch_assoc($result)) {
    $drugs[] = $row;
}

if (!empty($drugs)) {
    $isEmpty = false;
}


echo json_encode( array("drugs" => $drugs, "isEmpty" => $isEmpty) );
mysqli_close($link);


