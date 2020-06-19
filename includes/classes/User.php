<?php
  class User {

  	private $con;
  	private $username;
  	public function __construct($con, $username) {
  		$this->con = $con;
  		$this->username = $username;
  	
  	}
  	/// __construct 這個類別一旦宣告後就直接執行

  	public function getUsername() {
  		return $this->username;
  	}

    public function getEmail() {
      $query = mysqli_query($this->con, "SELECT email FROM users WHERE username='$this->username' " );
      $row = mysqli_fetch_array($query);
      return $row['email'];
    }

    public function getFirstAndLastName() {
      $query = mysqli_query($this->con, "SELECT concat(lastName, firstName) as 'name' FROM users WHERE username='$this->username' " );
      $row = mysqli_fetch_array($query);
      return $row['name'];

    }

  
  }
 ?>