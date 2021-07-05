<?php

include "../dbFunctions.php";

$isAdded = false;

if (isset($_POST['patient_id']) && isset($_POST['order_date_time']) && 
    isset($_POST['order_shipping_option']) && isset($_POST['order_shipping_address']) && 
    isset($_POST['order_total_price']) && isset($_POST['items']) )  {

    // (1) Insert Order
    $patientId              = $_POST['patient_id'];
    $orderStatus            = "Processing";
    $orderDateTime          = $_POST['order_date_time'];
    $order_shipping_option  = $_POST['order_shipping_option'];
    $order_shipping_address = $_POST['order_shipping_address'];
    $order_total_price      = $_POST['order_total_price'];

    $insertQuery = "INSERT INTO orders (patient_id, order_status, order_date_time, order_shipping_option, order_shipping_address, order_total_price) "
                 . "VALUES ($patientId, '$orderStatus', '$orderDateTime', '$order_shipping_option', '$order_shipping_address', $order_total_price) ";
    //echo $insertQuery;
    
    $status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));

    if ($status) {
        
        // (2) Get the Inserted Order
        $orderQuery = "SELECT order_id "
                    . "FROM orders "
                    . "WHERE order_date_time = '$orderDateTime' AND patient_id = $patientId ";

        $getOrderResult = mysqli_query($link, $orderQuery) or die(mysqli_error($link));

        if (mysqli_num_rows($getOrderResult) == 1) {
            $orderId = mysqli_fetch_assoc($getOrderResult)['order_id'];
            
            // (3) Insert Order Items
            $items = json_decode($_POST['items']);
            foreach ($items as $item) {
                // print_r($item); 
                // echo "<br/>";
                // echo $item->{'drug_id'} . "<br/>";   
                // echo $item->{'order_drug_qty'} . "<br/>";
                $drugId        = $item->{'drug_id'};
                $orderDrugQty = $item->{'order_drug_qty'};
                $insertItemQuery = "INSERT INTO order_drug (drug_id, order_id, order_drug_qty) "
                                 . "VALUES ($drugId, $orderId, $orderDrugQty) ";
                $insertQueryStatus = mysqli_query($link, $insertItemQuery) or die(mysqli_error($link));
                $isAdded = $insertQueryStatus;
            }
        } // end of get inserted order status
        
    } // end of order insertion status
   
}

echo json_encode( array("isAdded" => $isAdded) );
mysqli_close($link);
