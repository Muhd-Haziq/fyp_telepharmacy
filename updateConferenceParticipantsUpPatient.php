<?php
include "dbFunctions.php";

$room_name = $_GET["room_name"];

$query = "UPDATE consultation SET participants = participants + 1 WHERE room_name = $room_name AND participants < 2";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if($result)
{
    $row["status"] = $result;
    $row["message"] = "Room participants is updated updwards successfully.";
}else
{
    $row["status"] = $result;
    $row["message"] = "Update unsuccessful.";
}

mysqli_close($link);

echo json_encode($row);
?>
