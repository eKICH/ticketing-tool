<?php
require('db.php');


$id=$_REQUEST['id'];
$query = "DELETE FROM new_ticket WHERE id=$id"; 
$result = mysqli_query($mysqli,$query) or die ( mysqli_error());
header("Location: http://localhost/TicketingMain/open_tickets.php"); 
?>