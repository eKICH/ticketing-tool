<?php require "indexserv.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Login - Call Center Ticketing Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Call Center Ticketing</a>

  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>-->
</nav>
<section class="container-fluid">
	<section class="row justify-content-center">
		<section class="col-12 col-sm-6 col-md-3">
<script type="text/javascript">
function validate(){
var email=document.f2.email.value;
var password=document.f2.password.value;
var status=false;

if(email==""){
document.getElementById("emaillocation").innerHTML=
"Email can't be blank!";
status=false;
}else{
document.getElementById("emaillocation").innerHTML=
"";
status=true;
}

if(password==""){
document.getElementById("passwordlocation").innerHTML=
"Password Required!";
status=false;
}else{
document.getElementById("passwordlocation").innerHTML=
"";
status=true;
}

return status;
}
</script>

			<form name="f2" class="form-container" action="" method="POST" onsubmit="return validate()">
				<h2>Login</h2>
				<div style="color:red;">
				<?php
					if (isset($_GET['error']))
					  echo $_GET['error'];

				 ?>
				</div>
				  <div class="form-group form">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email"  style="width: 300px;">
					<!--<small id="email"  class="form-text text-muted">We'll never share your email with anyone else.</small>-->
					<span id="emaillocation" style="color:red"></span>
				  </div>
				  <div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password"  style="width: 300px;">
					<span id="passwordlocation" style="color:red"></span>
				  </div>

				  <a href="http://localhost/TicketingMain/resetpwd.php" title="Click to Reset password"  data-toggle="tooltip" style="text-decoration:none; margin-left:12vw;">Forgot Password!</a><br /><br>

				  <button type="submit" name="submit" class="btn btn-dark btn-block">Log In</button>
			</form>
      <?php

          if (isset($_GET['newpwd'])) {
           if ($_GET['newpwd'] == "passwordupdated") {
              echo '<p class="alert alert-success" style="margin-top:2vh; margin-left:2vw;">Your password has been reset!</p>';
          }
        }

       ?>
       <?php

           if (isset($_GET['loggedout'])) {
            if ($_GET['loggedout'] == "success") {
               echo '<p class="alert alert-success" style="margin-top:2vh; margin-left:2vw;">You have been logged out!</p>';
           }
         }

        ?>
		</section>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>
