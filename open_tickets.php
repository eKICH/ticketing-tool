<?php
include_once 'db.php';
$query = "select * from new_ticket WHERE assignedto='Unassigned'";
$result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Open Tickets - Call Center Ticketing Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="open" style="background-color:#f1f1f1;">
	
<!-- menu admin -->
  <?php require "menu-admin.php"; ?>
<!-- end menu admin -->
	<br>
	<div class="container">
	<p>This section shows all open tickets that have not been resolved. Please click Unassigned to assign the ticket to yourself or any other person.</p>
	<!--<div class="form-group">
		<select name="state" id="maxRows" class="form-control" style="width:150px;">
			<option value="5000">Show All</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="15">15</option>
			<option value="20">20</option>
			<option value="50">50</option>
			<option value="75">75</option>
			<option value="100">100</option>
		</select>
	</div>	-->
	<table id="mytable" class="display table table-bordered table-sm">
    <thead>
      <tr>

        <th>Ticket ID</th>
        <th>Account Number</th>
        <th>Category</th>
        <th>Description</th>
        <th>Reporter</th>
		<th>Status</th>
		<th>Assign Ticket</th>
		<th>Ticket Date</th>
      </tr>
    </thead>
    <tbody>
	<?php
		while($rows = mysqli_fetch_assoc($result))
		{
	?>
      <tr>
        <td><?php echo $rows['id'];?></td>
        <td><?php echo $rows['account'];?></td>
        <td><?php echo $rows['category'];?></td>
        <td><?php echo $rows['description'];?></td>
		<td><?php echo $rows['reporter'];?></td>
		<td><strong><?php echo $rows['status'];?></strong></td>
		<td><a href="assignme.php?id=<?php echo $rows['id'];?>" class="" title="Click to Assign yourself the ticket"  data-toggle="tooltip"><?php echo $rows['assignedto'];?></a></td>
		<td><?php echo $rows['date_created'];?></td>
      </tr>
	<?php
		}
	?>
    </tbody>

  </table>
	<div class="pagination-container">
		<nav>
			<ul class="pagination"></ul>
		</nav>
	</div>
  </div>

  <!-- <p>No Data Found...</p>-->


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	<script>
	$(document).ready(function() {
    $('#mytable').DataTable();
	} );
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>
