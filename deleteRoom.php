<?php
include "dbFunctions.php";
$id = $_POST["id"];

$query = "DELETE FROM consultation WHERE room_id='$id' ";

$status = mysqli_query($link, $query) or die(mysqli_error($link));

$row["success"] = $status;
mysqli_close($link);

echo json_encode($row);

?>