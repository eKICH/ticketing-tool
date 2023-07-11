<?php

if(isset($_POST['exportclosed'])){
	// Include Db
	include "db.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Closed_Tickets_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','Account','Category','Reporter','Description','Solution','Status','Assigned To','Date Created','Date Closed'));
	$query ="SELECT * FROM new_ticket WHERE status='Closed' ORDER BY id ASC";
	$result = mysqli_query($mysqli, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>