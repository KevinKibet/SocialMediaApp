<?php


if (isset($_POST['loginbutton'])){



	$email = filter_var($_POST['loginemail'], FILTER_SANITIZE_EMAIL);

	$_SESSION['loginemail'] = $email; //Store email into session variable 
	$password = ($_POST['loginpassword']); //Get password

	$check_database_query = mysqli_query($con, "SELECT email, password, username FROM users");
	//$check_login_query = mysqli_num_rows($check_database_query);

	while($row = mysqli_fetch_array($check_database_query)) {
		if($row['email']== $email && $row['password'] == $password){
        session_start();
        $username = $row['username'];
        $user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND userclosed='yes'");
		if(mysqli_num_rows($user_closed_query) == 1) {
			$reopen_account = mysqli_query($con, "UPDATE users SET userclosed='no' WHERE email='$email'");
		}

        $_SESSION['username'] = $username;
		header("Location: index.php");
		exit();
		}else{
			array_push($error_array, "Email or password was incorrect<br>");
			
		}

		
		
		
	}
	

}




?>