<?php 
	require_once('scripts/config.php');
	if(empty($_POST['username']) || empty($_POST['password'])){
		$message = 'Login Failed';
	}else{
		$username = $_POST['username'];
		$password = $_POST['password'];
		//$ip = $_SERVER['REMOTE_ADDR']; //for the admin we're going to need to get the IP address
										//we pass this to the login function
		$message = login($username,$password, $ip); //don't forget to pass the paramaters
	}

	echo json_encode($message);
?>