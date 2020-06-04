<?php
include("includes/includedFiles.php");
?>

<div class="playlistsContainer">
	<div class="gridViewContainer">
		<h2>播放清單列表</h2>
		<div class="buttonItems">
			<button class="button green" onclick="createPlaylist()">新增播放清單</button>
			
		</div>

		<?php
		    $username = $userLoggedIn->getUsername();
			$playlistsQuery = mysqli_query($con,"SELECT * FROM playlists WHERE owner='$username'");
			if(mysqli_num_rows($playlistsQuery) == 0) {
			  echo "<span class='noResults'>您尚未建立播放清單</span>";
				}
			while($row = mysqli_fetch_array ($playlistsQuery)) {
				$playlist = new Playlist($con, $row);
				echo "<div class='gridViewItem'role='link' tabindex='0' 
				onclick='openPage(\"playlist.php?id=".$playlist->getId()."\")'>
				          <div class='playlistImage'>
				            <img src='assets/images/icons/playlist.png'>
				          </div>

				          <div class='gridViewInfo'>"
							.$playlist->getName()
					   ." </div>
					
					  </div>";
			}
        ?>

		
	</div>
	
</div>