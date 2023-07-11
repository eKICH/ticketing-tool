<?php
include_once 'db.php';
$query = "select * from users";
$result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>All Users - Call Center Ticketing Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="user-view" style="background-color:#f1f1f1;">
	<!-- menu admin -->
    <?php require "menu-admin.php"; ?>
  <!-- end menu admin -->
	<br>
<br><br>
<div class="container">
<p>This section shows all created users and there level of access.</p>
	<table id="usertable" class="display table table-sm table-bordered mb-0" action="">
    <thead>
      <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Level</th>
        <th>Status</th>
        <th>Edit</th>
				<!--<th>Change</th>-->
				<th>Delete</th>
      </tr>

    </thead>
    <tbody>
	<?php
		while($rows = mysqli_fetch_assoc($result))
		{
	?>
      <tr>
        <td><?php echo $rows['id']; ?></td>
        <td><?php echo $rows['first_name']; ?></td>
        <td><?php echo $rows['last_name']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['level']; ?></td>
		<td><?php echo $rows['status']; ?></td>
        <td><a href="edituser.php?id=<?php echo $rows['id'];?>" title="Click to Edit User"  data-toggle="tooltip" style="text-decoration:none;">Edit</a></td>
		<!--<td><a href="resetpass.php?id=<?php echo $rows['id'];?>" title="Click to Reset Password"  data-toggle="tooltip" style="text-decoration:none;">Reset Password</a></td>-->
		<td><a href="userdelete.php?id=<?php echo $rows['id'];?>" title="Click to Delete User"  data-toggle="tooltip" style="list-decoration: none;">Delete</a></td>
      </tr>
		<?php
		}
		?>
    </tbody>

  </table>
  <br>
<form method="POST" action="exportusers.php">

	<input type="submit" class="btn btn-danger" name="exportusers" value="Export CSV File"/>

</form>
</div>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function() {
		$('#usertable').DataTable();
		} );
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>
