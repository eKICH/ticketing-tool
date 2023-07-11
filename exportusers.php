<?php

if(isset($_POST['exportusers'])){
	// Include Db
	include "db.php";
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Users_Report.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array('Id','First Name','Last Name','Email','Level','Status','Date Created'));
	$query ="SELECT id,first_name,last_name,email,level,status,Date_Created FROM users ORDER BY id ASC";
	$result = mysqli_query($mysqli, $query);
	While($row = mysqli_fetch_assoc($result))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}

?>