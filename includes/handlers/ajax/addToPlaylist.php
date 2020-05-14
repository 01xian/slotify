<?php 
include("../../config.php");

if (isset($_POST['playlistId']) && isset($_POST['songId'])){

    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];
    $orderIdQuery = mysqli_query($con,"SELECT IFNULL(MAX(playlistOrder) + 1, 1)  as playlistOrder FROM playlistSongs WHERE playlistId='$playlistId'");
    /*playlistOrder越小的表示越先進入清單裡*/
     /*IFNULL(MAX(playlistOrder) + 1, 1)如果第一個不存在就用第二個*/

    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'];
    $query = mysqli_query($con,"INSERT INTO playlistSongs VALUES('','$songId','$playlistId','$order')");
   
}

else{
    echo "PlaylistId or songId was not passed into addToPlaylist.php";

    }
?>