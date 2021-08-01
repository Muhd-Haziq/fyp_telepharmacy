<?php

include "../dbFunctions.php";

$orders = array();
$isEmpty = true;

if ( isset($_POST['patient_id']) ) {
        
    $patientId = $_POST['patient_id'];
    
    
    // SQL Statement to get Orders
    $ordersQuery = "SELECT * " . 
                   "FROM orders " . 
                   "WHERE patient_id = $patientId AND order_status = 'Completed' " . 
                   "ORDER BY order_date_time DESC";

    //echo $ordersQuery;

    // Retrieve Order Rows
    $result = mysqli_query($link, $ordersQuery) or die(mysqli_error($link));

    while($order = mysqli_fetch_assoc($result)) {
        $orderId = $order["order_id"];
        $drugs = array();
        
        // Get Item Drugs of that Order
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
}

echo json_encode( array("orders" => $orders, "isEmpty" => $isEmpty) );
mysqli_close($link);

