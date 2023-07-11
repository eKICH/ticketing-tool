<?php

include 'db.php';
// Escape user inputs for security
$first_name = $mysqli->real_escape_string($_POST['first_name']);
$last_name = $mysqli->real_escape_string($_POST['last_name']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = $mysqli->real_escape_string($_POST['password']);
$level = $mysqli->real_escape_string($_POST['level']);
$status = $mysqli->real_escape_string($_POST['status']);

$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
// Attempt insert query execution
if(mysqli_query($mysqli, "INSERT INTO users(first_name, last_name, email, password, level, status) VALUES('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $hashedPwd . "', '" . $level . "', '" . $status . "')")) {
     echo '1';
} else {
       echo "Error: " . $sql . "" . mysqli_error($mysqli);
}

    mysqli_close($mysqli);
?>
