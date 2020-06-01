<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){

	include("includes/config.php");
	include("includes/classes/User.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");
	include("includes/classes/Playlist.php");
	/*from header.php*/
	

	if (isset($_GET['userLoggedIn'])) {
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
	   }
	else {
		echo "Username variable was not passed into page. Check the openPage JS function";
		exit();
	}

}
else {
	include("includes/header.php");
	include("includes/footer.php");
	/**到這裡時,順序亂掉了,資料跑到很下面*/
    $url = $_SERVER['REQUEST_URI'];                                                                                          
	echo "<script>openPage('$url')</script>";
	/*缺乏連接資料，所以在上面補上資料*/
	exit();
	/*跑出兩個資料所以要離開一個*/
	
}