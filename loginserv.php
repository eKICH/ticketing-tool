<?php
include 'db.php';
session_start();

$error='';
$success='';

if(isset($_POST['submit'])){

	if(empty($_POST['email']) || empty($_POST['password'])){
		$error = "Email or Password is Invalid";
	}
	else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];


		$query = ("SELECT * FROM users WHERE email='$email' AND password='$password'");
		$result = $mysqli->query($query);
		if(mysqli_num_rows($result)==1){
			$qry = mysqli_fetch_array($result);
			$_SESSION['email'] = $qry['email'];
			$_SESSION['level'] = $qry['level'];
				if($qry['level']=="Administrator"){
					$_SESSION['userid']=$email;
					//$success = "Successfully Logged In";
					header("Location:http://localhost/TicketingMain/admin-dash.php");

				}else if($qry['level']=="User"){
					$_SESSION['userid']=$email;
					//$success = "Successfully Logged In";
					header("Location:http://localhost/TicketingMain/user-dash.php");

				}
		}else{
			$error = "Wrong email or Password!";
			header("Location:http://localhost/TicketingMain/Index.php?error=".$error);
		}
	}
}
?>
