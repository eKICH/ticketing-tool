<!DOCTYPE html>
<html>
<head>
<title>Raised Ticket - Call Center Ticketing Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
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

    <!--  <li class="nav-item">
      <a class="nav-link" href="#">Reports</a>
    </li> -->

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


<form class="form-xp" action="insert_solved.php" method="POST">

<h4>Raised Ticket</h4>
<div class="form-group">

    <label for="accountnumber">Ticket ID:</label>
    <input type="text" class="form-control" id="tid" name="tid" aria-describedby="" placeholder="" disabled required value="<?php ?>">
  </div>
  <div class="form-group">
    <label for="accountnumber">Account:</label>
    <input type="text" class="form-control" id="account" name="account"  placeholder="" disabled required
	value="<?php  ?>">
  </div>
  <div class="form-group">
    <label for="category">Category:</label>
    <input type="text" class="form-control" id="category" name="category"  placeholder="" disabled required value="<?php  ?>">
  </div>
<div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" id="description" name="description" rows="5" disabled style="resize: none;" required value=""><?php ?></textarea>
  </div>
  <div class="form-group">
    <label for="accountnumber">Reporter:</label>
    <input type="reporter" class="form-control" id="reporter" name="reporter"  placeholder="" disabled value="<?php  ?>" required>
  </div>
  <div class="form-group">
  <label for="accountnumber">Assignee:</label>
  <select name="state" id="maxRows" class="form-control" style="">
			<option value="">Unassigned</option>
			<option value=""><?php echo "".$_SESSION['userid']; ?></option>
		</select>
  </div>

  <div class="form-group">
    <label for="solution">Solution:</label>
    <textarea class="form-control" id="solution" name="solution" rows="5" style="resize: none;" required></textarea>
  </div>

  <button type="submit" class="btn btn-dark">Resolve</button>
</form><br>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
