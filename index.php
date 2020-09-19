<?php

include('includes/header.php');
//session_destroy();
?>

<div class = "user_details column">

<a href="#"><img src="<?php echo $user['profpic']?>"></a>	
<div class = "user_details_left_right">
<a href="#"> <?php echo $user['firstname']."".$user['lastname']; ?></a>
<br>
<?php
echo "Posts :"." ".$user['numposts']."<br>";

echo "Likes :"." ".$user['numlikes'];

?>
</div>
</div>
</div>
</body>
</html>