<?php
include 'dbFunctions.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM patient WHERE email='$email' and password='$password'";
$result = mysqli_query($link, $query) or die (mysqli_error($link));

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $row["authenticated"] = true;
} else {
    $row["authenticated"] = false;
}

echo json_encode($row);

?>