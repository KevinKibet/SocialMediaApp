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
</head>
<body> 
gsgs