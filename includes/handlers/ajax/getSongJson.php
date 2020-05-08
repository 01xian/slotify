<?php
include("../../config.php");/*每兩個點為上一個資料夾*/

if(isset($_POST['songId'])){
	$songId = $_POST['songId'];
	$query = mysqli_query($con, "SELECT * FROM songs WHERE  id='$songId'");
	$resultArray = mysqli_fetch_array($query);
	echo json_encode($resultArray);

}
?>