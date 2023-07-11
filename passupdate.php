<?php
//include database connection
include "db.php";

//Declare variables

$password = $mysqli->real_escape_string($_POST['password']);
$repassword = $mysqli->real_escape_string($_POST['repassword']);



//update query
$sql = "UPDATE users SET password='$_POST[password]',repassword='$_POST[repassword]' WHERE email='$_POST[email]'";

//execute the query

if(mysqli_query($mysqli,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>