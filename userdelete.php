<?php
include 'db.php';


$User_ID=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$User_ID";
$result = mysqli_query($mysqli,$query) or die ( mysqli_error($mysqli));
header("Location:http://localhost/TicketingMain/users.php");

?>
