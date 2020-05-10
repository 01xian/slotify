<?php
include("../../config.php");/*每兩個點為上一個資料夾*/

if(isset($_POST['songId'])) && (isset($_POST['time'])) {
	$songId = $_POST['songId'];
	$time = $_POST['time'];
	$query = mysqli_query($con, "SELECT * FROM lyric WHERE  songId='$songId' AND time='$time'");
	$resultArray = mysqli_fetch_array($query);
	echo json_encode($resultArray);
		

}
?>