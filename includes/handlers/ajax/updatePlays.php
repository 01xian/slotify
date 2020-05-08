<?php
include("../../config.php");/*每兩個點為上一個資料夾*/

if(isset($_POST['songId'])) {
	$songId = $_POST['songId'];
	$query = mysqli_query($con, "UPDATE songs SET plays = plays + 1 WHERE id='$songId'");


}
?>