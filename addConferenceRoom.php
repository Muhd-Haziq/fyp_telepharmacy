<?php
include "dbFunctions.php";

$room_name = $_POST["room_name"];

$query = "INSERT INTO conference (room_name) VALUES ('$room_name')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if($result)
{
    $row["status"] = $result;
    $row["message"] = "Room record is inserted successfully.";
}else
{
    $row["status"] = $result;
    $row["message"] = "Insert unsuccessful.";
}

mysqli_close($link);

echo json_encode($row);
?>
