<?php
	include "conn.php";

	$cen = $_POST['cen'];

	$result = $conn->query("SELECT * FROM tbl_marshall WHERE id = '$cen' ");

	$data = array();
	while ($row = $result->fetch_assoc()) {
		array_push($data, $row);
	}
	echo json_encode($data);
?>