<?php

include "../dbFunctions.php";

$isUpdated = false;

if ( isset($_POST['order_id']) && isset($_POST['order_status']) ) {

    $orderId = $_POST['order_id'];
    $orderStatus = $_POST['order_status'];

    $updateQuery = "UPDATE orders "
                 . "SET order_status = '$orderStatus' "
                 . "WHERE order_id = $orderId ";
    //echo $updateQuery;
    $status = mysqli_query($link, $updateQuery) or die(mysqli_error($link));

    if ($status) {
        $isUpdated   = true;
    }
    
}

echo json_encode( array("isUpdated" => $isUpdated) );
mysqli_close($link);
