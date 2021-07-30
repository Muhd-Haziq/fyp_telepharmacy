<?php
include 'dbFunctions.php';

$id = $_GET['patient_id'];

$query = "SELECT * FROM user WHERE patient_id='$id'";
$result = mysqli_query($link, $query) or die (mysqli_error($link));

$queryCon = "SELECT * FROM user WHERE consultant_id ='$id'";
$resultCon = mysqli_query($link, $queryCon) or die (mysqli_error($link));

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $row["role"] = strval($row["role"]);
} else if((mysqli_num_rows($resultCon) == 1)){
    $row = mysqli_fetch_assoc($resultCon);
    $row["role"] = strval($row["role"]);
} else {
    $row["role"] = "nil";
}

echo json_encode($row);

?>