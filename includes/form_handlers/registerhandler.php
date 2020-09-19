<?php

$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //email
$em2 = ""; //email 2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date 
$error_array = array(); 


if(isset($_POST['register'])){

//Registration Values
	//First name
	$fname = strip_tags($_POST['fname']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
	$_SESSION['fname'] = $fname; //Stores first name into session variable

	//Last name
	$lname = strip_tags($_POST['lname']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
	$_SESSION['lname'] = $lname; //Stores last name into session variable

	//email
	$em = strip_tags($_POST['email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = strtolower($em); //Uppercase first letter
	$_SESSION['email'] = $em; //Stores email into session variable

	//email 2
	$em2 = strip_tags($_POST['email2']); //Remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	$em2 = strtolower($em2); //Uppercase first letter
	$_SESSION['email2'] = $em2; //Stores email2 into session variable

	//Password
	$password = strip_tags($_POST['password']); //Remove html tags
	$password2 = strip_tags($_POST['cpassword']); //Remove html tags

	$date = date("Y-m-d"); //Current date



	if ($em == $em2){
          if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
          	$em = filter_var($em, FILTER_VALIDATE_EMAIL);
          	$emcheck = mysqli_query($con, "SELECT email FROM users where email='$em'");
          	$emailnumrows = mysqli_num_rows($emcheck);

          	if($emailnumrows > 0){
             array_push($error_array, "email already exist<br>")  ;
          	}
          }else{
          	array_push($error_array, "Invalid format<br>") ;
          }
   

	}else{
		array_push($error_array, "Emails Does not Match<br>") ;
	}



    if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
	}

	
	if($password != $password2) {
		array_push($error_array, "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers <br>");
		}
	}


    if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}



	if(empty($error_array)) {
		$password = ($password); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");


		$i = 0; 
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		}

		


//prof pic assignment
		
		//$profpic = '' ;
		//$rand = '';

//	$rand == rand(1,2);  //generating random numbers between 1 and 2

	//if ($rand == 1) 
		//$profpic = "assets/images/profile_pics/defaults/head_red.png";
	

	//else if($rand==2)

		$profpic = "assets/images/profile_pics/defaults/head_wet_asphalt.png";
	
		
	


	
    
    $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$date', '$profpic', '0', '0', 'no', '$password', ',', '$em')");



     array_push($error_array, "<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>");



     //Clear session variables 
		$_SESSION['fname'] = "";
		$_SESSION['lname'] = "";
		$_SESSION['email'] = "";
		$_SESSION['email2'] = "";


	}




}




?>