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
<title>Edit User - Call Center Ticketing Management System</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="edit-user" style="background-color:#f1f1f1;">
	<!-- menu admin -->
   <?php require "menu-admin.php"; ?>
  <!-- end menu admin -->

<?php if($pizza): ?>

<br>

<div class="container">

<p class="alert alert-success" id="show_message" style="display: none; color:green;">User Updated Successfully</p>
<h4>Edit User</h4>
<form action="javascript:void(0)" id="ajax-form">
<span id="error" style="display: none; color:red;"></span>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="id">User Id<span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($pizza['id']); ?>" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="newfname">First Name<span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="newfname" name="newfname" value="<?php echo htmlspecialchars($pizza['first_name']); ?>" style="background-color:#f1f1f1;">
    </div>
    <div class="form-group col-md-3">
        <label for="newlname">Last Name<span style="color:red;">*</span></label>
        <input type="text" class="form-control" id="newlname" name="newlname" value="<?php echo htmlspecialchars($pizza['last_name']); ?>" style="background-color:#f1f1f1;">
      </div>
    <div class="form-group col-md-3">
        <label for="newemail">Email<span style="color:red;">*</span></label>
        <input type="email" class="form-control" id="newemail" name="newemail" value="<?php echo htmlspecialchars($pizza['email']); ?>" style="background-color:#f1f1f1;">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="newlevel">Level<span style="color:red;">*</span></label>
        <select class="form-control" id="newlevel" name="newlevel" style="background-color:#f1f1f1;">
      <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['level']); ?></option>
      <option>User</option>
      <option>Administrator</option>
      </select>
      </div>

    <div class="form-group col-md-3">
        <label for="newstatus">Status<span style="color:red;">*</span></label>
        <select class="form-control" id="newstatus" name="newstatus" style="background-color:#f1f1f1;">
      <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['status']); ?></option>
      <option>Disabled</option>
      <option>Enabled</option>
      </select>
      </div>
    </div><br>

  <button type="submit" name="submit" class="btn btn-success">Update User</button>
  <button type="cancel" name="cancel" class="btn btn-danger" style="margin-left:2vw;"><a href="http://localhost/TicketingMain/users.php" style="text-decoration:none; color:#fff;">Cancel</a></button>
</form>
</div>

<?php else: ?>
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

		 //fname required
        var newfname = $("input#newfname").val();
        if(newfname == ""){
            $("#error").fadeIn().text("First Name required.");
            $("input#newfname").focus();
            return false;
        }
		//lname required
        var newlname = $("input#newlname").val();
        if(newlname == ""){
            $("#error").fadeIn().text("Last Name required.");
            $("input#newlname").focus();
            return false;
        }

		// email required
      var newemail = $("input#newemail").val();
        if(newemail == ""){
            $("#error").fadeIn().text("Email required");
            $("input#newemail").focus();
            return false;
        }


		// level required
      var newlevel = $("select#newlevel").val();
        if(newlevel == ""){
            $("#error").fadeIn().text("Level required");
            $("select#newlevel").focus();
            return false;
        }

		// Status required
      var newstatus = $("select#newstatus").val();
        if(newstatus == ""){
            $("#error").fadeIn().text("Status required");
            $("select#newstatus").focus();
            return false;
        }


        // ajax
        $.ajax({
            type:"POST",
            url: "userupdate.php",
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(){
            $("#show_message").fadeIn();
            $("#show_message").fadeOut(5000);
			$("#ajax-form")[0].reset();
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
