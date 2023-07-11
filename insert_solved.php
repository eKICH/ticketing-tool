<?php
include 'db.php';

// Escape user inputs for security
$date_created = $mysqli->real_escape_string($_POST['date_created']);
$ticketid = $mysqli->real_escape_string($_POST['ticketid']);
$account = $mysqli->real_escape_string($_POST['account']);
$category = $mysqli->real_escape_string($_POST['category']);
$description = $mysqli->real_escape_string($_POST['description']);
$reporter = $mysqli->real_escape_string($_POST['reporter']);
$assignee = $mysqli->real_escape_string($_POST['assignee']);
$solution = $mysqli->real_escape_string($_POST['solution']);
 
 	 
// Attempt insert query execution
if(mysqli_query($mysqli, "INSERT INTO solved(date_created, ticketid, account, category, description, reporter, assignee, solution) VALUES('" . $date_created . "', '" . $ticketid . "', '" . $account . "', '" . $category . "', '" . $description . "', '" . $reporter . "', '" . $assignee . "', '" . $solution . "')")) {
     echo '1';
	 header("Location:http://localhost/TicketingMain/open_tickets.php");
} else {
       echo "Error: " . $sql . "" . mysqli_error($mysqli);
}
 
    mysqli_close($mysqli);
?>