<?php
// Include Db
include_once 'db.php';
// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($mysqli, $_GET['id']);

	$sql = "SELECT * FROM users WHERE id=$id";


	//get query results

	$result = Mysqli_query ($mysqli, $sql);

	//fetch result in array format
	$pizza = Mysqli_fetch_assoc($result);



	Mysqli_free_result($result);
	Mysqli_close($mysqli);
}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password - Call Center Ticketing Management System</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:#f1f1f1;">
	<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Reset Password</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/admin-dash.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>

	  <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/open_tickets.php"><span class="sr-only">(current)</span>Open Tickets</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/assigned_tickets.php">Assigned to Me</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/closed_ticket.php">Closed Tickets</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/TicketingMain/user_registration.php">Create</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/TicketingMain/users.php">View/Edit</a>
		  </li>

		   <li class="nav-item active">
			<a class="nav-link" href=""><span class=""></span>Reset Password</a>
		   </li>

        <!--  <li class="nav-item">
          <a class="nav-link" href="#">Reports</a>
				</li>-->
        </div>

    </ul>
	<form class="form-inline my-2 my-lg-0">
    <form class="form-inline my-2 my-lg-0">
   <li class="nav-item dropdown" style="list-style: none;">
   <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:#fff;">
   <?php session_start(); echo "".$_SESSION['userid']; ?>
   </a>
   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <a class="dropdown-item" href="includes/logout.inc.php">Logout</a>

    </div>

   </li>
      <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="http://localhost/Ticketing/login.php?" style="list-style: none; text-decoration-line: none; color: #fff;">Log Out</a></button>-->
    </form>
    </form>
  </div>
</nav>

<?php if($pizza): ?>

<div class="form-xp">
<h4>Change Password</h4>
<p class="alert alert-success" id="pass-show_message" style="display: none; color:green;">Password Changed Successfully</p>
<form action="javascript:void(0)" id="pass-form">
<span id="pass-error" style="display: none; color:red;"></span>
<div class="form-row">
    <div class="form-group col-md-8">
    <!-- <label for="newwid">Id</label>-->
      <input type="text" class="form-control" id="newwid" name="newwid" style="background-color:#f1f1f1;" value="<?php echo htmlspecialchars ($pizza['email']); ?>" readonly>
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="newpassword">New Password<span style="color:red;">*</span></label>
      <input type="password" class="form-control" id="newpassword" name="password" style="background-color:#f1f1f1;" placeholder="New Password">
    </div>
  </div>

  <div class="form-row">
	<div class="form-group col-md-8">
      <label for="newrepassword">Confirm New Password<span style="color:red;">*</span></label>
      <input type="password" class="form-control" id="newrepassword" name="repassword" style="background-color:#f1f1f1;" placeholder="Confirm New Password">
    </div>
  </div>

  <button type="submit" name="reset-pass-submit" class="btn btn-success">Submit</button>
  <button type="cancel" name="cancel" class="btn btn-danger" style="margin-left:2vw;"><a href="http://localhost/TicketingMain/users.php" style="text-decoration:none; color:#fff;">Cancel</a></button>
</form>
</div>

<?php else: ?>
<?php endif; ?>
</div>
<script type="text/javascript">
 $(document).ready(function($){
    // hide messages
    $("#pass-error").hide();
    $("#pass-show_message").hide();

    // on submit...
    $('#pass-form').submit(function(e){

        e.preventDefault();


        $("#pass-error").hide();

		 //Password required
        var newpassword = $("input#newpassword").val();
        if(newpassword == ""){
            $("#pass-error").fadeIn().text("New Password required.");
            $("input#newpassword").focus();
            return false;
        }
		//Confirm Password required
        var newrepassword = $("input#newrepassword").val();
        if(newrepassword == ""){
            $("#pass-error").fadeIn().text("Confirm New Password.");
            $("input#newrepassword").focus();
            return false;
        }

        // ajax
        $.ajax({
            type:"POST",
            url: "passupdate.php",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(){
            $("#pass-show_message").fadeIn();
            $("#pass-show_message").fadeOut(5000);
			$("#pass-form")[0].reset();
            }

        });
    });

    return false;
    });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
