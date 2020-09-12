
<?php

$con= mysqli_connect("localhost", "root", "", "socialmediasite");
if(mysqli_connect_errno()){
	echo "Failed to Connect".mysqli_connect_errno();
}
$query= mysqli_query($con, "INSERT INTO test VALUES ('', 'kevin', '0712803678')");
?>

<html>
<title>FirstPage</title>
<head></head>
<body>
<h1> First Page</h1>

</body>
</html>