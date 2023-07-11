<?php 

session_start();

$error = '';
if (!isset($_SESSION['userid'])) {
    
    $error = "Login Required!";
    header("Location: http://localhost/TicketingMain/Index.php?error=".$error);
    die();
} 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">Administrator</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="active nav-item ">
        <a class="nav-link" href="http://localhost/TicketingMain/admin-dash.php">Dashboard</a>
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
      </li>-->
    </ul>
   <form class="form-inline my-2 my-lg-0">
   <li class="nav-item dropdown" style="list-style: none;">
   <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:#fff;">
   <?php  echo "".$_SESSION['userid']; ?>
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#open a:contains('Open Tickets')").parent().addClass('active').siblings().removeClass('active');
    $("#ticket-open a:contains('Open Tickets')").parent().addClass('active').siblings().removeClass('active');
    $("#assigned a:contains('Assigned to Me')").parent().addClass('active').siblings().removeClass('active');
    $("#view-ticket a:contains('Assigned to Me')").parent().addClass('active').siblings().removeClass('active');
    $("#closed a:contains('Closed Tickets')").parent().addClass('active').siblings().removeClass('active');
    $("#user-reg a:contains('Manage User')").parent().addClass('active').siblings().removeClass('active');
    $("#user-view a:contains('Manage User')").parent().addClass('active').siblings().removeClass('active');
    $("#edit-user a:contains('Manage User')").parent().addClass('active').siblings().removeClass('active');
  });
</script>