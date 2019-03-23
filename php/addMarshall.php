<?php

	include('connection.php');
 	
 	if (isset($_POST['register_marshall'])) {
 		 $secret = "6LdwdWIUAAAAACM9bO_UkNvneJdrP-E9aBOt-mAR";
      $response = $_POST['g-recaptcha-response'];
      $remoteip = $_SERVER['REMOTE_ADDR'];

      $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
      $response = file_get_contents($url,true);
      $response = json_decode($response);

      if($response->success){		
		register_marshall();
		header('location: ../marshalls.php');
		}else{
			header('location: ../marshalls.php');
			}
}

// REGISTER USER
function register_marshall(){
	// call these variables with the global keyword to make them available in function
	global $conn,$firstname,$mname,$lastname,$location,$number, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $firstname    =  e($_POST['firstname']);
	$mname       =  e($_POST['mname']);
	$lastname    =  e($_POST['lastname']);
	$location       =  e($_POST['location']);
	$number    =  e($_POST['number']);
	$email       =  e($_POST['email']);
	$username       =  e($_POST['username']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		
			$query = "INSERT INTO tbl_marshall (firstname,mname,lastname,location,number, email,username, password) 
					  VALUES( '$firstname','$mname','$lastname','$location','$number','$email','$username', '$password')";
			mysqli_query($conn, $query);

			header('location: ../marshalls.php');
	}
}
 
 function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}