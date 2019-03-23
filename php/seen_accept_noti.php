<?php
include ('conn.php');
 
$sql = "UPDATE event SET state = 'Seen' WHERE status = 'Accepted' ";

if ($conn->query($sql) == true) {
		echo json_encode("Job order successfully updated.");
	} else {
		echo json_encode("Something went wrong.");
	}
	
?>