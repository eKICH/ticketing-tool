<?php
//include database connection
include "db.php";

//Declare variables

$newfname = $mysqli->real_escape_string($_POST['newfname']);
$newlname = $mysqli->real_escape_string($_POST['newlname']);
$newemail = $mysqli->real_escape_string($_POST['newemail']);
$newlevel = $mysqli->real_escape_string($_POST['newlevel']);
$newstatus = $mysqli->real_escape_string($_POST['newstatus']);


//update query
$sql = "UPDATE users SET first_name='$_POST[newfname]',last_name='$_POST[newlname]',email='$_POST[newemail]',level='$_POST[newlevel]',status='$_POST[newstatus]' WHERE id='$_POST[id]'";

//execute the query

if(mysqli_query($mysqli,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>