<?php

	include('connection.php');

 	if (isset($_POST['submit'])) {	
 		
 	$id=$_POST['id'];

 	$marshall=$_POST['marshall'];
 	$number=$_POST['number'];
	$cafename=$_POST['cafename'];
	$landmark=$_POST['landmark'];
	$eventdate=$_POST['eventdate'];
	$time=$_POST['time'];
	$type=$_POST['type'];
	$status=$_POST['status'];

	mysqli_query($conn,"INSERT INTO `event` (id,marshall,cafename,landmark,eventdate,time,type,status,state,lok,lat,lon,upLn,upLt) VALUES ('$id','$marshall','$cafename','$landmark','$eventdate','$time','$type','$status','Unseen','1','2','3','4','5')");
		
		function itexmo($number,$message,$apicode){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
		$param = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($itexmo),
		    ),
		);
		
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);}
		$result = itexmo("$number","Marshall $marshall You have a new event. Open the app to accept the event.","TR-ALBER595186_1KGT8");
		if ($result == ""){
		echo "iTexMo: No response from server!!!
		Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
		Please CONTACT US for help. ";	
		}else if ($result == 0){
		echo "Message Sent!";
		}
		else{	
		echo "Error Num ". $result . " was encountered!";
		}
		
 	}
 	
 	header('location:../event.php');
?>