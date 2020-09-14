
<?php
require 'config/config.php';
require 'includes/form_handlers/registerhandler.php';
//require 'includes/form_handlers/loginhandler.php';
//declaring the variables
?>






<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
     <!--Login Form-->

     <form action="register.php" method="POST">
		<input type="email" name="loginemail" placeholder="Email Address"  required>
		<br>
		<input type="password" name="loginpassword" placeholder="Password">
		<br>
		<input type="submit" name="loginbutton" value="Login">
		<br>

	</form>




	<!--register form-->
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
   	<br>
<?php
   	 if (in_array("<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>", $error_array)) {
     	echo "<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>" ;
       }

       ?>
   </form>
</body>
</html>