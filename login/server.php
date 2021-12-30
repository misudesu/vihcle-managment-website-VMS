<?php
include_once 'database.php';
	// start session
	session_start();

	// initializing variables
	
	$username   = "";
	$email      = "";
	$errors     = array();

	// connect to the database
		include_once 'database.php';
		$register = '';
	// isset reg_user
	if (isset($_POST['reg_user']))
	{
		// receive all input values from the form
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
		$password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

		// empty form register
		
		if (empty($username)) 
		{
			array_push($errors, '<div class="alert-danger" role="alert">Name is required</div>');
		}

		if (empty($email)) 
		{
			array_push($errors,'<div class="alert-danger" role="alert">Email is required</div>');
		}

		if (empty($phone_number))
		{
			array_push($errors, '<div class="alert-danger" role="alert">Phone number is required</div>');
		}

		if (empty($password_1))
		{
			array_push($errors, '<div class="alert-danger" role="alert">Password is required</div>');
		}
		if ($password_1 != $password_2)
		{
			array_push($errors, '<div class="alert-danger" role="alert">The two passwords do not match</div>');
		}

	// first check the database to make sure
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM users WHERE username ='$username' OR username='$email' LIMIT 1";
	$result = mysqli_query($connection, $user_check_query);
	$user = mysqli_fetch_assoc($result);

		if ($user)
		{ // if user exists
		if ($user['username'] === $username) 
		{
			array_push($errors, '<div class="alert-danger" role="alert">Username already exists</div>');
		}

		if ($user['email'] === $email)
			{
			array_push($errors, '<div class="alert-danger" role="alert">Email already exists</div>');
		}
		}

	// Finally, register user if there are no errors in the form
	if (count($errors) == 0)
		{
			$password = md5($password_1);//encrypt the password before saving in the database

			// insert file register
			$query = "INSERT INTO users VALUES( '$email', '$password','$username','$phone_number','Active')";
			mysqli_query($connection, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: dashboard.php');
			$success = "Signup Success ! Please Login to Continue.";
		}
	}

	//**********************

	// login user
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		// empty file email and password
		if (empty($email)) {
			array_push($errors, '<div class="alert-danger" role="alert">email is required</div>');
		}
		if (empty($password)) {
			array_push($errors, '<div class="alert-danger" role="alert">password is required</div>');
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$email' and password='$password'";
			$results = mysqli_query($connection, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = '<h4 class="text-center">You are now logged in<h4>';
				header('location: dashboard.php');
			}else {
				array_push($errors,'<div class="alert-danger" role="alert">Wrong email/password, Please login again.</div>');
			}
		}
	}

?>

