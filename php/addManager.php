<?php

	include('connection.php');
 	
 	if (isset($_POST['register_manager'])) {
 		 $secret = "6LdwdWIUAAAAACM9bO_UkNvneJdrP-E9aBOt-mAR";
      $response = $_POST['g-recaptcha-response'];
      $remoteip = $_SERVER['REMOTE_ADDR'];

      $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
      $response = file_get_contents($url,true);
      $response = json_decode($response);

      if($response->success)	{	
		register_manager();
		header('location: ../manager.php');
		}else {
		echo "Failed";
		header('location: ../manager.php');
		}
}
// REGISTER USER
function register_manager(){
	// call these variables with the global keyword to make them available in function
	global $conn,$firstname,$mname,$lastname,$location,$number, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fname       =  e($_POST['fname']);
    $lname       =  e($_POST['lname']);
    $mname       =  e($_POST['mname']);
	$email       =  e($_POST['email']);
	$number       =  e($_POST['number']);
	$address       =  e($_POST['address']);
	$user_type       =  e($_POST['user_type']);
	$username       =  e($_POST['username']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) { 
		array_push($errors, "Firstname is required"); 
	}if (empty($lname)) { 
		array_push($errors, "Middlename is required"); 
	}
	if (empty($mname)) { 
		array_push($errors, "Lastname is required"); 
	}
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($address)) { 
		array_push($errors, "address is required"); 
	}
	if (empty($number)) { 
		array_push($errors, "number is required"); 
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

		
			$query = "INSERT INTO users (fname,mname,lname,user_type,email,address,number,username, password) 
					  VALUES('$fname','$mname','$lname','$user_type','$email','$address','$number','$username', '$password')";
			mysqli_query($conn, $query);

			header('location: ../manager.php');
	}
}
 
 function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}