<?php


if (isset($_POST['loginbutton'])){




	$email = filter_var($_POST['loginemail'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['loginemail'] = $email; //Store email into session variable 
	$password = md5($_POST['loginpassword']); //Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['username'];
		$_SESSION['username'] = $username;
		header("Location: index.php");
		exit();
	}
	

}




?>