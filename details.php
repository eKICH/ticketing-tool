<?php
// include db connection.
include 'db.php';

// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($mysqli, $_GET['id']);

	$sql = "SELECT * FROM new_ticket WHERE id=$id";

	//get query results

	$result = Mysqli_query ($mysqli, $sql);

	//fetch result in array format
	$pizza = Mysqli_fetch_assoc($result);

	Mysqli_free_result($result);
	Mysqli_close($mysqli);

	//print_r($pizza);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Raised Ticket - Call Center Ticketing Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Tickets</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/admin-dash.php">Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/open_tickets.php">Open Tickets</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/assigned_tickets.php">Assigned to Me</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/closed_ticket.php">Closed Tickets</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/TicketingMain/closed_ticket.php">Raised Tickets</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/TicketingMain/user_registration.php">Create</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/TicketingMain/users.php">View/Edit</a>

        </div>
      </li>

		<!--	<li class="nav-item">
			<a class="nav-link" href="#">Reports</a>
		</li>-->

    </ul>
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
  </div>
</nav>

<?php if($pizza): ?>

<div class="form-xp">

<form action="javascript:void(0)" method="post" id="ajax-form">

<h4>Raised Ticket</h4>

<div class="form-group">

    <label for="accountnumber">Raised Date<span style="color:red;">*</span></label>
    <input type="date_created" class="form-control" id="date_created" name="date_created" aria-describedby="" placeholder="" readonly value="<?php echo htmlspecialchars($pizza['date_created']); ?>">
  </div>
<div class="form-group">

    <label for="accountnumber">Ticket ID<span style="color:red;">*</span></label>
    <input type="tid" class="form-control" id="ticketid" name="ticketid" aria-describedby="" placeholder="" readonly  value="<?php echo htmlspecialchars($pizza['id']); ?>">
  </div>

  <div class="form-group">
    <label for="accountnumber">Account<span style="color:red;">*</span></label>
    <input type="account" class="form-control" id="account" name="account"  placeholder="" readonly value="<?php echo ($pizza['account']); ?>">
  </div>
  <div class="form-group">
    <label for="category">Category<span style="color:red;">*</span></label>
    <input type="category" class="form-control" id="category" name="category"  placeholder="" readonly value="<?php echo ($pizza['category']); ?>">
  </div>
<div class="form-group">
    <label for="description">Description<span style="color:red;">*</span></label>
    <textarea class="form-control" id="description" name="description" rows="5"  style="resize: none;" readonly value=""><?php echo ($pizza['description']); ?></textarea>
  </div>
  <div class="form-group">
    <label for="reporter">Reporter<span style="color:red;">*</span></label>
    <input type="reporter" class="form-control" id="reporter" name="reporter"  placeholder="" readonly  value="<?php echo ($pizza['reporter']); ?>">
  </div>
  <div class="form-group">
  <label for="assignee">Assignee<span style="color:red;">*</span></label>
  <select name="assignee" id="assignee" class="form-control" style="">

			<option><?php echo "".$_SESSION['userid']; ?></option>
		</select>
  </div>
	<span id="error" style="display: none; color:red;"></span>
  <div class="form-group">
    <label for="solution">Solution<span style="color:red;">*</span></label>
    <textarea class="form-control" id="solution" name="solution" rows="5" style="resize: none;"></textarea>
  </div>
  <p class="alert alert-success" id="show_message" style="display: none; color:green;">Ticket Closed Successfully</p>
 <div class="container">
  <input type="submit" name="submit" class="btn btn-dark" value="Resolve"></input>
  <a href="http://localhost/TicketingMain/open_tickets.php" style="margin-left:200px; text-decoration:none;">Cancel</a>
  </div>
</form><br>
</div>
<?php else: ?>
<!--<div class="container">
<br> <br> <br> <br>
<div class="alert alert-danger fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Note!</strong> No Such record Found.
  </div>
</div>-->

<?php endif; ?>
<script type="text/javascript">
 $(document).ready(function($){

    // hide messages
    $("#error").hide();
    $("#show_message").hide();

    // on submit...
    $('#ajax-form').submit(function(e){

        e.preventDefault();


        $("#error").hide();

        //Date Created required
        var date_created = $("input#date_created").val();
        if(date_created == ""){
            $("#error").fadeIn().text("Date Created Required.");
            $("input#date_created").focus();
            return false;
        }

		//Ticket ID required
        var ticketid = $("input#ticketid").val();
        if(ticketid == ""){
            $("#error").fadeIn().text("Ticket ID Required.");
            $("input#ticketid").focus();
            return false;
        }

		//account required
        var account = $("input#account").val();
        if(account == ""){
            $("#error").fadeIn().text("Account required.");
            $("input#account").focus();
            return false;
        }

		//category required
        var category = $("input#category").val();
        if(category == ""){
            $("#error").fadeIn().text("Category required.");
            $("input#category").focus();
            return false;
        }

		//description required
        var description = $("input#description").val();
        if(description == ""){
            $("#error").fadeIn().text("Description required.");
            $("input#description").focus();
            return false;
        }

		//reporter required
        var reporter = $("input#reporter").val();
        if(reporter == ""){
            $("#error").fadeIn().text("Reporter required.");
            $("input#reporter").focus();
            return false;
        }

        // Assignee required
        var assignee = $("select#assignee").val();
        if(assignee == ""){
            $("#error").fadeIn().text("Assignee required");
            $("select#assignee").focus();
            return false;
        }

		// Solution required
        var solution = $("textarea#solution").val();
        if(solution == ""){
            $("#error").fadeIn().text("Solution required");
            $("textarea#solution").focus();
            return false;
        }


        // ajax
        $.ajax({
            type:"POST",
            url: "insert_solved.php",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(){
            $("#show_message").fadeIn();
            $("#show_message").fadeOut(5000);
			window.location.replace("http://10.1.10.80/Ticketing/open_tickets.php");
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
