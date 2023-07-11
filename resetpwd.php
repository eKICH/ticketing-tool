<!DOCTYPE html>
<html>
<head>
<title>Forgot Password - Call Center Ticketing Management System</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:#f1f1f1;">
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="">Forgot Password</a>
</nav>
<div class="form-xp" style="margin-top:5vh;">
<p>Please enter your email to receive reset code to recover your forgotten password.</p>
<?php
	if (isset($_GET['resubmit'])) {
		if ($_GET['resubmit'] == "expired") {
			echo '<p class="alert alert-success">You need to re-submit your request! Token Already Used..</p>';
		}
	}
 ?>
<form action="includes/reset-request.inc.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="email">Email<span style="color:red;">*</span></label>
      <input type="text" class="form-control"  name="email" style="background-color:#f1f1f1;" placeholder="Enter Your Email Address">
    </div>
  </div>
  <button type="submit" name="reset-request-submit" class="btn btn-warning">Receive new password by email</button>
</form>
</div>
<?php
	if (isset($_GET['reset'])) {
		if ($_GET['reset'] == "success") {
			echo '<p class="alert alert-success" style="margin-left:30vw; width:30vw; margin-top:2vh;">Reset Link Sent to Your Email!</p>';
		}
	}
 ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
