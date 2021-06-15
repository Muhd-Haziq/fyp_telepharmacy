<?php
include "dbFunctions.php";

$room_id = $_GET["id"];

$query = "UPDATE conference SET participants = participants + 1 WHERE id = $room_id";
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
