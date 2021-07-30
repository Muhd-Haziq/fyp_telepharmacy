<?php
include 'dbFunctions.php';

$room_name = $_GET['room_name'];

$query = "SELECT * FROM consultation WHERE room_name='$room_name'";
$result = mysqli_query($link, $query) or die (mysqli_error($link));

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
} else {
    $row["fail"] = "unable to retrieve";
}

echo json_encode($row);

?>