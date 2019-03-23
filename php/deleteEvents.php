<?php

	include('connection.php');
	
	$id= $_GET['id'];

	mysqli_query($conn,"DELETE FROM `event` WHERE id='$id'");

	header('location:../event.php');
?>