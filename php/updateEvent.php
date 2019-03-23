<?php
	
	include "connection.php";


  	$id = $_GET['id'];
  	$marshall = $_POST['marshall'];
	$cafename = $_POST['cafename'];
	$landmark = $_POST['landmark'];
	$eventdate = $_POST['eventdate'];
	$type = $_POST['type'];
	$status = $_POST['status'];

	$sql = "UPDATE event SET id = '$id', marshall = '$marshall', cafename = '$cafename', landmark = '$landmark', eventdate = '$eventdate', eventdate = '$eventdate', type = '$type', status = '$status' WHERE id='$id'";

	if ($conn->query($sql) == true) {
		header ("location: ../events.php?id=<?php echo $id; ?>");
	}

?>