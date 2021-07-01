<?php

include "dbFunctions.php";

// SQL query returns multiple database records.
$query = "SELECT * FROM consultation ORDER by room_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    $row["room_id"] = intval($row["room_id"]);
    $row["patient_id"] = intval($row["patient_id"]);
    $row["consultant_id"] = intval($row["consultant_id"]);
    $row["room_name"] = strval($row["room_name"]);
    $row["participants"] = intval($row["participants"]);
    $row["prescription_doc"] = intval($row["prescription_doc"]);
    $allUsers[] = $row;
}
mysqli_close($link);

echo json_encode($allUsers);
?>
