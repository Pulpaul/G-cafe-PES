<?php

	include('connection.php');
	
	$id= $_GET['id'];

	mysqli_query($conn,"DELETE FROM `tbl_marshall` WHERE id='$id'");

	header('location:../marshalls.php');
?>