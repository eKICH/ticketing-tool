<!DOCTYPE html>
<html>
<head>
<title>User Registration - Call Center Ticketing Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body id="user-reg" style="background-color:#f1f1f1;">
<!-- menu admin -->
  <?php require "menu-admin.php"; ?>
<!-- end menu admin -->
  <br><br><br>
<div class="container">
<p class="alert alert-success" id="show_message" style="display: none; color:green;">User Registered Successfully</p>

<form action="javascript:void(0)" id="ajax-form">
<h4>User Registration</h4>
<span id="error" style="display: none; color:red;"></span>
<div class="form-row">
  <div class="form-group col-md-3">
    <label for="firstname">First Name<span style="color:red;">*</span></label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" style="background-color:#f1f1f1;">
  </div>
  <div class="form-group col-md-3">
    <label for="lastname">Last Name<span style="color:red;">*</span></label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" style="background-color:#f1f1f1;">
  </div>

  <div class="form-group col-md-3 validate">
    <label for="emailaddress">Email<span style="color:red;">*</span></label>
    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" style="background-color:#f1f1f1;">
	<span id="available"></span>
  </div>
  <div class="form-group col-md-3">
    <label for="password">Password<span style="color:red;">*</span></label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" style="background-color:#f1f1f1;">
  </div>
 </div>
 <br>
 <div class="form-row">
 <div class="form-group col-md-3">
    <label for="repassword">Confirm Password<span style="color:red;">*</span></label>
    <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password" style="background-color:#f1f1f1;">
  </div>

  <div class="form-group col-md-3">
    <label for="category">Level:<span style="color:red;">*</span></label>
    <select class="form-control" id="level" name="level" style="background-color:#f1f1f1;">
	  <option selected hidden value="">---Please Select---</option>
      <option>Administrator</option>
      <option>User</option>
    </select>
  </div>

  <div class="form-group col-md-3">
    <!--<label for="status">Status:<span style="color:red;">*</span></label>-->
    <input type="text" class="form-control" id="status" name="status" style="background-color:#f1f1f1;" value="Enabled" hidden>

  </div>
</div>
  <input type="submit" name="user-submit" id="btnsubmit" class="btn btn-primary" value="Register" disabled></input>

</form>
</div>

<script type="text/javascript">
 $(document).ready(function($){

    // hide messages
    $("#error").hide();
    $("#show_message").hide();


    // on submit...
    $('#ajax-form').submit(function(e){

        e.preventDefault();


        $("#error").hide();
		$('#notavailable').hide();

        //First Name required
        var first_name = $("input#first_name").val();
        if(first_name == ""){
            $("#error").fadeIn().text("First Name Required!");
            $("input#first_name").focus();
            return false;
        }

		//Last Name required
        var last_name = $("input#last_name").val();
        if(last_name == ""){
            $("#error").fadeIn().text("Last Name Required!");
            $("input#last_name").focus();
            return false;
        }

		//email required
		var email_regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = $("input#email").val();
        if(email == ""){
            $("#error").fadeIn().text("Email required!");
            $("input#email").focus();
            return false;
        }

		//password required
        var password = $("input#password").val();
        if(password == ""){
            $("#error").fadeIn().text("Password required!");
            $("input#password").focus();
            return false;
        }

        // check password length
  		var password= $("input#password").val();
  		if(password.trim().length < 6){
  			$("#error").fadeIn().text("Password too short. 6 Characters or more required!");
              $("input#password").focus();
              return false;
		   }

    		//Confirm password required
        var repassword = $("input#repassword").val();
        if(repassword == ""){
            $("#error").fadeIn().text("Confirm Password required!");
            $("input#repassword").focus();
            return false;
        }
        //Password match validation
    		var repassword= $("input#repassword").val();
    		var password= $("input#password").val();
    		if (password != repassword){
    			$("#error").fadeIn().text("Password and Confirm Password don't match!");
          $("input#repassword").focus();
          return false;
    		}
  		// status required
        var status = $("input#status").val();
        if(status == ""){
            $("#error").fadeIn().text("Status required!");
            $("input#status").focus();
            return false;
        }
        // Level required
        var level = $("select#level").val();
        if(level == ""){
            $("#error").fadeIn().text("Level required!");
            $("select#level").focus();
            return false;
        }


        // ajax
        $.ajax({
            type:"POST",
            url: "insert.php",
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('#email').blur(function(){
		var email = $(this).val();
		$.ajax({
			url:"check.php",
			method:"POST",
			data:{email:email},
			dataType:"text",
			success:function(html){
				if(html != '0')
				{
					$('#available').html('<span class="text-danger">Sorry!.. Email Taken</span>');
					$('#btnsubmit').attr("disabled",true);
				}
			else{
				$('#available').html('<span class="text-success">Email Available</span>');
				$('#btnsubmit').attr("disabled",false);
				}
			}

		});
	});
});
</script>
