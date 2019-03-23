<?php
include 'connection.php';

$sql = "SELECT * FROM event WHERE status = 'Accepted'  ";
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_array($result);

	if ($rows == 0) {
		echo "<a class='text-center'>No Notification</a>";
	}
	else{
		$sql = "SELECT * FROM event WHERE status = 'Accepted'  ";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($result)) {
			echo "<a href='events.php'>Marshall ID ".$row['id']." Accepted the event.</a>";
		}
	}

?>