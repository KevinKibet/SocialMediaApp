<?php

include('includes/header.php');
include('includes/classes/user.php');
//session_destroy();
?>

<div class = "user_details column">

	<a href="<?php echo $userLoggedin ;?>"><img src="<?php echo $user['profpic']?>"></a>	
	<div class = "user_details_left_right">
	<a href="<?php echo $userLoggedin ;?>"> <?php echo $user['firstname']."".$user['lastname']; ?></a>
	<br>
	<?php
	echo "Posts :"." ".$user['numposts']."<br>";

	echo "Likes :"." ".$user['numlikes'];

	?>
	</div>
</div>


<div class="main_column column">
	<form class="post_form" action="index.php" method="POST">
		<textarea type="text" name="post" id="post" placeholder="Say something!"></textarea>
		<input type="submit" name="submitpost" id="submitpost" value="Post"> 
		
	</form>

	<?php 

    $user_obj = new User($con, $userLoggedin);
    echo $user_obj->getFirstAndLastName();

	?>

</div>
</div>
</body>
</html>