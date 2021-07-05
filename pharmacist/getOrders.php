<?php

include "../dbFunctions.php";

$isEmpty = true;

// SQL Statement to get Order
$ordersQuery = "SELECT * " . 
               "FROM orders " . 
               "ORDER BY order_id DESC";

//echo $ordersQuery;

// Retrieve Order Rows
$result = mysqli_query($link, $ordersQuery) or die(mysqli_error($link));

$orders = array();
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

echo json_encode( array("orders" => $orders, "isEmpty" => $isEmpty) );
mysqli_close($link);


