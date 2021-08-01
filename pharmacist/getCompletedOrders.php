<?php

include "../dbFunctions.php";

$isEmpty = true;

// SQL Statement to get Order
$ordersQuery = "SELECT * " . 
               "FROM orders " .
               "WHERE order_status = 'completed' " .
               "ORDER BY order_id DESC";

//echo $ordersQuery;

// Retrieve Order Rows
$result = mysqli_query($link, $ordersQuery) or die(mysqli_error($link));

$orders = array();
while($order = mysqli_fetch_assoc($result)) {
    $orderId = $order["order_id"];
    $drugs = array();
    
    $itemsQuery = "SELECT D.drug_id, drug_name, drug_price, order_drug_qty, drug_image_filename " . 
                  "FROM order_drug OD " . 
                  "INNER JOIN drug D " .
                  "ON OD.drug_id = D.drug_id " .
                  "WHERE order_id = $orderId ";
    $drugsResult = mysqli_query($link, $itemsQuery) or die(mysqli_error($link));
    
    while($drug = mysqli_fetch_assoc($drugsResult)) {
             $drugs[] = $drug;
    }
        
    // Add the Item Drugs as one of the props of Order
    $order["item_drugs"] = $drugs;
    $orders[] = $order;  
}

if (!empty($orders)) {
    $isEmpty = false;
}

// Check Array of Row
// echo "<pre/>";
// print_r($orders);
// echo "<pre/>";

echo json_encode( array("orders" => $orders, "isEmpty" => $isEmpty) );
mysqli_close($link);


