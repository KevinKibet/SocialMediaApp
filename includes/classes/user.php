<?php
class User {
	private $user;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
		$this->user = mysqli_fetch_array($user_details_query);
	}

	
public function getUsername() {
		return $this->user['username'];
	}

	public function getNumPosts() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT numposts FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['numposts'];
	}


	public function getFirstAndLastName() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT firstname, lastname FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['firstname'] . " " . $row['lastname'];
	}


  public function isClosed() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT userclosed FROM users WHERE username='$username'");
		$row = mysqli_fetch_array($query);

		if($row['user_closed'] == 'yes')
			return true;
		else 
			return false;
	}

}

?>

