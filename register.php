
<?php
session_start();

$con= mysqli_connect("localhost", "root", "", "socialmediasite");
if(mysqli_connect_errno()){
	echo "Failed to Connect".mysqli_connect_errno();
}

//declaring the variables

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
	$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['email'] = $em; //Stores email into session variable

	//email 2
	$em2 = strip_tags($_POST['email2']); //Remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	$em2 = ucfirst(strtolower($em2)); //Uppercase first letter
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
		$password = md5($password); //Encrypt password before sending to database

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

		
	}

    

}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
   <form action="register.php" method="POST">
   	<input type="text" name="fname" placeholder="First Name"  value="<?php if(isset($_SESSION['fname'])){
        echo $_SESSION['fname'] ;
   	}?>" required>
   	<br>
   	<?php
     if (in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) {
     	echo "Your first name must be between 2 and 25 characters<br>" ;
     }
   	?>
   	<input type="text" name="lname" placeholder="Last Name"  value="<?php if(isset($_SESSION['lname'])){
        echo $_SESSION['lname'] ;
   	}?>" required>
   	<br>
    <?php
     if (in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) {
     	echo "Your last name must be between 2 and 25 characters<br>" ;
     }
     ?>

   	<input type="email" name="email" placeholder="Email" value="<?php if(isset($_SESSION['email'])){
        echo $_SESSION['email'] ;
   	}?>" required>
   	<br>
    
    <?php
     if (in_array("Emails Does not Match<br>", $error_array)) {
     	echo "Emails Does not Match<br>" ;
     }else if (in_array("Invalid format<br>", $error_array)) {
     	echo "Invalid format<br>";
     }else if (in_array("Emails Does not Match<br>", $error_array)) {
     	echo "Emails Does not Match<br>";
     }
     ?>

   	<input type="email" name="email2" placeholder="Repeat Email" value="<?php if(isset($_SESSION['email2'])){
        echo $_SESSION['email2'] ;
   	}?>" required>
   	<br>
   	<input type="password" name="password" placeholder="Password"  required>
   	<br>

    <?php
     if (in_array("Your passwords do not match<br>", $error_array)) {
     	echo "Your passwords do not match<br>" ;
     }else if (in_array("Your password can only contain english characters or numbers <br>", $error_array)) {
     	echo "Your password can only contain english characters or numbers <br>";
     }else if (in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) {
     	echo "Your password must be betwen 5 and 30 characters<br>";
     }
     ?>


   	<input type="password" name="cpassword" placeholder="Confirm Password" required>
   	<br>
   	<input type="submit" name="register" value="Register">

   </form>
</body>
</html>