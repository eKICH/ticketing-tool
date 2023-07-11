<!DOCTYPE html>
<html>
<head>
<title>New Ticket - Call Center Ticketing Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body id="create-ticket" style="background-color:#f1f1f1;">
<!-- menu user -->
  <?php require "menu-user.php"; ?>
<!-- end menu user -->
<div class="form-xp">
<p class="alert alert-success" id="show_message" style="display: none; color:green;">Ticket Created Successfully</p>
<h4>New Ticket</h4>
<span id="error" style="display: none; color:red;"></span>
<form class="test" action="javascript:void(0)" method="post" id="ajax-form">

  <div class="form-group">
    <label for="accountnumber">Account Number<span style="color:red;">*</span></label>
    <input type="account" class="form-control" id="account" name="account" aria-describedby="" placeholder="Enter Account Number">
  </div>

  <div class="form-group">
    <label for="category">Category<span style="color:red;">*</span></label>
    <select class="form-control" id="category" name="category" >
	  <option selected hidden value="" >Please Select</option>
      <option>Edit Customer Details</option>
      <option>Stolen-Abstract Obtained</option>
      <option>Incomplete Product</option>
      <option>Pending/Incomplete Installation</option>
      <option>Upgrade of Product</option>
	  <option>Downgrade of Product</option>
	  <option>New Lead</option>
	  <option>New Accessory Request</option>
	  <option>Pending Product at Service Center</option>
	  <option>Product Given to SEP</option>
	  <option>Lost Product</option>
	  <option>Held Payments</option>
	  <option>Missing Payments</option>
	  <option>Fraud</option>
	  <option>Misinformation</option>
	  <option>Others</option>
    </select>
  </div>

  <div class="form-group">
    <label for="">Issue Description<span style="color:red;">*</span></label>
    <textarea class="form-control" id="description" name="description" rows="5" style="resize: none;" ></textarea>
  </div>

  <div class="form-group">
    <!--<label for="reporter">Reporter<span style="color:red;">*</span></label>-->
    <input type="hidden" class="form-control" id="reporter" name="reporter"  style="background-color: lightgrey; -webkit-appearance: none;" value="<?php echo "".$_SESSION['userid'];?>">
  </div>

  <div class="form-group">
    <!--<label for="status">Status<span style="color:red;">*</span></label>-->
    <input type="hidden" class="form-control" id="status" name="status"  style="background-color: lightgrey; -webkit-appearance: none;" value="Waiting for Support">
  </div>

  <div class="form-group">
    <!--<label for="Assigned To">Assigned To<span style="color:red;">*</span></label>-->
    <input type="hidden" class="form-control" id="assignedto" name="assignedto"  style="background-color: lightgrey; -webkit-appearance: none;" value="Unassigned">
  </div>

  <input type="submit" name="submit" class="btn btn-dark" Value="Submit Ticket"></input>
</form>
</div>
<script type="text/javascript">
 $(document).ready(function($){
 var minlength = 8 ;
 var maxlength = 9 ;
    // hide messages
    $("#error").hide();
    $("#show_message").hide();

    // on submit...
    $('#ajax-form').submit(function(e){

        e.preventDefault();


        $("#error").hide();

        //account required
        var account = $("input#account").val();
		var acclength = $("input#account").val().length;
        if(account == ""){
            $("#error").fadeIn().text("Account required.");
            $("input#account").focus();
            return false;
        } else if (acclength < minlength){
			$("#error").fadeIn().text("8 or 9 digits required");
            $("input#account").focus();
            return false;
		} else if(acclength > maxlength){
			$("#error").fadeIn().text("Max of 9 and Min of 8 Digits");
            $("input#account").focus();
            return false;
		}

		//category required
        var category = $("select#category").val();
        if(category == ""){
            $("#error").fadeIn().text("Category required.");
            $("select#category").focus();
            return false;
        }

		//reporter required
        var reporter = $("input#reporter").val();
        if(reporter == ""){
            $("#error").fadeIn().text("Reporter required.");
            $("input#reporter").focus();
            return false;
        }

        // description required
        var description = $("textarea#description").val();
        if(description == ""){
            $("#error").fadeIn().text("Description required");
            $("textarea#description").focus();
            return false;
        }


        // ajax
        $.ajax({
            type:"POST",
            url: "insert_ticket.php",
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
