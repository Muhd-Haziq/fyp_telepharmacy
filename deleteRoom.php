<?php
include "dbFunctions.php";
$room_name = $_POST["room_name"];

$query = "DELETE FROM consultation WHERE room_name='$room_name'";

$status = mysqli_query($link, $query) or die(mysqli_error($link));

$row["success"] = $status;
mysqli_close($link);

echo json_encode($row);

?>