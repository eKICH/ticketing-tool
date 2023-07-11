<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email']; 
$password = $_POST['password']; 
$level = $_POST['level']; 


if (!empty($first_name) || !empty($last_name) || !empty($email) || !empty($password) || !empty($level)){

	$host = 'localhost';
	$dbusername = 'root';
	$dbpassword = '';
	$dbname = 'tickets';


	// connection

	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()) {
		
		die('connect error(' . mysqli_connect_errno().')' . mysqli_connect_error());
	} else {

	$SELECT = "SELECT email From users Where email = ? Limit 1";
	$INSERT = "INSERT Into users (first_name, last_name, email, password, level) values ('$first_name', '$last_name', '$email', '$password', '$level')";

	//prepare statement

	$stmt = $conn->prepare($SELECT);
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->bind_result($email);
	$stmt->store_result();
	$rnum = $stmt->num_rows;

	if ($rnum==0) {
		$stmt->close();

		$stmt->bind_param("sssss", $first_name, $last_name, $email, $password, $level);
		$stmt->execute();
		echo "New User Inserted Successfully";
	}else{

		echo "This email already exists.";
	}

	$stmt->Close();
	$conn->Close();
}

} else {
	echo "All fields are required";
	die();
} 

?>
