<?php

include "../dbFunctions.php";
  
$isEmpty = true;
$drugs = array();

// SQL Statement to get Drugs  
$drugsQuery = "SELECT * " . 
              "FROM drug " . 
              "WHERE drug_in_stock != 0 AND drug_type = 'Over-the-counter' " .
              "ORDER BY drug_sales DESC ";

// Retrieve Drug Rows
$result = mysqli_query($link, $drugsQuery) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    $drugs[] = $row; 
}

if (!empty($drugs)) {
    $isEmpty = false;
}

echo json_encode(array("drugs" => $drugs, "isEmpty" => $isEmpty));

mysqli_close($link);
