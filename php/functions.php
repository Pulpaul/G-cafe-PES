<?php 
session_start();


#$db = mysqli_connect('localhost', 'root', '', 'dbgcafe');
$db = mysqli_connect('den1.mysql6.gear.host', 'dbgcafe', 'password_', 'dbgcafe');

$username = "";
$email    = "";
$errors   = array(); 

if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$user_type = e($_POST['user_type']);
	$email       =  e($_POST['email']);
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

		if (isset($_POST['user_type'])) {
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			 
		}
			 			
		}
	}



function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

if (isset($_POST['login_btn'])) {
	login();
}


function login(){
	global $db, $username, $errors;

	
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { 
				
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: dashboard.php');	  
			}elseif ($logged_in_user['user_type'] == 'manager') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: marshalls.php');	  
			}
			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: login.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
//search event

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $query = "SELECT * FROM `event` WHERE CONCAT(`id`, `marshall`, `cafename`, `type`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `event`";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    #$connect = mysqli_connect('localhost', 'root', '', 'dbgcafe');
    $connect = mysqli_connect('den1.mysql6.gear.host', 'dbgcafe', 'password_', 'dbgcafe');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

// search marshall

if(isset($_POST['searcher']))
{
    $valueToSearcher = $_POST['valueToSearcher'];

    $query1 = "SELECT * FROM `tbl_marshall` WHERE CONCAT(`marshall_id`, `username`, `email`, `firstname`) LIKE '%".$valueToSearcher."%'";
    $search_result1 = filterTable($query1);
    
}
 else {
    $query1 = "SELECT * FROM `tbl_marshall`";
    $search_result1 = filterTable($query1);
}


function filterTablers($query)
{
    $connect = mysqli_connect('den1.mysql6.gear.host', 'dbgcafe', 'password_', 'dbgcafe');
    $filter_Result1 = mysqli_query($connect, $query1);
    return $filter_Result1;
}

// search manager

if(isset($_POST['searchers']))
{
    $valueToSearchers = $_POST['valueToSearchers'];

    $query2 = "SELECT * FROM `users` WHERE CONCAT(`id`, `username`, `email`, `firstname`) LIKE '%".$valueToSearchers."%'";
    $search_result2 = filterTable($query2);
    
}
 else {
    $query2 = "SELECT * FROM `users`";
    $search_result2 = filterTable($query2);
}


function filterTablerses($query)
{
    $connect = mysqli_connect('den1.mysql6.gear.host', 'dbgcafe', 'password_', 'dbgcafe');
    $filter_Result2 = mysqli_query($connect, $query2);
    return $filter_Result2;
}

