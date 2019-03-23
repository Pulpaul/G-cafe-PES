<?php
	
	include "connection.php";
	
	$id = $_GET['id'];
  	
  	$fname = $_POST['fname'];
  	$mname = $_POST['mname'];
  	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$user_type = $_POST['user_type'];
	$address = $_POST['address'];
	$number = $_POST['number'];

	$sql = "UPDATE users SET fname = '$fname', mname = '$mname', lname = '$lname', username = '$username', email = '$email', user_type = '$user_type', address = '$address', number = '$number' WHERE id = '$id' ";

	if ($conn->query($sql) == true) {
		header ("location: ../manager.php?id=<?php echo $id; ?>");
	}

?>