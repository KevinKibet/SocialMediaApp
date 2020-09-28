<?php

require "config/config.php" ;

if (isset($_SESSION['username'])) {
	$userLoggedin = $_SESSION['username'] ;
	$user_detail_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedin'");
	$user = mysqli_fetch_array($user_detail_query);
}else{
	header("Location: index.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to chat Nation</title>

	<!--Java Script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>

	<!---css-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
</head>

<div class = top_bar>
	<div class="logo">
		<a href=""> ChatNation</a>
	</div>
    <nav>
    	<a href="<?php echo $userLoggedin ;?>"><?php echo $user['firstname']; ?></i></a>
    	<a href="#"><i class = "fa fa-home"></i></a>
    	<a href="#"><i class = "fa fa-envelope"></i></a>
    	<a href="#"><i class = "fa fa-bell-o"></i></a>
    	<a href="#"><i class = "fa fa-users"></i></a>
    	<a href="#"><i class = "fa fa-cog"></i></a>
    	
    </nav>
</div>

<div class='wrapper'>
<body> 
