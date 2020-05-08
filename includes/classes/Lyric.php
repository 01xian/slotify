<?php
class Lyric{
		private $con;
    	private $id;
    	private $mysqliData;
    	private $time;
    	private $word;

    	public function __construct($con, $id) {
    		$this -> con = $con;
    		$this -> id = $id;
    		$query = mysqli_query($this->con,"SELECT * FROM lyric WHERE songId='$this->$songId'");
            $this-> mysqliData = mysqli_fetch_array($query);
            $this-> time = $this->mysqliData['time'];
            $this-> word = $this->mysqliData['word'];
	   }
	

	public function getLyric(){

	
	   if(audioElement.audio.currentTime ==  ){
	   	

	   }


  }
}
?>