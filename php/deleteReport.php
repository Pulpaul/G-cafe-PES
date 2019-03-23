<?php

	include('connection.php');
	
	$id= $_GET['id'];

	mysqli_query($conn,"DELETE FROM `tbl_report` WHERE id='$id'");

	header('location: ../reports.php');
?>