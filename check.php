<?php 
include "db.php";

if(isset($_POST['email']))
{
	$sql = "SELECT * FROM users WHERE email = '".$_POST['email']."'";
	$result = mysqli_query($mysqli, $sql);
	echo mysqli_num_rows($result);
	
}

?>