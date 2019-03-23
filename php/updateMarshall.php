<?php
	
	include "connection.php";
	
	$id = $_GET['id'];
  	
  	$firstname = $_POST['firstname'];
  	$mname = $_POST['mname'];
  	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$location = $_POST['location'];
	$number = $_POST['number'];

	$sql = "UPDATE tbl_marshall SET firstname = '$firstname', mname = '$mname', lastname = '$lastname', username = '$username', email = '$email',  location = '$location', number = '$number' WHERE marshall_id = '$id' ";

	if ($conn->query($sql) == true) {
		header ("location: ../marshall.php?id=<?php echo $id; ?>");
	}else  {
		echo "error";
		}
?>