<?php
// Include Db
include_once 'db.php';
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
}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Assign Ticket - Call Center Ticketing Management System</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="ticket-open" style="background-color:#f1f1f1;">

<!-- menu-admin -->
  <?php require "menu-admin.php"; ?>
<!-- end menu-admin -->
<?php if($pizza): ?>

<br>

<div class="container">
<p class="alert alert-success" id="show_message" style="display: none; color:green;">Ticket Assigned Successfully</p>
<span id="error" style="display: none; color:red;"></span>
<h4>Assign Ticket</h4>
<form action="javascript:void(0)" id="ajax-form">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="id">Id<span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($pizza['id']); ?>" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="newaccount">Account<span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="newaccount" name="newaccount" value="<?php echo htmlspecialchars($pizza['account']); ?>" readonly>
    </div>
	<div class="form-group col-md-3">
      <label for="newcategory">Category<span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="newcategory" name="newcategory" value="<?php echo htmlspecialchars($pizza['category']); ?>" readonly>
    </div>
	<div class="form-group col-md-3">
      <label for="newreporter">Reporter<span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="newreporter" name="newreporter" value="<?php echo htmlspecialchars($pizza['reporter']); ?>" readonly>
    </div>
  </div><br>

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="newdescription">Description<span style="color:red;">*</span></label>
      <textarea readonly type="text" class="form-control" rows="4"  style="resize: none;" id="newdescription" name="newdescription"><?php echo htmlspecialchars ($pizza['description']); ?></textarea>
    </div>
    <div class="form-group col-md-3">
      <label for="newstatus">Status<span style="color:red;">*</span></label>
      <select class="form-control" id="newstatus" name="newstatus" style="background-color:#f1f1f1;">
	  <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['status']); ?></option>
	  <option>In progress</option>
    </select>
    </div>
	 <div class="form-group col-md-3">
	 <?php
			//include db
			include "db.php";

			$dis = "SELECT * FROM users WHERE level='Administrator'";

			$res = Mysqli_query ($mysqli, $dis);

			$options = "";
			$select = "";

			while($row = mysqli_fetch_array($res))
				{
					$select = $select."<option hidden>Please Select</option>";
					$options = $options."<option>$row[3]</option>";
				}
	?>
      <label for="assignnew">Assigned To<span style="color:red;">*</span></label>
	  <select class="form-control" id="newassign" name="newassign" style="background-color:#f1f1f1;">
	  <option selected hidden value="" ><?php echo htmlspecialchars ($pizza['assignedto']); ?></option>
		  <?php echo $select;?>
		  <?php echo $options;?>
      </select>
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Assign</button>
  <button type="cancel" name="cancel" class="btn btn-danger" style="margin-left:2vw;"><a href="http://localhost/TicketingMain/open_tickets.php" style="text-decoration:none; color:#fff;">Cancel</a></button>
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

		 //first name required
        var newdescription = $("input#newdescription").val();
        if(newdescription == ""){
            $("#error").fadeIn().text("Ticket Description required.");
            $("input#newdescription").focus();
            return false;
        }
		// status required
      var newstatus = $("select#newstatus").val();
        if(newstatus == ""){
            $("#error").fadeIn().text("Status required");
            $("select#newstatus").focus();
            return false;
        }


		// status required
      var newassign = $("select#newassign").val();
        if(newassign == ""){
            $("#error").fadeIn().text("Assignee required");
            $("select#newassign").focus();
            return false;
        }



        // ajax
        $.ajax({
            type:"POST",
            url: "assignupdate.php",
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
