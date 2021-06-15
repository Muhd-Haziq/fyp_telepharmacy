<?php

include "dbFunctions.php";

// SQL query returns multiple database records.
$query = "SELECT * FROM conference ORDER by id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    $row["id"] = intval($row["id"]);
    $row["room_name"] = strval($row["room_name"]);
    $row["participants"] = intval($row["participants"]);
    $allUsers[] = $row;
}
mysqli_close($link);

echo json_encode($allUsers);
?>
