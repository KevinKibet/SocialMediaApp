<?php

require "config/config.php" ;

if (isset($_SESSION['username'])) {
	$userLoggedin = $_SESSION['username'] ;
}else{
	header("Location: register.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to chat Nation</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body> 
gsgs