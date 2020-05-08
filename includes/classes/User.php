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

  
  }
 ?>