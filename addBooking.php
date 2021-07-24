<?php
include "dbFunctions.php";

$patient_id = $_POST["patient_id"];
$timing = $_POST["timing"];

$query = "INSERT INTO booking (patient_id, timing) VALUES ('$patient_id', '$timing')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if($result)
{
    $row["status"] = $result;
    $row["message"] = "Booking record is inserted successfully.";
}else
{
    $row["status"] = $result;
    $row["message"] = "Booking unsuccessful.";
}

mysqli_close($link);

echo json_encode($row);
?>
