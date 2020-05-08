<?php
include("../../config.php");/*每兩個點為上一個資料夾*/

if(isset($_POST['artistId'])) {
	$artistId = $_POST['artistId'];
	$query = mysqli_query($con, "SELECT * FROM artists WHERE  id='$artistId'");
	$resultArray = mysqli_fetch_array($query);
	echo json_encode($resultArray);

}

?>
