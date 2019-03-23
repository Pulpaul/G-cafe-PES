<?php
include ('conn.php');
 
$sql = "UPDATE tbl_report SET state = 'Seen' ";

if ($conn->query($sql) == true) {
		echo json_encode("Job order successfully updated.");
	} else {
		echo json_encode("Something went wrong.");
	}
	
?>