<?php
	
	include "connection.php";

	$id = $_GET['id'];
  
	$cafename = $_POST['cafename'];
	$landmark = $_POST['landmark'];
	$eventdate = $_POST['eventdate'];
	$time = $_POST['time'];
	$type = $_POST['type'];
	$status = $_POST['status'];

	$sql = "UPDATE event SET cafename = '$cafename', landmark = '$landmark', eventdate = '$eventdate', eventdate = '$eventdate', time = '$time', type = '$type', status = '$status' WHERE id = '$id' ";

	if ($conn->query($sql) == true) {
		header ("location: ../event.php?id=<?php echo $id; ?>");
	}

?>