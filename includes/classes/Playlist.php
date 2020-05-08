<?php
  class Playlist{

  	private $con;
  	private $id;
    private $name;
    private $owner;

  	public function __construct($con, $data) {
  		$this->con = $con;
  		$this->id = $data['id'];
      $this->name = $data['name'];
      $this->owner = $data['owner'];
  	
  	}
  	/// __construct 這個類別一旦宣告後就直接執行


      public function getId() {
      return $this->id;
    }

  	  public function getName() {
  		return $this->name;
  	}

      public function getOwner() {
      return $this->owner;
    }

  
  }
 ?>