<?php 
include("../../config.php");

if (isset($_POST['playlistId']) && isset($_POST['songId'])){

    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];
    $orderIdQuery = mysqli_query($con,"SELECT IFNULL(MAX(playlistOrder) + 1, 1)  as playlistOrder FROM playlistsongs WHERE playlistId='$playlistId'");
    /*playlistOrder越小的表示越先進入清單裡*/
     /*IFNULL(MAX(playlistOrder) + 1, 1)如果第一個不存在就用第二個*/

    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'];

        $songsQuery = mysqli_query($con, "SELECT * FROM playlistsongs WHERE songId = '$songId' AND playlistId = '$playlistId'");
        if(mysqli_num_rows($songsQuery) == 0) {
             $query = mysqli_query($con,"INSERT INTO playlistsongs VALUES('','$songId','$playlistId','$order')");
        }
        else{
            echo "已經存在播放清單了!";
        }
   
}

else{
    echo "PlaylistId or songId was not passed into addToPlaylist.php";

    }
?>