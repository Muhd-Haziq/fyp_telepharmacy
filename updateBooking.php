<?php
include "dbFunctions.php";

$booking_id = $_POST["booking_id"];
$timing = $_POST["timing"];

$query = "UPDATE booking SET timing = '$timing' WHERE booking_id = $booking_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if($result)
{
    $row["status"] = $result;
    $row["message"] = "Booking record is updated successfully.";
}else
{
    $row["status"] = $result;
    $row["message"] = "Booking update unsuccessful.";
}

mysqli_close($link);

echo json_encode($row);
?>
