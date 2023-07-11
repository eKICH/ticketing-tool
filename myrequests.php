<!DOCTYPE html>
<html>
<head>
	<title>My Requests - Call Center Ticketing Management System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

</head>
<body id="myrequest" style="background-color:#f1f1f1;">
<!-- menu user -->
  <?php require "menu-user.php"; ?>
<!-- end menu user -->
<?php
include_once 'db.php';
$query = "select * from new_ticket WHERE reporter='" . $_SESSION['email'] . "'";
$result = $mysqli->query($query);
?>
<br />

<br>
<div class="container">
<p>This section shows all tickets raised by you. You can see the progress of your raised tickets.</p>
<table id="mytable" class="display table table-bordered table-sm">
    <thead>
      <tr>
		<th>Date Created</th>
        <th>Ticket ID</th>
        <th>Account Number</th>
        <th>Category</th>
        <th>Description</th>
				<th>Solution</th>
        <th>Reporter</th>
				<th>Assigned To</th>
				<th>Status</th>
      </tr>
    </thead>
    <tbody>
	<?php
		while($rows = mysqli_fetch_assoc($result))
		{
	?>
    <tr>
			<td><?php echo $rows['date_created'];?></td>
	    <td><?php echo $rows['id'];?></td>
	    <td><?php echo $rows['account'];?></td>
	    <td><?php echo $rows['category'];?></td>
	    <td><?php echo $rows['description'];?></td>
			<td><?php echo $rows['solution'];?></td>
			<td><?php echo $rows['reporter'];?></td>
			<td><?php echo $rows['assignedto'];?></td>
			<td><strong style="color:blue;"><?php echo $rows['status'];?></strong></td>
    </tr>
	<?php
		}
	?>
    </tbody>

  </table>

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
