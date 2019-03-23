<?php

	include('connection.php');
	
	$id= $_GET['id'];

	mysqli_query($conn,"DELETE FROM `tbl_marshall` WHERE marshall_id='$id'");

	header('location:../marshall.php');
?>