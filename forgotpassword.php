<!DOCTYPE html>
<html>
<head>
<title>Reset Password - Call Center Ticketing Management System</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:#f1f1f1;">
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="">Reset Password</a>
</nav>
<div class="form-xp">
<h4>Reset Password</h4><br>
<?php

	$selector = $_GET['selector'];
	$validator = $_GET['validator'];

	if (empty($selector) || empty($validator) ) {
		echo "Could not validate your request!";
	} else {
		if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
?>
				<form action="includes/reset-password.inc.php" method="post">

						<input class="form-control" type="hidden" name="selector" value="<?php echo $selector ?>">
						<input class="form-control" type="hidden" name="validator" value="<?php echo $validator ?>">

				  <div class="form-row">
				    <div class="form-group col-md-8">
				      <input type="password" class="form-control" name="pwd" style="background-color:#f1f1f1;" placeholder="Enter New Password">
				    </div>
				  </div>
				  <div class="form-row">
					<div class="form-group col-md-8">
				      <input type="password" class="form-control" name="pwd-repeat" style="background-color:#f1f1f1;" placeholder="Confirm New Password">
				    </div>
				  </div>
				  <button type="submit" name="reset-password-submit" class="btn btn-success">Reset Password</button>
				</form>

				<?php
			}
		}

	 ?>
<?php
if (isset($_GET['newpwd'])) {
	if ($_GET['newpwd'] == "pwdnotsame") {
		echo '<p class="alert alert-danger">Passwords do not match!</p>';
	}
	elseif ($_GET['newpwd'] == "empty")  {
	echo '<p class="alert alert-danger">Password and Repeat password are mandatory!</p>';
	}
}

 ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
