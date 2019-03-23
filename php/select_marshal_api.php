<?php
	include "connection.php";

	$result = $conn->query("SELECT * FROM tbl_marshall");

	$data = array();
	while ($row = $result->fetch_assoc()) {
		array_push($data, $row);
	}

	echo json_encode($data);	
?>