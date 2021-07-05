<?php

include "../dbFunctions.php";

$orders = array();
$isEmpty = true;

if (isset($_POST['patient_id'])) {
    
    $patientId = $_POST['patient_id'];
    
    // SQL Statement to get Orders
    $ordersQuery = "SELECT * " . 
                   "FROM orders " . 
                   "WHERE patient_id = $patientId AND order_status != 'Completed' " . 
                   "ORDER BY order_date_time DESC";

    //echo $ordersQuery;

    // Retrieve Order Rows
    $result = mysqli_query($link, $ordersQuery) or die(mysqli_error($link));

    while($row = mysqli_fetch_assoc($result)) {
      $orders[] = $row;  
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


