<?php

include "dbFunctions.php";

$patient_id = $_GET["patient_id"];

// SQL query returns multiple database records.
$query = "SELECT * FROM booking b "
        . "INNER JOIN patient p ON b.patient_id = p.patient_id "
        . "WHERE b.patient_id = '$patient_id'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    $row["booking_id"] = intval($row["booking_id"]);
    $row["patient_id"] = intval($row["patient_id"]);
    $row["timing"] = strval($row["timing"]);
    $allUsers[] = $row;
}
mysqli_close($link);

echo json_encode($allUsers);
?>
