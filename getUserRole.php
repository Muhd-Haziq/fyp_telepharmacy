<?php
include 'dbFunctions.php';

$id = $_GET['patient_id'];

$query = "SELECT role FROM user WHERE patient_id='$id'";
$result = mysqli_query($link, $query) or die (mysqli_error($link));

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $row["role"] = strval($row["role"]);
} else  {
    $row["role"] = "consultant";
}

echo json_encode($row);

?>