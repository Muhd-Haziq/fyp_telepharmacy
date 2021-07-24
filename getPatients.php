<?php

include "dbFunctions.php";

// SQL query returns multiple database records.
$query = "SELECT * FROM patient ORDER by patient_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    $row["patient_id"] = intval($row["patient_id"]);
    $row["nric"] = strval($row["nric"]);
    $row["first_name"] = strval($row["first_name"]);
    $row["last_name"] = strval($row["last_name"]);
    $row["gender"] = strval($row["gender"]);
    $row["phone"] = strval($row["phone"]);
    $row["address"] = strval($row["address"]);
    $row["email"] = strval($row["email"]);
    $allUsers[] = $row;
}
mysqli_close($link);

echo json_encode($allUsers);
?>
