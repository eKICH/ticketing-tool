<?php

    require_once "db.php";
 
    $account = mysqli_real_escape_string($mysqli, $_POST['account']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);
    $reporter = mysqli_real_escape_string($mysqli, $_POST['reporter']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	$status = mysqli_real_escape_string($mysqli, $_POST['status']);
	$assignedto = mysqli_real_escape_string($mysqli, $_POST['assignedto']);
    
           

    if(mysqli_query($mysqli, "INSERT INTO new_ticket(account, category, reporter, description, status, assignedto) VALUES('" . $account . "', '" . $category . "', '" . $reporter . "', '" . $description . "', '" . $status . "', '" . $assignedto . "')")) {
     echo '1';
    } else {
       echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
 
    mysqli_close($mysqli);
 
?>