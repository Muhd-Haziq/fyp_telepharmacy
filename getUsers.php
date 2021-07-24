<?php

include "dbFunctions.php";

// SQL query returns multiple database records.
$query = "SELECT * FROM user ORDER by user_id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    $row["user_id"] = intval($row["user_id"]);
    $row["patient_id"] = intval($row["patient_id"]);
    $row["consultant_id"] = strval($row["consultant_id"]);
    $row["role"] = strval($row["role"]);
    $allUsers[] = $row;
}
mysqli_close($link);

echo json_encode($allUsers);
?>
