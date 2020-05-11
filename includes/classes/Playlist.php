<?php
  class Playlist{

  	private $con;
  	private $id;
    private $name;
    private $owner;

  	public function __construct($con, $data) {

      if(!is_array($data)) {
        //如果傳進來的data不是陣列的話(data is an id (string))
        $query = mysqli_query($con, "SELECT * FROM playlists WHERE id='$data'");
        $data = mysqli_fetch_array($query);
      }
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

      public function getNumberOfSongs() {
       $query = mysqli_query($this->con, "SELECT songId FROM playlistSongs WHERE playlistId='$this->id'");
       return mysqli_num_rows($query);
    }


      public function getSongIds() {

            $query = mysqli_query($this-> con, "SELECT id FROM songs WHERE album ='$this->id' ORDER BY albumOrder ASC");



            $array = array();

            while($row = mysqli_fetch_array($query))  {
                array_push($array, $row['id']);
            }

            return $array;

             
        }




  
  }
 ?>