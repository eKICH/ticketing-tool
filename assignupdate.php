<?php
//include database connection
include "db.php";

//Declare variables

$newaccount = $mysqli->real_escape_string($_POST['newaccount']);
$newcategory = $mysqli->real_escape_string($_POST['newcategory']);
$newreporter = $mysqli->real_escape_string($_POST['newreporter']);
$newdescription = $mysqli->real_escape_string($_POST['newdescription']);
$newstatus = $mysqli->real_escape_string($_POST['newstatus']);
$newassign = $mysqli->real_escape_string($_POST['newassign']);

//update query
$sql = "UPDATE new_ticket SET account='$_POST[newaccount]',category='$_POST[newcategory]',reporter='$_POST[newreporter]',description='$_POST[newdescription]',status='$_POST[newstatus]',assignedto='$_POST[newassign]' WHERE id='$_POST[id]'";

//execute the query

if(mysqli_query($mysqli,$sql))
	header("refresh:1; url=");
else
	echo"Not updated";
?>