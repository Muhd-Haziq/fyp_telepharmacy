<?php

include "../dbFunctions.php";

$isEmpty = true;
$items = array();

if (isset($_POST['order_id'])) {
    
    $orderId = $_POST['order_id'];
    
    // SQL Statement to get Items
    $itemQuery = "SELECT D.drug_id, drug_brand, drug_name, drug_description, drug_price " . 
                 "FROM order_drug OD " . 
                 "INNER JOIN drug D " .
                 "ON OD.drug_id = D.drug_id " .
                 "WHERE order_id = $orderId ";

    //echo $itemQuery;

    // Retrieve Item Rows
    $result = mysqli_query($link, $itemQuery) or die(mysqli_error($link));
    
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }
    
    if (!empty($items)) {
        $isEmpty = false;
    }
}

echo json_encode( array("isEmpty" => $isEmpty, "items" => $items) );
mysqli_close($link);


