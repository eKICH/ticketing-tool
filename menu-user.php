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
  <a class="navbar-brand" href="#">Agent</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
        <a class="nav-link" href="http://localhost/TicketingMain/user-dash.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/create_ticket.php">Create Ticket</a>
      </li>
      <?php
      require "db.php";
      $query = "SELECT COUNT(*) AS requests FROM `new_ticket` WHERE (reporter = '" . $_SESSION['email'] . "')";

      $requests = mysqli_query($mysqli, $query);

     while($row = mysqli_fetch_assoc($requests)){
   	  $aoutput = $row['requests'];
     }

       ?>
	  <li class="nav-item">
        <a class="nav-link" href="http://localhost/TicketingMain/myrequests.php">My Requests <span class="badge badge-info"><?php echo $aoutput; ?></span></a>
      </li>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#create-ticket a:contains('Create Ticket')").parent().addClass('active').siblings().removeClass('active');
    $("#myrequest a:contains('My Requests')").parent().addClass('active').siblings().removeClass('active');
   
  });
</script>